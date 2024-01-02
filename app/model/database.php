<?php

namespace App\model;

use MysqliDb as Db;

class database
{
    public $db;

    public function __construct()
    {
        $this->db = new DB(
            DB_HOST,
            DB_USER,
            DB_PASS,
            DB_NAME,
            DB_PORT,
            DB_CHARSET,
        );
    }
    public function get($table = 'sample', $limit = null, $order = ['ID' => 'desc'])
    {
        foreach ($order as $key => $value) {
            $this->db->orderBy($key, $value);
        }
        return $this->db->get($table, $limit);
    }
    public function getData($table = 'sample', $whereParams = [], $limit = null, $whereSigns = [], $order = ['ID' => 'desc'])
    {
        foreach ($whereParams as $key => $value) {
            if (empty($whereSigns[$key])) {
                $whereSigns[$key] = '=';
            }
            $this->db->where($key, $value, $whereSigns[$key]);
        }
        foreach ($order as $key => $value) {
            $this->db->orderBy($key, $value);
        }
        return $this->db->get($table, $limit);
    }
    public function getDataOrWhere($table = 'sample', $whereParams = [], $limit = null, $whereSigns = [], $order = ['ID' => 'desc'])
    {
        foreach ($whereParams as $key => $value) {
            if (empty($whereSigns[$key])) {
                $whereSigns[$key] = '=';
            }
            $this->db->orWhere($key, $value, $whereSigns[$key]);
        }
        foreach ($order as $key => $value) {
            $this->db->orderBy($key, $value);
        }
        return $this->db->get($table, $limit);
    }
    public function getOneData($table = 'sample', $whereParams = [], $whereSigns = [], $order = ['ID' => 'desc'])
    {

        foreach ($whereParams as $key => $value) {
            if (empty($whereSigns[$key])) {
                $whereSigns[$key] = '=';
            }
            $this->db->where($key, $value, $whereSigns[$key]);
        }
        foreach ($order as $key => $value) {
            $this->db->orderBy($key, $value);
        }
        return $this->db->getOne($table);
    }

    public function addData($table = 'sample', $data = [])
    {
        return $this->db->insert($table, $data);
    }

    public function updateData($table = 'sample', $data = [], $whereParams = [], $whereSigns = [])
    {
        foreach ($whereParams as $key => $value) {
            if (empty($whereSigns[$key])) {
                $whereSigns[$key] = '=';
            }
            $this->db->where($key, $value, $whereSigns[$key]);
        }
        return $this->db->update($table, $data);
    }

    public function deleteData($table = 'sample', $whereParams = [])
    {
        foreach ($whereParams as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->delete($table);
    }

    public function rawQuery($query = '')
    {
        return $this->db->rawQuery($query);
    }
}
