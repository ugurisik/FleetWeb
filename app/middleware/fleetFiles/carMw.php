<?php

namespace App\middleware\fleetFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\helpers\utils\frontEnd as frontEnd;

class carMw
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
    public function insert($post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->security::formTokenCheck($post[TOKENIZER])) {
                $post = $this->security::clearRequest($post);
                $data = [
                    'Guid' => $this->func->generateGuid(),
                    'UserGuid' => $this->session->getSession('USER_GUID'),
                    'BranchGuid' => $post['BranchGuid'],
                    'Name' => $post['Name'],
                    'Brand' => $post['Brand'],
                    'Model' => $post['Model'],
                    'Year' => $post['Year'],
                    'SN' => $post['SN'],
                    'LicencePlate' => $post['LicencePlate'],
                    'CurrentKm' => $post['CurrentKm'],
                    'Type' => $post['Type'],
                    'Status' => $post['Status'],
                    'FuelType' => $post['FuelType'],
                    'OwnerShip' => $post['OwnerShip'],
                    'Images' => $post['Images'],
                    'Operators' => json_encode($post['Operators'], JSON_UNESCAPED_UNICODE),
                    'ImeiNumber' => $post['ImeiNumber'],
                    'CreatedDate' => date('Y-m-d H:i:s'),
                    'UpdatedDate' => date('Y-m-d H:i:s')
                ];
                $result = $this->db->addData('swp_cars', $data);
                if ($result) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Araç başarıyla eklendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Araç eklenirken bir hata oluştu.'
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
                    'BranchGuid' => $post['BranchGuid'],
                    'Name' => $post['Name'],
                    'Brand' => $post['Brand'],
                    'Model' => $post['Model'],
                    'Year' => $post['Year'],
                    'SN' => $post['SN'],
                    'LicencePlate' => $post['LicencePlate'],
                    'CurrentKm' => $post['CurrentKm'],
                    'Type' => $post['Type'],
                    'Status' => $post['Status'],
                    'FuelType' => $post['FuelType'],
                    'OwnerShip' => $post['OwnerShip'],
                    'Images' => $post['Images'],
                    'Operators' => json_encode($post['Operators'], JSON_UNESCAPED_UNICODE),
                    'ImeiNumber' => $post['ImeiNumber'],
                    'UpdatedDate' => date('Y-m-d H:i:s')
                ];
                $result = $this->db->updateData('swp_cars', $data, ['Guid' => $guid]);
                if ($result) {
                    $message = [
                        'type' => 'success',
                        'message' => 'Araç başarıyla güncellendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Araç güncellenirken bir hata oluştu.'
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
