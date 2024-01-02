<?php

namespace App\middleware\userFiles;

use App\model\database as db;
use App\helpers\utils\functions as functions;
use App\helpers\mail\ppMailer as mailer;
use App\helpers\utils\session as session;
use App\middleware\userFiles\userAuthMw as authMw;
use App\helpers\utils\frontEnd as frontEnd;


class paymentMw
{
    public $db, $func, $mailer, $session;

    public $paymentForm = [
        'merchant' => 'b4541e908f3ca0acef0b7da7ee599be7',
        'item_name' => 'Haribox',
        'currency' => 'usd',
        'ipn_url' => SITE_URL . '/payment/ipn/{guid}',
        'success_url' => SITE_URL . '/payment/success/{guid}',
        'cancel_url' => SITE_URL . '/payment/cancel/{guid}',
        'custom' => '123',
        'cmd' => '_pay_simple',
        'want_shipping' => 0,
        'price' => 1
    ];


    public $fakeFirstNames = [
        'John',
        'Jane',
        'Jack',
        'Joe',
        'Jill',
        'Jesse',
        'Jenny',
        'Jerry',
        'Jen',
        'Jenna',
        'Jasmine',
        'Jasper',
        'Jared',
        'Jude',
        'April',
        'Amanda',
        'Amy',
        'Ashley',
        'Anna',
        'Angela',
        'Allison',
        'Alyssa',
        'Alex',
        'Alexis',
        'Alice',
        'Abby',
        'Abigail',
        'Aaliyah',
        'Aaron',
        'Adam',
        'Adrian',
        'Aidan',
        'Alan',
        'Albert',
        'Alex',
        'Alexander',
        'Andrew',
        'Andy',
        'Anthony',
        'Austin',
        'Ben',
        'Benjamin',
        'Brad',
        'Brandon',
        'Brayden',
        'Caleb',
        'Cameron',
        'Carter',
        'Charles',
        'David',
        'Dylan',
        'Elijah',
        'Ethan',
        'Evan',
        'Gabriel',
        'Gavin',
        'Hunter',
        'Ian',
        'Isaac',
        'Kayden',
        'Kevin',
        'Kyle',
        'Zachary'
    ];
    public $fakeLastNames = [
        'Smith',
        'Johnson',
        'Williams',
        'Brown',
        'Jones',
        'Miller',
        'Davis',
        'Garcia',
        'Rodriguez',
        'Wilson',
        'Martinez',
        'Anderson',
        'Taylor',
        'Thomas',
        'Hernandez',
        'Moore',
        'Martin',
        'Jackson',
        'Thompson',
        'White',
        'Lopez',
        'Lee',
        'Gonzalez',
        'Harris',
        'Clark',
        'Lewis',
        'Robinson',
        'Walker',
        'Perez',
        'Hall',
        'Young',
        'Allen',
        'Sanchez',
        'Wright',
        'King',
        'Scott',
        'Green',
        'Baker',
        'Adams',
        'Nelson',
        'Hill',
        'Ramirez',
        'Campbell',
        'Mitchell',
        'Roberts',
        'Carter',
        'Phillips',
        'Evans',
        'Turner',
        'Torres',
        'Parker',
        'Collins',
        'Edwards',
        'Stewart',
        'Flores',
        'Morris',
        'Nguyen',
        'Murphy',
        'Rivera',
        'Cook',
        'Rogers',
        'Morgan',
        'Peterson',
        'Cooper',
        'Reed',
        'Bailey',
        'Bell',
        'Gomez',
        'Kelly',
        'Howard',
        'Ward',
        'Cox',
        'Diaz',
        'Richardson',
        'Wood',
        'Watson',
        'Brooks',
        'Bennett',
        'Gray',
        'James',
        'Reyes',
        'Cruz',
        'Hughes',
        'Price',
        'Myers',
        'Long',
        'Foster',
        'Sanders',
        'Ross',
        'Morales',
        'Powell',
        'Sullivan',
        'Russell',
        'Ortiz',
        'Jenkins',
        'Gutierrez',
        'Perry',
        'Butler',
        'Barnes',
        'Fisher'
    ];



    public function __construct()
    {
        $this->db = new db;
        $this->func = new functions;
        $this->mailer = new mailer;
        $this->session = new session;
    }

    public function addOrder()
    {
        $baskets = $this->session->getSession('BASKET');
        $amount = 0.0;
        foreach ($baskets as $basket) {
            $amount += $basket['Data'];
        }
        $guid = $this->func->generateGuid();
        $randMail = strtolower($this->func->generateRandomString(10)) . '@' . strtolower($this->func->generateRandomString(5)) . '.com';
        $data = [
            'Guid' => $guid,
            'UserGuid' => $this->session->getSession('USER_GUID'),
            'Products' => json_encode($baskets),
            'Amount' => $amount,
            'RandMail' => $randMail,
            'Currency' => 'USD',
            'Status' => 0,
            'CreatedDate' => date('Y-m-d H:i:s'),
            'Response' => ''
        ];
        $insert = $this->db->addData('swp_orders', $data);
        if ($insert) {
            $this->session->createSession(['BASKET' => null]);
            return [
                'Guid' => $guid,
                'RandMail' => $randMail,
                'Amount' => $amount
            ];
        } else {
            return false;
        }
    }

    public function isLogged()
    {
        $LoginToken = $this->session->getSession(LOGIN_TOKEN_USER);
        $LoginTokenTime = $this->session->getSession(LOGIN_TOKEN_TIME_USER);
        $Login = $this->session->getSession(LOGIN_USER);
        $LoginTokenTimeLimit = LOGIN_TOKEN_TIME_USER_LIMIT;
        $data = $this->db->getOneData('swp_user', ['LoginToken' => $LoginToken]);
        if (empty($data)) {
            return false;
        } else {
            if ($LoginToken == $data['LoginToken']) {
                if (time() - $LoginTokenTime > $LoginTokenTimeLimit) {
                    return false;
                } else {
                    if ($Login) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        }
    }

    public function checkBasket()
    {
        $baskets = $this->session->getSession('BASKET');
        if (empty($baskets)) {
            return false;
        } else {
            return true;
        }
    }

    public function pay()
    {
        if ($this->isLogged()) {
            if ($this->checkBasket() == false) {
                $message = [
                    'status' => 'error',
                    'message' => 'Your basket is empty'
                ];
            } else {
                $addOrder = $this->addOrder();
                if ($addOrder == false) {
                    $message = [
                        'status' => 'error',
                        'message' => 'There was a problem with your order'
                    ];
                } else {
                    $payform = '<form action="https://www.coinpayments.net/index.php" method="post" name="paymentForm">';
                    foreach ($this->paymentForm as $key => $value) {
                        $payform .= '<input type="hidden" name="' . $key . '" value="' . str_replace("{guid}", $addOrder['Guid'], $value) . '">';
                    }
                    $payform .= '<input type="hidden" name="amountf" value="' . $addOrder['Amount'] . '">';
                    $payform .= '<input type="hidden" name="email" value="' . $addOrder['RandMail'] . '">';
                    $payform .= '<input type="hidden" name="first_name" value="' . $this->fakeFirstNames[rand(0, count($this->fakeFirstNames) - 1)] . '">';
                    $payform .= '<input type="hidden" name="last_name" value="' . $this->fakeLastNames[rand(0, count($this->fakeLastNames) - 1)] . '">';
                    $payform .= '<input type="submit" value="Pay Now">';
                    $payform .= '</form>';
                    $message = [
                        'status' => 'success',
                        'message' => 'Your order has been received',
                        'payform' => $payform
                    ];
                }
            }
        } else {
            $message = [
                'status' => 'error',
                'message' => 'You are not logged in'
            ];
        }
        echo json_encode($message, JSON_UNESCAPED_UNICODE);
    }


    public function update($data, $guid, $type)
    {
        $data['Typeeeeee'] = $type;
        $dd = [
            'Response' => json_encode($data, JSON_UNESCAPED_UNICODE),
        ];
        if ($type == 'ipn') {
            $dd['StatusText'] = $data['status_text'];
            $dd['_Status'] = $data['status'];
            $dd['TxnID'] = $data['txn_id'];
        } elseif ($type == 'success') {
            $dd['StatusText'] = 'Success';
            $dd['_Status'] = 100;
        } elseif ($type == 'cancel') {
            $dd['StatusText'] = 'Cancel';
            $dd['_Status'] = 0;
            $dd['TxnID'] = $data['txn_id'];
        }
        $update = $this->db->updateData('swp_orders', $dd, ['Guid' => $guid]);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function paymentCheck($tx_id)
    {
        $req['version'] = 1;
        $req['cmd'] = "get_tx_info";
        $req['key'] = "4e23d1f23efa8afa12e616e2b745479a42dd1b1f4a2e0133e7de9f4eb7b87235";
        $req['format'] = 'json';
        $req['txid'] = $tx_id;
        $post_data = http_build_query($req, '', '&');
        $hmac = hash_hmac('sha512', $post_data, "d1E4AB40a7d62C28ce4F8E70d7c66A1E2eC5465F3f134Ca6ac24C014E3efD895");
        $ch = curl_init('https://www.coinpayments.net/api.php');
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $data = curl_exec($ch);
        if ($data === FALSE) {
            return false;
        }
        curl_close($ch);
        $result = json_decode($data, TRUE);
        if (!isset($result['error']) || $result['error'] != 'ok') {
            return false;
        } else {
            return $result;
        }
    }

    public function getLastOrders()
    {
        $lastmin = date('Y-m-d H:i:s', strtotime('-166 minutes'));
        $query = "SELECT * FROM swp_orders where CreatedDate >='" . $lastmin . "' ORDER BY CreatedDate DESC";
        return $this->db->rawQuery($query);
    }

    public function cron()
    {
        $orders = $this->getLastOrders();
        foreach ($orders as $order) {
            if ($order['Response'] != null || $order['Response'] != '') {
                $response = json_decode($order['Response'], true);
                $tx_id = $response['txn_id'];
                $check = $this->paymentCheck($tx_id);
                if ($check['error'] == 'ok') {
                    $data = [
                        '_Status' => $check['result']['status'],
                        'StatusText' => $check['result']['status_text'],
                        'TxnID' => $response['txn_id'],
                    ];
                    $update = $this->db->updateData('swp_orders', $data, ['Guid' => $order['Guid']]);
                }
            }
        }
    }
}
