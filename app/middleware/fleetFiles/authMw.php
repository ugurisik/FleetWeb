<?php

namespace App\middleware\fleetFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\helpers\utils\security as security;
use App\helpers\utils\frontEnd as frontEnd;

class authMw
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
    public function login($username, $password, $token = null)
    {
        if (!$this->tokenCheck($token)) {
            $message = [
                'type' => 'error',
                'message' => 'Token Hatası!'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        if ($this->checkIPLoginBan()) {
            $message = [
                'type' => 'error',
                'message' => 'Hesabınız 15 dakika boyunca askıya alınmıştır.'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        $data = $this->db->getOneData('gs_users', ['username' => $username]);
        if (!empty($data)) {
            if ($data['password'] == md5($password)) {
                if ($data['Status']) {
                    if ($this->findTopUser($data['Guid'])['Status']) {
                        $token = $this->func->generateGuid();
                        $datas = [
                            'LoginToken' => $token,
                            'LoginTry' => 1,
                        ];
                        $this->db->updateData('gs_users', $datas, ['Guid' => $data['Guid']]);
                        $this->session->createSession([
                            LOGIN_USER => true,
                            LOGIN_TOKEN_USER => $token,
                            LOGIN_TOKEN_TIME_USER => time(),
                            'USER_GUID' => $data['Guid'],
                        ]);
                        $datas = [
                            'Guid' => $this->func->generateGuid(),
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
                            'type' => 'success',
                            'message' => 'Giriş Başarılı! Yönlendiriliyorsunuz...',
                        ];
                    } else {
                        $message = [
                            'type' => 'error',
                            'message' => 'Ana hesabınız askıya alınmıştır!'
                        ];
                    }
                } else if ($data['Status'] == 2) {
                    $message = [
                        'type' => 'error',
                        'message' => 'Hesabınız askıya alınmıştır!'
                    ];
                } else {
                    $message = [
                        'type' => 'error',
                        'message' => 'Hesabınız aktif değildir!'
                    ];
                }
            } else {
                if ($data['LoginTry'] < 3) {
                    $up = $data['LoginTry'] + 1;
                    $datas = [
                        'LoginTry' => $up,
                    ];
                    $this->db->updateData('gs_users', $datas, ['Guid' => $data['Guid']]);
                    $datas = [
                        'Guid' => $this->func->generateGuid(),
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
                        'type' => 'error',
                        'message' => 'Kullanıcı adı veya şifre hatalı!'
                    ];
                } else if ($data['LoginTry'] == 3) {
                    if (!$this->checkIpLoginBan()) {
                        $datas = [
                            'StartDate' => date('Y-m-d H:i:s'),
                            'EndDate' => date('Y-m-d H:i:s', strtotime('+15 minutes')),
                            'UserIP' => security::getIP(),
                            'Guid' => $this->func->generateGuid(),
                        ];
                        $this->db->addData('swp_user_login_ban', $datas);
                    }
                    $message = [
                        'type' => 'error',
                        'message' => 'Hatalı giriş denemesi sebebiyle hesabınız 15 dakika boyunca askıya alınmıştır!'
                    ];
                } else {
                    $datas = [
                        'Guid' => $this->func->generateGuid(),
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
                        'message' => 'Kullanıcı adı veya şifre hatalı!'
                    ];
                }
            }
        } else {
            $message = [
                'type' => 'error',
                'message' => 'Kullanıcı bulunamadı!'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function checkIPLoginBan()
    {
        $data = $this->db->getOneData('swp_user_login_ban', ['UserIP' => security::getIP()], [], ['ID' => 'desc']);
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
        $LoginToken = $this->session->getSession(LOGIN_TOKEN_USER);
        $LoginTokenTime = $this->session->getSession(LOGIN_TOKEN_TIME_USER);
        $Login = $this->session->getSession(LOGIN_USER);
        $LoginTokenTimeLimit = LOGIN_TOKEN_TIME_USER_LIMIT;
        $data = $this->db->getOneData('gs_users', ['LoginToken' => $LoginToken]);
        if (empty($data)) {
            //$this->session->allSessionDelete();
            if (!$isRedirectMain) {
                $this->func->Redirect(SITE_URL  . '/login');
            }
        } else {
            if ($LoginToken == $data['LoginToken']) {
                if (time() - $LoginTokenTime > $LoginTokenTimeLimit) {
                    $this->session->allSessionDelete();
                    $this->func->Redirect(SITE_URL  . '/login');
                } else {
                    if ($Login) {
                        if ($isRedirectMain) {
                            $this->func->Redirect(SITE_URL . '/fleet');
                        }
                    } else {
                        $this->session->allSessionDelete();
                        if (!$isRedirectMain) {
                            $this->func->Redirect(SITE_URL . '/login');
                        }
                    }
                }
            } else {
                $this->session->allSessionDelete();
                if (!$isRedirectMain) {
                    $this->func->Redirect(SITE_URL . '/login');
                }
            }
        }
    }
    public function logout()
    {
        $this->session->allSessionDelete();
        $this->func->Redirect(SITE_URL . '/login');
    }
    public function tokenCheck($token)
    {
        if ($this->session->getSession(TOKENIZER) != $token) {
            return false;
        } else {
            return true;
        }
    }

    public function findTopUser($guid = null)
    {
        if ($guid == null) {
            $guid = $this->session->getSession('USER_GUID');
        }
        $data = $this->db->getOneData('gs_users', ['Guid' => $guid]);
        if (!empty($data)) {
            if ($data['TopUserGuid'] == '0') {
                return $data;
            } else {
                return $this->findTopUser($data['TopUserGuid']);
            }
        } else {
            return false;
        }
    }

    public function findSubUser($guid = null, $data = [])
    {
        if ($guid == null) {
            $guid = $this->session->getSession('USER_GUID');
        }
        $datas = $this->db->getOneData('gs_users', ['TopUserGuid' => $guid]);
        if (!empty($datas)) {
            $data[] = $datas;
            return $this->findSubUser($datas['Guid'], $data);
        } else {
            return $data;
        }
    }
}
