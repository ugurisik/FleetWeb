<?php

namespace App\middleware\userFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\middleware\userFiles\userAuthMw as authMw;
use App\helpers\utils\frontEnd as frontEnd;

class forumMw
{
    public $db, $func, $mailer, $session;
    public function __construct()
    {
        $this->db = new db;
        $this->func = new functions;
        $this->mailer = new mailer;
        $this->session = new session;
    }
    public function getCategories()
    {
        $param = 'forum';
        $data = [
            'TopGuid' => '0',
            'Type' => $param
        ];
        $categories = $this->db->getData('swp_categories', $data);
        $ct = [];
        foreach ($categories as $value) {

            $posts = $this->db->getData('swp_tickets', ['CategoryGuid' => $value['Guid']], 1000, [], ['CreatedDate' => 'DESC']);
            $value['PostCount'] = count($posts);

            $data = [
                'TopGuid' => $value['Guid'],
                'Type' => $param
            ];
            $subcategories = $this->db->getData('swp_categories', $data);
            foreach ($subcategories as $key => $sub) {
                $posts = $this->db->getData('swp_tickets', ['CategoryGuid' => $sub['Guid']], 1000, [], ['CreatedDate' => 'DESC']);
                $subcategories[$key]['PostCount'] = count($posts);
            }
            $ct[] = [
                'TopCategory' => $value,
                'SubCategories' => $subcategories
            ];
        }
        return $ct;
    }
    public function getCategoryUrl($seourl)
    {
        $data = [
            'SeoUrl' => $seourl,
            'Type' => 'forum'
        ];
        $category = $this->db->getOneData('swp_categories', $data);
        return $category;
    }
    public function getPosts($limit = 10, $categories = null, $type = null)
    {
        $where = [];
        if ($categories != null) {
            $where['CategoryGuid'] = $categories;
        }
        if ($type != null) {
            $where['Type'] = $type;
        }
        $posts = $this->db->getData('swp_tickets', $where, $limit);
        foreach ($posts as $key => $post) {
            $data = [
                'Guid' => $post['CategoryGuid'],
                'Type' => 'forum'
            ];
            $category = $this->db->getOneData('swp_categories', $data);
            $posts[$key]['Category'] = $category['Title'];
            $data = [
                'Guid' => $post['UserGuid']
            ];
            $user = $this->db->getOneData('swp_user', $data);
            $posts[$key]['User'] = $user['UserName'];

            $data = [
                'TicketGuid' => $post['Guid']
            ];
            $comments = $this->db->getData('swp_comments', $data);
            $posts[$key]['CommentCount'] = count($comments);
        }
        return $posts;
    }
    public function getPost($guid)
    {
        $data = [
            'Guid' => $guid
        ];
        $post = $this->db->getOneData('swp_tickets', $data);
        if (empty($post)) {
            return null;
        } else {

            $data = [
                'ContentGuid' => $guid,
                'UserIP' => md5(security::getIP() . 'HariboX')
            ];
            $check = $this->db->getOneData('swp_views', $data);
            if (empty($check)) {
                $data = [
                    'ContentGuid' => $guid,
                    'UserIP' => md5(security::getIP() . 'HariboX'),
                    'CreatedDate' => date('Y-m-d H:i:s')
                ];
                $this->db->addData('swp_views', $data);
                $data = [
                    'ViewCount' => $post['ViewCount'] + 1
                ];
                $this->db->updateData('swp_tickets', $data, ['Guid' => $guid]);
            }

            $data = [
                'Guid' => $post['CategoryGuid'],
                'Type' => 'forum'
            ];
            $category = $this->db->getOneData('swp_categories', $data);
            $post['Category'] = $category['Title'];
            $post['CategoryUrl'] = $category['SeoUrl'];
            $data = [
                'Guid' => $post['UserGuid']
            ];
            $user = $this->db->getOneData('swp_user', $data);
            $post['User'] = $user['UserName'];

            $data = [
                'TicketGuid' => $guid
            ];
            $comments = $this->db->getData('swp_comments', $data, null, [], ['ID' => 'ASC']);
            foreach ($comments as $key => $comment) {
                $data = [
                    'Guid' => $comment['UserGuid']
                ];
                $user = $this->db->getOneData('swp_user', $data);
                $comments[$key]['User'] = $user['UserName'];


                $cData = $comment['isReadUser'];
                $cData = json_decode($cData, true);
                if (!in_array($_SESSION['USER_GUID'], $cData)) {
                    $cData[] = $_SESSION['USER_GUID'];
                    $cData = json_encode($cData, JSON_UNESCAPED_UNICODE);
                    $this->db->updateData('swp_comments', ['isReadUser' => $cData], ['Guid' => $comment['Guid']]);
                }
            }

            $post['Comments'] = $comments;

            return $post;
        }
    }
    public function insert($post)
    {
        if (isset($post['title']) && isset($post['description']) && isset($post['categoryguid'])) {
            if (!empty($post['title']) && !empty($post['description']) && !empty($post['categoryguid'])) {
                if ($post['checkoutPaiementCgv']) {
                    $post['checkoutPaiementCgv'] = 1;
                } else {
                    $post['checkoutPaiementCgv'] = 0;
                }
                $data = [
                    'Guid' => $this->func->generateGuid(),
                    'UserGuid' => $_SESSION['USER_GUID'],
                    'CategoryGuid' => $post['categoryguid'],
                    'Title' => $post['title'],
                    'Content' => $post['description'],
                    'CreatedDate' => date('Y-m-d H:i:s'),
                    'UpdatedDate' => date('Y-m-d H:i:s'),
                    'Status' => 1,
                    'ViewCount' => 0,
                    'Type' => $post['checkoutPaiementCgv'],
                    'Media' => json_encode($post['files'], JSON_UNESCAPED_UNICODE)
                ];
                $insert = $this->db->addData('swp_tickets', $data);
                if ($insert) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Konu başarıyla oluşturuldu.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Bir hata oluştu.'
                    ];
                }
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Lütfen tüm alanları doldurunuz.'
                ];
            }
        } else {
            $message = [
                'type' => 'error',
                'message' => 'Lütfen tüm alanları gönderiniz.'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function insertComment($post)
    {
        if (!empty($post['comment']) && !empty($post['ticketguid'])) {
            $data = [
                'Guid' => $this->func->generateGuid(),
                'UserGuid' => $_SESSION['USER_GUID'],
                'TicketGuid' => $post['ticketguid'],
                'Content' => $post['description'],
                'CreatedDate' => date('Y-m-d H:i:s'),
                'Status' => 1,
                'isReadUser' => json_encode([], JSON_UNESCAPED_UNICODE),
            ];
            $insert = $this->db->addData('swp_comments', $data);
            if ($insert) {
                $message = [
                    'type' => 'success',
                    'message' => 'Yorum başarıyla oluşturuldu.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Bir hata oluştu.'
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
}
