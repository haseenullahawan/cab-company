<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Filemanagement_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public static $table = "filemanagement";

    public function get($where = []) {
        $query = $this->db->get_where(self::$table, $where);
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function getAll($where = [], $limit = false) {
        if (!empty($where))
            $this->db->where($where);
        if ($limit != false)
            $this->db->limit($limit);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::$table);
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function create($data) {
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
            'status' => 'status',
            'type' => 'type',
            'date' => 'date',
            'name' => 'name',
            'nature' => 'nature',
            'priority' => 'priority',
            'alert' => 'alert',
            'delay_date' => 'delay_date',
            'destination' => 'destination',
//            'note' => 'note',
            'send_date' => 'send_date',
            'send_date_hour' => 'send_date_hour',
            'added_by_firstname' => 'added_by_firstname',
            'added_by_lastname' => 'added_by_lastname',
            'description' => 'description',
//            'selection' => 'selection',
            'name_selection' => 'name_selection',
            'files' => 'file'
        ];

        $error = [];

        foreach ($reqInputs as $key => $input) {
            $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
            if ($key == 'files') {
                $check = (!isset($_FILES['files']) || empty($_FILES['files']['name']));
            }
            if ($check) {
                echo $key;
                die();
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

    function run_query($query) {
        return($this->db->query($query)->result());
    }

}
