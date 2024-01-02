<?php

namespace App\middleware\fleetFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\helpers\utils\frontEnd as frontEnd;

class branchMw
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
    public function getCars($guid)
    {
    }
    public function getOperators($guid)
    {
    }
    public function getPerson($guid)
    {
    }
    public function getPersons($guid)
    {
    }
    public function getByCompany($guid)
    {
        // company is a user
    }
    public function insert($post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->security::formTokenCheck($post[TOKENIZER])) {
                $post = $this->security::clearRequest($post);
                $data = [
                    "Guid" => $this->func->generateGuid(),
                    "UserGuid" => $this->session->getSession('USER_GUID'),
                    "ManagerGuid" => $post['ManagerGuid'],
                    "Name" => $post['Name'],
                    "Description" => $post['Description'],
                    "Address" => $post['Address'],
                    "Location" => $post['Location'],
                    "CreatedDate" => date('Y-m-d H:i:s'),
                    "UpdatedDate" => date('Y-m-d H:i:s')
                ];
                $result = $this->db->addData('swp_branch', $data);
                if ($result) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Şube başarıyla eklendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Şube eklenirken bir hata oluştu.'
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
                    "UserGuid" => $this->session->getSession('USER_GUID'),
                    "ManagerGuid" => $post['ManagerGuid'],
                    "Name" => $post['Name'],
                    "Description" => $post['Description'],
                    "Address" => $post['Address'],
                    "Location" => $post['Location'],
                    "UpdatedDate" => date('Y-m-d H:i:s')
                ];
                $result = $this->db->updateData('swp_branch', $data, ['Guid' => $guid]);
                if ($result) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Şube başarıyla güncellendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Şube güncellenirken bir hata oluştu.'
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
    public function insertPerson($post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->security::formTokenCheck($post[TOKENIZER])) {
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
    }
    public function updatePerson($guid, $post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->security::formTokenCheck($post[TOKENIZER])) {
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
    }
    public function deletePerson($guid)
    {
    }
}
