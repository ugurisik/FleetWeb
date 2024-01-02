<?php

namespace App\middleware\userFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\middleware\userFiles\userAuthMw as authMw;
use App\helpers\utils\frontEnd as frontEnd;
class ticketsMw
{
    public $db, $func, $mailer;
    public function __construct()
    {
        $this->db = new db;
        $this->func = new functions;
        $this->mailer = new mailer;
    }

    public function getAll()
    {

        $session = new session;
        if (isset($_GET['status'])) {
            $session->createSession(['STATUS' => $_GET['status']]);
        }
        $sessions = [];
        if ($session->getSession('STATUS') != 0) {
            $sessions['Status'] = $session->getSession('STATUS');
        };
        if ($session->getSession('CATEGORY') != 0) {
            $sessions['Category'] = $session->getSession('CATEGORY');
        }

        if ($session->getSession('TYPE') != 0) {
            $sessions['Type'] = $session->getSession('TYPE');
        }

        if ($session->getSession('PRIORITY') != 0) {
            $sessions['Priority'] = $session->getSession('PRIORITY');
        }
        if (empty($sessions)) {
            $sessions = null;
        }
        $tickets = $this->db->getData('tickets', $sessions);
        $datas = [];
        foreach ($tickets as $ticket) {
            $user = $this->db->getOneData('swp_user_information', ['UserGuid' => $ticket['CreatedUser']]);
            $datas[] = [
                'Guid' => $ticket['Guid'],
                'Title' => $ticket['Title'],
                'Priority' => $ticket['Priority'],
                'Category' => $ticket['Category'],
                'Status' => $ticket['Status'],
                'Type' => $ticket['Type'],
                'CreatedDate' => $ticket['CreatedDate'],
                'User' => $user['FirstName'] . ' ' . $user['LastName'],
            ];
        }
        return $datas;
    }

    public function insert($data)
    {
        $session = new session;
        $function = new functions;
        $ticketid = $function->generateGuid();
        $datas = [
            'Guid' => $ticketid,
            'CreatedUser' => $session->getSession('USER_GUID'),
            'Title' => $data['ticketsName'],
            'Content' => $data['ticketsContent'],
            'Priority' => $data['ticketsPriority'],
            'Category' => $data['ticketsCategory'],
            'Status' => $data['ticketsStatus'],
            'Type' => $data['ticketsType'],
            'CreatedDate' => date('Y-m-d H:i:s'),
            'UpdatedDate' => date('Y-m-d H:i:s'),
            'Files' => json_encode($data['ticketsMedia'], JSON_UNESCAPED_UNICODE),
        ];
        $insert = $this->db->addData('tickets', $datas);
        if ($insert) {
            $fe = new frontEnd;
            $user = $fe->userInfo();
            $mail = $user['Email'];
            $this->mailer->sendMail($mail, 'Yeni Talep Oluşturuldu!', 'Merhaba, <br> Yeni bir talep oluşturuldu, görüntülemek için <a href="' . SITE_URL . '/tickets/show/' . $ticketid . '">tıklayınız.</a> <br> Saygılarımızla, <br> ' . SITE_NAME);
            // $this->mailer->sendMail('ticket', $data['ticketsName'], $data['ticketsContent'], $data['ticketsFiles']);
            $message = [
                'status' => 'success',
                'message' => 'Ticket başarıyla oluşturuldu.',
            ];
        } else {
            $message = [
                'status' => 'error',
                'message' => 'Ticket oluşturulurken bir hata oluştu.',
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }

    public function getOne($data)
    {
        $session = new session;
        $ticket = $this->db->getOneData('tickets', ['Guid' => $data]);
        $user = $this->db->getOneData('swp_user_information', ['UserGuid' => $ticket['CreatedUser']]);
        $comment = $this->db->getData('comments', ['TicketGuid' => $data], null, ['CreatedDate' => 'desc']);
        $comments = [];
        $auth = new authMw;
        $user = $auth->getUsers();
        foreach ($comment as $item) {
            $createdatetotimestamp = strtotime($item['CreatedDate']);
            $comments[$createdatetotimestamp] = [
                'Guid' => $item['Guid'],
                'User' => $user[$item['CreatedUser']],
                'Content' => $item['Content'],
                'CreatedDate' => $item['CreatedDate'],
            ];
            $isReadUser = json_decode($item['isReadUser'], true);
            if (empty($isReadUser)) {
                $isReadUser = [];
            }
            if (!in_array($session->getSession('USER_GUID'), $isReadUser)) {
                $isReadUser[] = $session->getSession('USER_GUID');
                $this->db->updateData('comments', ['isReadUser' => json_encode($isReadUser, JSON_UNESCAPED_UNICODE)], ['Guid' => $item['Guid']]);
            }
        }
        $datas['User'] = $user['FirstName'] . ' ' . $user['LastName'];
        $datas['Data'] = $ticket;

        // order by date
        ksort($comments);

        $datas['Comment'] = $comments;
        return $datas;
    }

    public function comment($data)
    {
        $session = new session;
        $function = new functions;

        $datas = [
            'Status' => $data['ticketsStatus'],
        ];
        $update = $this->db->updateData('tickets', $datas, ['Guid' => $data['guid']]);

        $comment = $data['comment'];
        $comment = str_replace('<p>', '', $comment);
        $comment = str_replace('</p>', '', $comment);
        $comment = str_replace('<br>', '', $comment);

        if (empty($comment)) {
            $message = [
                'status' => 'error',
                'message' => 'Yorum boş bırakılamaz.'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }


        $data = [
            'Guid' => $function->generateGuid(),
            'CreatedUser' => $session->getSession('USER_GUID'),
            'TicketGuid' => $data['guid'],
            'Content' => $data['comment'],
            'CreatedDate' => date('Y-m-d H:i:s'),
            'isReadUser' => json_encode([$session->getSession('USER_GUID')], JSON_UNESCAPED_UNICODE),
        ];
        $insert = $this->db->addData('comments', $data);
        if ($insert) {
            $message = [
                'status' => 'success',
                'message' => 'Yorum başarıyla oluşturuldu.',
            ];
        } else {
            $message = [
                'status' => 'error',
                'message' => 'Yorum oluşturulurken bir hata oluştu.',
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }

    public function delete($data)
    {
    }
}
