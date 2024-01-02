<?php

namespace App\middleware\adminFiles;

use App\model\database as db;
use App\helpers\utils\security as security;
use App\helpers\utils\session as session;
use App\helpers\utils\functions as functions;

class categoriesMw
{
    public $db, $session, $functions;
    public function __construct()
    {
        $this->db = new db();
        $this->session = new session();
        $this->functions = new functions();
    }
    public function getCategories($param)
    {
        $data = [
            'TopGuid' => '0',
            'Type' => $param
        ];
        $categories = $this->db->getData('swp_categories', $data);
        $ct = [];
        foreach ($categories as $value) {
            $data = [
                'TopGuid' => $value['Guid'],
                'Type' => $param
            ];
            $subcategories = $this->db->getData('swp_categories', $data);
            $ct[] = [
                'TopCategory' => $value,
                'SubCategories' => $subcategories
            ];
        }
        return $ct;
    }
    public function insert($post, $param)
    {
        if (isset($post['category']) && isset($post['title']) && isset($post['description']) && isset($post['seotitle']) && isset($post['seocontent']) && isset($post['seokeywords'])) {
            $keywords = [];
            foreach (json_decode($post['seokeywords'], true) as $value) {
                $keywords[] = $value['value'];
            }
            $post['seokeywords'] = implode(',', $keywords);
            $seourl = $this->functions->seoUrl($post['seotitle']) . '-' . $this->functions->generateRandomNumber(3);
            $data = [
                'Guid' => $this->functions->generateGuid(),
                'TopGuid' => $post['category'],
                'Title' => $post['title'],
                'Content' => $post['description'],
                'MetaTitle' => $post['seotitle'],
                'MetaDescription' => $post['seocontent'],
                'MetaKeywords' => $post['seokeywords'],
                'Cover' => $post['files'][0],
                'SeoUrl' => $seourl,
                'Type' => $param,
                'CreatedDate' => date('Y-m-d H:i:s'),
                'UpdatedDate' => date('Y-m-d H:i:s')
            ];
            $insert = $this->db->addData('swp_categories', $data);
            if ($insert) {
                $message = [
                    'type' => 'success',
                    'message' => 'Kategori başarıyla eklendi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Kategori eklenirken bir hata oluştu.'
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
    public function getCategory($guid)
    {
        $data = [
            'Guid' => $guid
        ];
        $category = $this->db->getOneData('swp_categories', $data);
        return $category;
    }
    public function update($post, $param)
    {
        if (isset($post['category']) && isset($post['title']) && isset($post['description']) && isset($post['seotitle']) && isset($post['seocontent']) && isset($post['seokeywords'])) {
            $keywords = [];
            foreach (json_decode($post['seokeywords'], true) as $value) {
                $keywords[] = $value['value'];
            }
            $post['seokeywords'] = implode(',', $keywords);
            $seourl = $this->functions->seoUrl($post['seotitle']) . '-' . $this->functions->generateRandomNumber(3);
            $data = [
                'TopGuid' => $post['category'],
                'Title' => $post['title'],
                'Content' => $post['description'],
                'MetaTitle' => $post['seotitle'],
                'MetaDescription' => $post['seocontent'],
                'MetaKeywords' => $post['seokeywords'],
                'Cover' => $post['files'][0],
                'SeoUrl' => $seourl,
                'Type' => $param,
                'UpdatedDate' => date('Y-m-d H:i:s')
            ];
            $where = [
                'Guid' => $post['guid']
            ];
            $update = $this->db->updateData('swp_categories', $data, $where);
            if ($update) {
                $message = [
                    'type' => 'success',
                    'message' => 'Kategori başarıyla güncellendi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Kategori güncellenirken bir hata oluştu.'
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

    public function delete($post)
    {
        if (isset($post['guid'])) {
            $data = [
                'Guid' => $post['guid']
            ];
            $delete = $this->db->deleteData('swp_categories', $data);
            if ($delete) {
                $data = [
                    'TopGuid' => $post['guid']
                ];
                $delete = $this->db->deleteData('swp_categories', $data);
                $message = [
                    'type' => 'success',
                    'message' => 'Kategori başarıyla silindi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Kategori silinirken bir hata oluştu.'
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
}
