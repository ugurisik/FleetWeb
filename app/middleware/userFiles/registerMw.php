<?php

namespace App\middleware\userFiles;

use App\model\database as db;
use App\helpers\utils\security as security;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;

class registerMw
{
    public $db, $func, $mailer;
    public function __construct()
    {
        $this->db = new db;
        $this->func = new functions;
        $this->mailer = new mailer;
    }
    public function insert($post)
    {
        $this->checkUser($post['username']);
        if ($post['username'] != '' && $post['password'] != '') {
            $username = security::filter($post['username']);
            $password = security::filter($post['password']);



            $guid = $this->func->generateGuid();
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $role = 2;
            $status = 1;
            $requestToken = $this->func->generateGuid();
            $requestCode = $this->func->generateRandom(8);
            $loginToken = $this->func->generateGuid();
            $usernameClean = $this->func->lowerCase($this->func->SeoUrl($username));

            $data = [
                'Guid' => $guid,
                'UserName' => $usernameClean,
                'Email' => "user@user.com",
                'Password' => $passwordHashed,
                'Role' => $role,
                'Status' => $status,
                'RequestToken' => $requestToken,
                'RequestCode' => $requestCode,
                'RequestDate' => date('Y-m-d H:i:s'),
                'LoginToken' => $loginToken,
            ];
            $insert = $this->db->addData('swp_user', $data);
            if ($insert) {
                $data = [
                    'Guid' => $this->func->generateGuid(),
                    'UserGuid' => $guid,
                    'FirstName' => "Haribo",
                    'LastName' => "X",
                ];
                $insert = $this->db->addData('swp_user_information', $data);
                $message = [
                    'Status' => true,
                    'Message' => 'Kayıt işlemi başarılı.'
                ];
                //$this->mailer->sendMail($email, 'Kayit Onayi', 'Merhaba, <br> Kayıt işleminizi tamamlamak için <a href="' . SITE_URL . '/register/confirm/' . $requestToken . '">buraya</a> tıklayınız. Açılan sayfada kod kısmına <b>' . $requestCode . '</b> yazınız. <br> Saygılarımızla, <br> ' . SITE_NAME);
            } else {
                $message = [
                    'Status' => false,
                    'Message' => 'Kayıt işlemi başarısız. Lütfen daha sonra tekrar deneyiniz.'
                ];
            }
        } else {
            $message = [
                'Status' => false,
                'Message' => 'Lütfen boş alan bırakmayınız.'
            ];
        }
        echo json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function checkUser($username)
    {
        $username = security::filter($username);
        $usernameClean = $this->func->lowerCase($this->func->SeoUrl($username));
        $data = $this->db->getDataOrWhere('swp_user', ['UserName' => $usernameClean]);
        if (!empty($data)) {
            $message = [
                'Status' => false,
                'Message' => 'Kullanıcı adı kullanılmaktadır.'
            ];
            echo json_encode($message, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }

    public function requestTokenCheck($token)
    {
        $data = $this->db->getOneData('swp_user', ['RequestToken' => $token]);
        if (empty($data)) {
            $message = [
                'Status' => false,
                'Message' => 'Token geçersiz.' . $token
            ];
        } else {
            $tokenTime = strtotime($data['RequestDate']);
            $now = strtotime(date('Y-m-d H:i:s'));
            $diff = $now - $tokenTime;
            if ($diff > 3600) {
                $message = [
                    'Status' => false,
                    'Message' => 'Token süresi dolmuştur.'
                ];
            } else {
                $message = [
                    'Status' => true,
                    'Message' => 'Token geçerlidir.'
                ];
            }
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function confirm($post, $token)
    {
        $status =  json_decode($this->requestTokenCheck($token), true)['Status'];
        if (isset($post['code']) && isset($post['token'])) {
            $code = security::filter($post['code']);
            $formtoken = $post['token'];
            if (security::formTokenCheck($formtoken)) {
                if (!$status) {
                    $message = [
                        'Status' => false,
                        'Message' => 'Token süresi dolmuştur. Lütfen tekrar gönderim yapınız!'
                    ];
                } else {
                    $data = $this->db->getOneData('swp_user', ['RequestToken' => $token]);
                    if ($data['RequestCode'] == $code) {
                        $update = $this->db->updateData('swp_user', ['Status' => 1], ['RequestToken' => $token]);
                        if ($update) {
                            $message = [
                                'Status' => true,
                                'Message' => 'Kayıt işlemi başarılı. Lütfen giriş yapınız.'
                            ];
                            $this->mailer->sendMail($data['Email'], 'Kayit Onayi', 'Merhaba, <br> Kayıt işleminiz başarıyla tamamlanmıştır. <br> Saygılarımızla, <br> ' . SITE_NAME);
                        } else {
                            $message = [
                                'Status' => false,
                                'Message' => 'Kayıt işlemi başarısız. Lütfen daha sonra tekrar deneyiniz.'
                            ];
                            $this->mailer->sendMail($data['Email'], 'Kayit Onayi', 'Merhaba, <br> Kayıt işleminiz başarısız. Lütfen daha sonra tekrar deneyiniz. Sorun devam ederse site yöneticisi ile iletişime geçiniz! <br> Saygılarımızla, <br> ' . SITE_NAME);
                        }
                    } else {
                        $message = [
                            'Status' => false,
                            'Message' => 'Doğrulama kodu hatalı.'
                        ];
                    }
                }
            } else {
                $message = [
                    'Status' => false,
                    'Message' => 'Form tokeni hatalı. Lütfen sayfayı yenileyiniz.'
                ];
            }
        } else {
            $message = [
                'Status' => false,
                'Message' => 'Lütfen boş alan bırakmayınız.'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
}
