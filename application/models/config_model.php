<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Config_Model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	public static $table = "configurations";

	public static $subjects = [
		'Demande de Rappel Handi-Express.fr',
		'Demande de Devis Handi-Express.fr',
		'Candidature Chauffeur Handi-Express.fr',
	];

	public static $civility = [
		'Mr', 'Mme', 'Mlle'
	];
	public static $module = [
		'Qoute Request', 'Job Application', 'Files', 'Calls', 'Posts', 'Support', 'Tasks'
	];

	public static $status = [
		"New","Replied","Pending","Closed"
	];
public static $status_booking = [
		"Pending","Cancelled","Approved","Confirm"
	];
	public static $job_status = [
		"New","Pending","Meeting","Accepted","Denied"
	];

	public static $job_offers = [
		"Conducteur en periode scolaire",
		//"Chauffeur accompagnateur VTC",
	];

	public static $call_subjects = [
		'Reservation','Offre Commercial','Partenariat','Candidature','Autre'
	];

	public static $call_days = [
		'Tous les jours','Lundi','Mardi','Mercredi','Jeudi','Vendredi'
	];
        
	public static $newsletter_status = [
		'Enabled','Disabled'
	];
	public static $file_types = [
		'Invoice'
	];
	public static $selection_types = [
		'1','2'
	];
	public static $name_selection_types = [
		'1','2'
	];
	public static $file_status = [
		'New','Pending','Rejected','Aprooved'
	];
        
        public static $task_status = [
		'Pending','Udapted','Done'
	];
	public static $nature_types = [
		'Letter','Licence'
	];
	public static $priority_types = [
		'High','Medium','Low'
	];
	public static $alert_types = [
		'On','Off'
	];
	public static $destination_types = [
		'Department','Driver','Client','Affiliate','Job seeker'
	];
        
	public static $user_types = [
            ['id'=>1,'label'=>'Clients'],
            ['id'=>2,'label'=>'Drivers'],
            ['id'=>3,'label'=>'Jobseekers'],
            ['id'=>4,'label'=>'Callers']
	];
        
	public static $categories = [
		'Reccurent'
	];
        
        public static $user_status = [
		'Active','Inactive'
	];
        
        public static $languages = [
            ['code'=>'en','label'=>'English'],
            ['code'=>'fr','label'=>'France'],
	];

	public function get($key){
		$query = $this->db->get_where(self::$table, ['key' => $key]);
		return $query->num_rows() > 0 ? $query->row() : false;
	}

	public function getAll($where = []){
		if(!empty($where)) $this->db->where($where);
		$query = $this->db->get(self::$table);
		return $query->num_rows() > 0 ? $query->result() : false;
	}

	public function update($key, $value){
		if($this->db->update(self::$table, ['value' => $value], ['key' => $key]))
			return true;
		else
			return false;
	}

}