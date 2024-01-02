<?php

namespace App\middleware\adminFiles;

use App\model\database as db;
use App\helpers\utils\security as security;
use App\helpers\utils\session as session;
use App\helpers\utils\functions as functions;

class authMw
{
    public $db, $session, $functions;
    public function __construct()
    {
        $this->db = new db();
        $this->session = new session();
        $this->functions = new functions();
    }
    public function login($username, $password)
    {
        if ($this->checkIPLoginBan()) {
            $message = [
                'Status' => false,
                'Message' => 'Hesabınız 15 dakika boyunca askıya alınmıştır.'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        $data = $this->db->getDataOrWhere('swp_user', ['Username' => $username, 'Email' => $username])[0];
        if (!empty($data)) {
            if (password_verify($password,$data['Password'])) {
                if ($data['Role'] == 0 || $data['Role'] == 1) {
                    if ($data['Status']) {
                        $token = $this->functions->generateGuid();
                        $datas = [
                            'LoginToken' => $token,
                            'LoginTry' => 1,
                        ];
                        $this->db->updateData('swp_user', $datas, ['Guid' => $data['Guid']]);
                        $this->session->createSession([
                            LOGIN_ADMIN => true,
                            LOGIN_TOKEN_ADMIN => $token,
                            LOGIN_TOKEN_TIME_ADMIN => time(),
                            'USER_GUID' => $data['Guid'],
                        ]);
                        $datas = [
                            'Guid' => $this->functions->generateGuid(),
                            'UserGuid' => $data['Guid'],
                            'Browser' => security::getBrowser(),
                            'IP' => security::getIP(),
                            'OS' => security::getOS(),
                            'UserAgent' => security::getUserAgent(),
                            'BrowserLang' => security::getLang(),
                            'Location' => '-'
                        ];
                        $this->db->addData('swp_user_login_info', $datas);
                        $message = [
                            'Status' => true,
                            'Message' => 'Giriş Başarılı!',
                        ];
                    } elseif ($data['Status'] == 2) {
                        $message = [
                            'Status' => false,
                            'Message' => 'Hesabınız askıya alınmıştır!'
                        ];
                    } else {
                        $message = [
                            'Status' => false,
                            'Message' => 'Hesabınız aktif değil!'
                        ];
                    }
                } else {
                    $message = [
                        'Status' => false,
                        'Message' => 'Bu sayfaya erişim yetkiniz bulunmamaktadır!'
                    ];
                }
            } else {
                if ($data['LoginTry'] < 3) {
                    $up = $data['LoginTry'] + 1;
                    $datas = [
                        'LoginTry' => $up,
                    ];
                    $this->db->updateData('swp_user', $datas, ['Guid' => $data['Guid']]);
                    $datas = [
                        'Guid' => $this->functions->generateGuid(),
                        'UserGuid' => $data['Guid'],
                        'Browser' => security::getBrowser(),
                        'IP' => security::getIP(),
                        'OS' => security::getOS(),
                        'UserAgent' => security::getUserAgent(),
                        'BrowserLang' => security::getLang(),
                        'Location' => '-',
                        'UserName_Mail' => $username,
                        'Password' => $password
                    ];
                    $this->db->addData('swp_user_login_error', $datas);
                    $message = [
                        'Success' => false,
                        'Message' => 'Kullanıcı adı veya şifre hatalı!1'
                    ];
                } elseif ($data['LoginTry'] == 3) {
                    if (!$this->checkIpLoginBan()) {
                        $datas = [
                            'StartDate' => date('Y-m-d H:i:s'),
                            'EndDate' => date('Y-m-d H:i:s', strtotime('+15 minutes')),
                            'UserIP' => security::getIP(),
                            'Guid' => $this->functions->generateGuid(),
                        ];
                        $this->db->addData('swp_user_login_ban', $datas);
                    }
                    $message = [
                        'Status' => false,
                        'Message' => 'Hatalı giriş denemesi sebebiyle hesabınız 15 dakika boyunca askıya alınmıştır!'
                    ];
                } else {
                    $datas = [
                        'Guid' => $this->functions->generateGuid(),
                        'UserGuid' => $data['Guid'],
                        'Browser' => security::getBrowser(),
                        'IP' => security::getIP(),
                        'OS' => security::getOS(),
                        'UserAgent' => security::getUserAgent(),
                        'BrowserLang' => security::getLang(),
                        'Location' => '-',
                        'UserName_Mail' => $username,
                        'Password' => $password
                    ];
                    $this->db->addData('swp_user_login_error', $datas);
                    $message = [
                        'Status' => false,
                        'Message' => 'Kullanıcı adı veya şifre hatalı!2'
                    ];
                }
            }
        } else {
            $message = [
                'Status' => false,
                'Message' => 'Kullanıcı bulunamadı!'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function checkIPLoginBan()
    {
        $data = $this->db->getOneData('swp_user_login_ban', ['UserIP' => security::getIP()],[],['ID' => 'desc']);
        if (empty($data)) {
            return false;
        } else {
            if ($data['EndDate'] > date('Y-m-d H:i:s')) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function isLogged($isRedirectMain = true)
    {
        $LoginToken = $this->session->getSession(LOGIN_TOKEN_ADMIN);
        $LoginTokenTime = $this->session->getSession(LOGIN_TOKEN_TIME_ADMIN);
        $Login = $this->session->getSession(LOGIN_ADMIN);
        $LoginTokenTimeLimit = LOGIN_TOKEN_TIME_ADMIN_LIMIT;
        $data = $this->db->getOneData('swp_user', ['LoginToken' => $LoginToken]);
        if (empty($data)) {
            //$this->session->allSessionDelete();
            if (!$isRedirectMain) {
                $this->functions->Redirect(SITE_URL . '/' . ADMIN_URI . '/login');
            }
        } else {
            if ($LoginToken == $data['LoginToken']) {
                if (time() - $LoginTokenTime > $LoginTokenTimeLimit) {
                    $this->session->allSessionDelete();
                    $this->functions->Redirect(SITE_URL . '/' . ADMIN_URI . '/login');
                } else {
                    if ($Login) {
                        if ($isRedirectMain) {
                            $this->functions->Redirect(SITE_URL . '/' . ADMIN_URI . '/main');
                        }
                    } else {
                        $this->session->allSessionDelete();
                        if (!$isRedirectMain) {
                            $this->functions->Redirect(SITE_URL . '/' . ADMIN_URI . '/login');
                        }
                    }
                }
            } else {
                $this->session->allSessionDelete();
                if (!$isRedirectMain) {
                    $this->functions->Redirect(SITE_URL . '/' . ADMIN_URI . '/login');
                }
            }
        }
    }
    public function tokenCheck($token)
    {
        if ($this->session->getSession(TOKENIZER) != $token) {
            return false;
        }
    }
    public function logout()
    {
        $this->session->allSessionDelete();
        $this->functions->Redirect(SITE_URL . '/' . ADMIN_URI . '/login');
    }
}
