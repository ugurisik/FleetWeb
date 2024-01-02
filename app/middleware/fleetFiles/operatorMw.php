<?php

namespace App\middleware\fleetFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\helpers\utils\frontEnd as frontEnd;
use App\middleware\fleetFiles\authMw as authMw;

class operatorMw extends authMw
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
    public function getByCar($guid)
    {
    }
    public function getByBranch($guid = null)
    {
        $topuserguid = $this->findTopUser();
        $branchManager = $this->findTopUser();
        $data = [
            'Role' => 3,
            'TopUserGuid' => $topuserguid,
            'Guid' => $branchManager,
        ];
        return $data;
    }
    public function getByCompany($guid = null)
    {
        $company = $this->findTopUser($guid);
        $data = [
            'Role' => 3,
            'TopUserGuid' => $company['Guid'],
        ];
        $operators = $this->db->getData('gs_users', $data);
        foreach ($operators as $key => $value) {
            $operators[$key]['info'] = json_decode($value['info'], true);
            $operators[$key]['privileges'] = json_decode($value['privileges'], true);
        }
        return $operators;
    }
    public function insert($post)
    {
        if ($this->security::emptyRequestCheck($post)) {
            if ($this->tokenCheck($post[TOKENIZER])) {
                $post = $this->security::clearRequest($post);

                if (isset($post['branch']) && !empty($post['branch'])) {
                    $topuserguid = $post['branch'];
                    // ------------------------------------------------------------------ Buraya da şube yöneticisi guidi gelecek.
                } else {
                    $topuserguid = $this->findTopUser()['Guid'];
                }

                $info = [
                    'fname' => $post['fname'],
                    'lname' => $post['lname'],
                    'company' => '-',
                    'address' => $post['address'],
                    'post_code' => '-',
                    'city' => '-',
                    'country' => '-',
                    'phone' => $post['phone'],
                    'phone1' => '-',
                    'phone2' => '-',
                    'email' => '-',
                    'licenseLastDate' => $post['licenseLastDate'],
                    'licenseType' => $post['licenseType'],
                    'notes' => $post['notes'],
                    'licenseImages' => json_encode($post['license'], JSON_UNESCAPED_UNICODE),
                ];
                $privileges = [
                    'type' => 'operator',
                    'map_osm' => false,
                    'map_bing' => false,
                    'map_google' => true,
                    'map_google_street_view' => true,
                    'map_google_traffic' => true,
                    'map_mapbox' => false,
                    'map_yandex' => false,
                    'history' => true,
                    'reports' => true,
                    'tasks' => false,
                    'rilogbook' => false,
                    'dtc' => false,
                    'object_control' => false,
                    'image_gallery' => false,
                    'chat' => false,
                    'subaccounts' => true,
                ];
                $data = [
                    'server' => 0,
                    'customer_id' => 0,
                    'active' => true,
                    'account_expire' => false,
                    'account_expire_dt' => "0000-00-00",
                    'privileges' => json_encode($privileges, JSON_UNESCAPED_UNICODE),
                    'manager_id' => 0,
                    'manager_billing' => false,
                    'username' => $post['username'],
                    'password' => md5($post['password']),
                    'sess_hash' => "-",
                    'email' => "demo@safari-gps.com.tr",
                    'api' => true,
                    'api_key' => "B9707CCE2C65B247668A12B371D96BBF",
                    'dt_reg' => date('Y-m-d H:i:s'),
                    'dt_login' => date('Y-m-d H:i:s'),
                    'ip' => security::getIP(),
                    'notify_account_expire' => "-",
                    'notify_object_expire' => "-",
                    'info' => json_encode($info, JSON_UNESCAPED_UNICODE),
                    'comment' => "-",
                    'obj_add' => false,
                    'obj_limit' => false,
                    'obj_limit_num' => 0,
                    'obj_days' => false,
                    'obj_days_dt' => "0000-00-00",
                    'obj_edit' => true,
                    'obj_history_clear' => true,
                    'currency' => "EUR",
                    'timezone' => "+ 1 hour",
                    'dst' => true,
                    'dst_start' => "03-31 02:00",
                    'dst_end' => "10-29 03:00",
                    'language' => "en",
                    'units' => "km,l,c",
                    'map_sp' => "last",
                    'map_is' => 1,
                    'map_rc' => "-",
                    'map_rhc' => "-",
                    'groups_collapsed' => "-",
                    'od' => true,
                    'ohc' => "-",
                    'chat_notify' => "-",
                    'sms_gateway_server' => "-",
                    'sms_gateway' => "-",
                    'sms_gateway_type' => "-",
                    'sms_gateway_url' => "-",
                    'sms_gateway_identifier' => "-",
                    'places_markers' => "-",
                    'places_routes' => "-",
                    'places_zones' => "-",
                    'usage_email_daily' => "-",
                    'usage_sms_daily' => "-",
                    'usage_api_daily' => "-",
                    'usage_email_daily_cnt' => 0,
                    'usage_sms_daily_cnt' => 0,
                    'usage_api_daily_cnt' => 0,
                    'dt_usage_d' => "2023-12-22",
                    'land' => 0,
                    'Guid' => $this->func->generateGuid(),
                    'TopUserGuid' => $topuserguid,
                    'Status' => $post['status'],
                    'Role' => 3,
                    'LoginTry' => 1,
                    'LoginToken' => "",
                    'CreatedDate' => date('Y-m-d H:i:s'),
                    'UpdatedDate' => date('Y-m-d H:i:s'),
                ];
                $insert = $this->db->addData('gs_users', $data);
                if ($insert) {
                    // ------------------------------------------------------------------ Buraya da araca ve şubeye atama yapılacak
                    $message = [
                        'type' => 'success',
                        'message' => 'Operatör başarıyla eklendi.'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Operatör eklenirken bir hata oluştu.'
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
    public function delete($guid)
    {
    }
}
