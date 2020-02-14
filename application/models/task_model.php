<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public static $table = "task";

    public function get($where = []) {
        $query = $this->db->get_where(self::$table, $where);
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function getAll($where = [], $limit = false, $rights = "") {
        $query = $this->db->select("task.*,department.name as department,user.username as username")
                ->from(self::$table . " task")
                ->join("users user", "user.id = task.affected_user", "left")
                ->join("departments department", "department.id = task.affected_department", "left");

        if (!empty($where))
            $this->db->where($where);
        if ($limit != false)
            $this->db->limit($limit);

        $this->db->group_by('id');
        $this->db->order_by('vbs_task.id', 'desc');

//        _px($query);

        $query = $this->db->get(self::$table);

//        echo $this->db->last_query();die;

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function create($data) {

//        echo 'come';die;
//        echo '<pre>';
//        print_r($data);die;
        $this->db->trans_begin();
        $this->db->insert(self::$table, $data);
        $insert_id = $this->db->insert_id();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $insert_id;
        }
    }

    public function update($data, $id) {
        if ($this->db->update(self::$table, $data, ['id' => $id]))
            return true;
        else
            return false;
    }

    public function delete($id) {
        return $this->db->delete(self::$table, ['id' => $id]);
    }

    public static function validate() {
        $reqInputs = [
            'date' => 'date',
            'date_hour' => 'date_hour',
            'date_minute' => 'date_minute',
            'status' => 'status',
            'added_by_firstname' => 'added_by_firstname',
            'added_by_lastname' => 'added_by_lastname',
            'affected_department' => 'affected_department',
            'affected_user' => 'affected_user',
            'priority' => 'priority',
            'date2' => 'date2',
            'date2_hour' => 'date2_hour',
            'date2_minute' => 'date2_minute',
            'files' => 'files',
            'note' => 'note',
//            'note2' => 'note2'
        ];

        $error = [];

        foreach ($reqInputs as $key => $input) {
            $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
            if ($key == 'files') {
                $check = (!isset($_FILES['files']) || count($_FILES['files']) === 0);
            }
            if ($check) {
                $error[] = "Merci de compléter toutes les cases correctement.";
            }
            if ($key == "email" AND ! filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                $error[] = "S'il vous plaît entrer un email valide.";
            }
            if ($key == "tel" AND ! preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])) {
                $error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
            }
        }

        return $error;
    }

}
