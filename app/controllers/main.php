<?php

use App\middleware\fleetFiles\userMw as userMw;

class main extends controller
{
    public function index(...$params)
    {
        // $user = new userMw;
        // echo $user->insert($params[0], $params[1]);
        $gs_users = array(
            array('id' => '1197', 'server' => '0', 'customer_id' => '0', 'active' => '1', 'account_expire' => '0', 'account_expire_dt' => '0000-00-00', 'privileges' => '{"type":"operator","map_osm":false,"map_bing":false,"map_google":true,"map_google_street_view":true,"map_google_traffic":true,"map_mapbox":false,"map_yandex":false,"history":true,"reports":true,"tasks":false,"rilogbook":false,"dtc":false,"object_control":false,"image_gallery":false,"chat":false,"subaccounts":true}', 'manager_id' => '0', 'manager_billing' => '0', 'username' => 'ugurisik', 'password' => '81dc9bdb52d04dc20036dbd8313ed055', 'sess_hash' => '-', 'email' => 'demo@safari-gps.com.tr', 'api' => '1', 'api_key' => 'B9707CCE2C65B247668A12B371D96BBF', 'dt_reg' => '2023-12-25 01:05:13', 'dt_login' => '2023-12-25 01:05:13', 'ip' => '::1', 'notify_account_expire' => '-', 'notify_object_expire' => '-', 'info' => '{"fname":"UĞUR","lname":"IŞIK","company":"-","address":"KAYSERİ","post_code":"-","city":"-","country":"-","phone":"0544524115","phone1":"-","phone2":"-","email":"-","licenseLastDate":"2028-11-11","licenseType":"B","notes":"ÖZEL NOT ALANI","licenseImages":"\\"[\\\\\\"public\\\\\\/2023\\\\\\/license\\\\\\/6588aa7d594627.07765932.png\\\\\\",\\\\\\"public\\\\\\/2023\\\\\\/license\\\\\\/6588aa7d5be288.66483719.jpg\\\\\\"]\\""}', 'comment' => '-', 'obj_add' => '0', 'obj_limit' => '0', 'obj_limit_num' => '0', 'obj_days' => '0', 'obj_days_dt' => '0000-00-00', 'obj_edit' => '1', 'obj_history_clear' => '1', 'currency' => 'EUR', 'timezone' => '+ 1 hour', 'dst' => '1', 'dst_start' => '03-31 02:00', 'dst_end' => '10-29 03:00', 'language' => 'en', 'units' => 'km,l,c', 'map_sp' => 'last', 'map_is' => '1', 'map_rc' => '-', 'map_rhc' => '-', 'groups_collapsed' => '-', 'od' => '1', 'ohc' => '-', 'chat_notify' => '-', 'sms_gateway_server' => '-', 'sms_gateway' => '-', 'sms_gateway_type' => '-', 'sms_gateway_url' => '-', 'sms_gateway_identifier' => '-', 'places_markers' => '-', 'places_routes' => '-', 'places_zones' => '-', 'usage_email_daily' => '-', 'usage_sms_daily' => '-', 'usage_api_daily' => '-', 'usage_email_daily_cnt' => '0', 'usage_sms_daily_cnt' => '0', 'usage_api_daily_cnt' => '0', 'dt_usage_d' => '2023-12-22', 'land' => '0', 'Guid' => '3DCF07BD-1A41-0AFF-45D9-DAFCFB89FD03', 'TopUserGuid' => '2288E0E8-5707-01E8-55F0-61EFE3848997', 'Status' => '1', 'Role' => '3', 'LoginTry' => '1', 'LoginToken' => '', 'CreatedDate' => '2023-12-25 01:05:13', 'UpdatedDate' => '2023-12-25 01:05:13')
        );
        $gs_users[0]['privileges'] = json_decode($gs_users[0]['privileges'], true);
        $gs_users[0]['info'] = json_decode($gs_users[0]['info'], true);
        echo json_encode($gs_users, JSON_UNESCAPED_UNICODE);
        echo 'main controller index method';
    }
}
