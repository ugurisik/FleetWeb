<?php

namespace App\middleware\adminFiles;

use App\model\database as db;
use App\helpers\utils\security as security;
use App\helpers\utils\session as session;
use App\helpers\utils\functions as functions;

class postMw
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
            'Type' => 'post'
        ];
        $categories = $this->db->getData('swp_categories', $data);
        $ct = [];
        foreach ($categories as $value) {
            $data = [
                'TopGuid' => $value['Guid'],
                'Type' => 'post'
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
        $posts = $this->db->get('swp_posts');
        foreach ($posts as $key => $post) {
            $data = [
                'Guid' => $post['CategoryGuid'],
                'Type' => 'post'
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
                'CreatedDate' => date('Y-m-d H:i:s'),
                'UpdatedDate' => date('Y-m-d H:i:s')
            ];
            $insert = $this->db->addData('swp_posts', $data);
            if ($insert) {
                $message = [
                    'type' => 'success',
                    'message' => 'Sayfa başarıyla eklendi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Sayfa eklenirken bir hata oluştu.'
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
        $category = $this->db->getOneData('swp_posts', $data);
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
                'Media' => json_encode($post['files2']),
                'UpdatedDate' => date('Y-m-d H:i:s')
            ];
            $where = [
                'Guid' => $post['guid']
            ];
            $update = $this->db->updateData('swp_posts', $data, $where);
            if ($update) {
                $message = [
                    'type' => 'success',
                    'message' => 'Sayfa başarıyla güncellendi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Sayfa güncellenirken bir hata oluştu.'
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
            $delete = $this->db->deleteData('swp_posts', $data);
            if ($delete) {
                $message = [
                    'type' => 'success',
                    'message' => 'Sayfa başarıyla silindi.'
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'message' => 'Sayfa silinirken bir hata oluştu.'
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
