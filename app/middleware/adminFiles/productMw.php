<?php

namespace App\middleware\adminFiles;

use App\model\database as db;
use App\helpers\utils\security as security;
use App\helpers\utils\session as session;
use App\helpers\utils\functions as functions;

class productMw
{
    public $db, $session, $functions;
    public function __construct()
    {
        $this->db = new db();
        $this->session = new session();
        $this->functions = new functions();
    }
    public function getCategories()
    {
        $data = [
            'TopGuid' => '0',
            'Type' => 'product'
        ];
        $categories = $this->db->getData('swp_categories', $data);
        $ct = [];
        foreach ($categories as $value) {
            $data = [
                'TopGuid' => $value['Guid'],
                'Type' => 'product'
            ];
            $subcategories = $this->db->getData('swp_categories', $data);
            $ct[] = [
                'TopCategory' => $value,
                'SubCategories' => $subcategories
            ];
        }
        return $ct;
    }
    public function getPosts()
    {
        $posts = $this->db->get('swp_products');
        foreach ($posts as $key => $post) {
            $data = [
                'Guid' => $post['CategoryGuid'],
                'Type' => 'product'
            ];
            $category = $this->db->getOneData('swp_categories', $data);
            $posts[$key]['Category'] = $category['Title'];
        }
        return $posts;
    }
    public function insert($post)
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
                'CategoryGuid' => $post['category'],
                'Title' => $post['title'],
                'Content' => $post['description'],
                'MetaTitle' => $post['seotitle'],
                'MetaContent' => $post['seocontent'],
                'MetaKeywords' => $post['seokeywords'],
                'Cover' => $post['files'][0],
                'Media' => json_encode($post['files2']),
                'SeoUrl' => $seourl,
                'Price' => $post['price'],
                'Discount' => json_encode($post['discount'], JSON_UNESCAPED_UNICODE),
                'SubTitle' => $post['subtitle'],
                'Status' => 1,
                'CreatedDate' => date('Y-m-d H:i:s'),
                'UpdatedDate' => date('Y-m-d H:i:s'),
                'Type' => $post['type']
            ];
            $insert = $this->db->addData('swp_products', $data);
            if ($insert) {
                $message = [
                    'type' => 'success',
                    'message' => 'Ürün başarıyla eklendi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Ürün eklenirken bir hata oluştu.'
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
    public function getPost($guid)
    {
        $data = [
            'Guid' => $guid
        ];
        $category = $this->db->getOneData('swp_products', $data);
        return $category;
    }
    public function update($post)
    {
        if (isset($post['category']) && isset($post['title']) && isset($post['description']) && isset($post['seotitle']) && isset($post['seocontent']) && isset($post['seokeywords'])) {
            $keywords = [];
            foreach (json_decode($post['seokeywords'], true) as $value) {
                $keywords[] = $value['value'];
            }
            $post['seokeywords'] = implode(',', $keywords);
            $seourl = $this->functions->seoUrl($post['seotitle']) . '-' . $this->functions->generateRandomNumber(3);
            $data = [
                'CategoryGuid' => $post['category'],
                'Title' => $post['title'],
                'Content' => $post['description'],
                'MetaTitle' => $post['seotitle'],
                'MetaContent' => $post['seocontent'],
                'MetaKeywords' => $post['seokeywords'],
                'Cover' => $post['files'][0],
                'SeoUrl' => $seourl,
                'Price' => $post['price'],
                'Discount' => json_encode($post['discount'], JSON_UNESCAPED_UNICODE),
                'SubTitle' => $post['subtitle'],
                'Status' => 1,
                'Media' => json_encode($post['files2']),
                'UpdatedDate' => date('Y-m-d H:i:s'),
                'Type' => $post['type']
            ];
            $where = [
                'Guid' => $post['guid']
            ];
            $update = $this->db->updateData('swp_products', $data, $where);
            if ($update) {
                $message = [
                    'type' => 'success',
                    'message' => 'Ürün başarıyla güncellendi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Ürün güncellenirken bir hata oluştu.'
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
            $delete = $this->db->deleteData('swp_products', $data);
            if ($delete) {
                $message = [
                    'type' => 'success',
                    'message' => 'Ürün başarıyla silindi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Ürün silinirken bir hata oluştu.'
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
