<?php

namespace App\middleware\fleetFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\helpers\utils\frontEnd as frontEnd;

class ticketMw
{
    public $db, $func, $mailer, $session, $security, $frontEnd;
    public function __construct()
    {
        $this->db = new db;
        $this->func = new functions;
        $this->mailer = new mailer;
        $this->session = new session;
        $this->security = new security;
    }
    public function getAll()
    {
    }
    public function getOne($guid)
    {
    }
    public function getByOperator($guid)
    {
    }
    public function getByBranch($guid)
    {
    }
    public function getByCompany($guid)
    {
        // company is a user
    }
    public function getByCar($guid)
    {
    }
    public function insert($post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->security::formTokenCheck($post[TOKENIZER])) {
                $post = $this->security::clearRequest($post);
                $data = [
                    'Guid' => $this->func->generateGuid(),
                    'UserGuid' => $this->session->getSession('USER_GUID'),
                    'CarGuid' => $post['CarGuid'],
                    'OperatorGuid' => $post['OperatorGuid'],
                    'Name' => $post['Name'],
                    'Description' => $post['Description'],
                    'TicketDate' => $post['TicketDate'],
                    'Images' => $post['Images'],
                    'Price' => $post['Price'],
                    'Status' => $post['Status'],
                    'CreatedDate' => date('Y-m-d H:i:s'),
                    'UpdatedDate' => date('Y-m-d H:i:s')
                ];
                $result = $this->db->addData('swp_ticket', $data);
                if ($result) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Ceza başarıyla eklendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Ceza eklenirken bir hata oluştu.'
                    ];
                }
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Form token hatası.'
                ];
            }
        } else {
            $message = [
                'type' => 'error',
                'message' => 'Lütfen tüm alanları doldurunuz.'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function update($guid, $post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->security::formTokenCheck($post[TOKENIZER])) {
                $post = $this->security::clearRequest($post);
                $data = [
                    'CarGuid' => $post['CarGuid'],
                    'OperatorGuid' => $post['OperatorGuid'],
                    'Name' => $post['Name'],
                    'Description' => $post['Description'],
                    'TicketDate' => $post['TicketDate'],
                    'Images' => $post['Images'],
                    'Price' => $post['Price'],
                    'Status' => $post['Status'],
                    'UpdatedDate' => date('Y-m-d H:i:s')
                ];
                $result = $this->db->updateData('swp_ticket', $data, ['Guid' => $guid]);
                if ($result) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Ceza başarıyla güncellendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Ceza güncellenirken bir hata oluştu.'
                    ];
                }
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Form token hatası.'
                ];
            }
        } else {
            $message = [
                'type' => 'error',
                'message' => 'Lütfen tüm alanları doldurunuz.'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function delete($guid)
    {
    }
}
