<?php
class sitemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
    
    
	
	///one condition single table
    function getlist($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }	
    
    function getlistStatut($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
     function getlistCivilite($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
      function getlistMarque($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
     function getlistModele($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
     function getlistAge($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    function getlistSerie($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    function getlistBoite($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    function getlistCarburant($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    function getlistCourroie($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    function getlistCouleur($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
        function getlistNature($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    function getlistType($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
     
       function getlistcarsadded($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
     
     
       function getlistcars_assurance($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    
       function getlistcars_controle($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
    
    
       function getlistcars_entretiens($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
     
     
       function getlistcars_reparations($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
     
     
     
       function getlistcars_sinistres($table, $item, $where1=null, $order = null, $limit=null,$offset=null)
   
    {

            $this->db->order_by($order);
            $this->db->select($item);
            $this->db->from($table);
            $this->db->where($where1);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
		
    }
       
   function getfirstrow($table, $item, $where1=null, $order = null)
    {
		
		$this->db->order_by($order);
		$this->db->select($item);
		$this->db->from($table);
		$this->db->where($where1);
		$this->db->limit(1, 0);
		$query = $this->db->get();
		return $query->first_row('array');	
		
    }	
    
    
    
   function getlistrelational($table1, $table2, $item, $where1=null, $whererelation,  $order = null, $limit=null,$offset=null)
    {
         $this->db->select($item)
        ->from($table1)
        ->join($table2, $whererelation, 'left')
        ->order_by($order)
		->limit($limit, $offset);

        $query = $this->db->get();

        return $query->result_array();
		
    }	
	
	function stafflist(){
		
		$this->db->select('users.*,departments.departments_name')
        ->from('users')
        ->join('departments', 'departments.id = users.department', 'left')
        ->order_by('users.id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
		
	}
	
	
	function getEmailTemplate()
	{
            if(!empty($this->input->get('email_name')))
            {
                    $query = $this->db->where('email_name',$this->input->get('email_name'));
            }
            $query = $this->db->get('email_template');
            return $query->result();
	}
	
        
	function getEmailTemplateCall()
	{
            if(!empty($this->input->get('statut')))
            {
                    $query = $this->db->where('statut',$this->input->get('statut'));
            }
            $query = $this->db->get('email_template_call');
            return $query->result();
	}
	
        
        
	
	function getAgencys()
	{
		if(!empty($this->input->get('search')))
		{
			$query = $this->db->like('agency_name',$this->input->get('search'));
		}
		$query = $this->db->get('agency');
        return $query->result();
	}
	
	function getprivacy_policy()
	{
		
		$query = $this->db->where('id',1);
		$query = $this->db->get('privacy_policy');
        return $query->row();
	}
	
	function getlegal()
	{
		$query = $this->db->where('id',1);
		$query = $this->db->get('legal');
        return $query->row();
	}
	
	function get_cars()
	{
		if(!empty($this->input->get('search')))
		{
			$query = $this->db->like('name',$this->input->get('search'));
		}
		$query = $this->db->get('cars');
        return $query->result();
	}
	
	
	
	
function insert($table, $data=null)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}


function ticketlist(){
		
		$this->db->select('ticket.*,users.real_name,users.department,users.email,users.telephone,users.first_name, users.last_name,users.civility,departments.departments_name')
        ->from('ticket')
        ->join('users', 'users.id = ticket.user_id', 'left')
	->join('departments', 'ticket.departments_id = departments.id', 'left')
        ->order_by('users.id', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
		
	}
	
	
		
	
	///direct query
	function query($query)
    {
     	 
		 return   $this->db->query($query)->result_array();
          		
    }
	
    function multidelete($query)
        {
	        $this->db->query($query);
        }
		
	
	
		///row count
	function rowcount($table)
    {
  		
     $this->db->from($table);
     $query = $this->db->get();
     return $query->num_rows();

    }



	function CommonInsert($table,$array)
	{
		$this->db->insert($table,$array);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	function getUsers()
	{
		$query = $this->db->select('users.*,support_department.department as department_name');
		$query = $this->db->from('users');
		$query = $this->db->join('support_department','support_department.id = users.department','left');
		$query = $this->db->get();
		return 	$query->result();
	}
	

	function getAccountingProduit()
	{
		$this->db->select('account_produit.*,account_statut.statut,account_periode.periode,account_modereglement.modereglement,servicecategory.category_name');
		$this->db->from('account_produit');
		$this->db->join('account_statut','account_statut.id = account_produit.status_id','left');
		$this->db->join('account_periode','account_periode.id = account_produit.periode_id','left');
		$this->db->join('account_modereglement','account_modereglement.id = account_produit.mode_reglement_id','left');
		
		$this->db->join('servicecategory','servicecategory.id = account_produit.categorie_de_dervice','left');
		
		$this->db->where('account_produit.is_deleted','0');
		if(!empty($this->input->get('from_period')))
		{
			$this->db->where('DATE_FORMAT(account_produit.created_date,"%Y-%m-%d") >=', date('Y-m-d',strtotime($this->input->get('from_period'))));
		}
		if(!empty($this->input->get('to_period')))
		{
			$this->db->where('DATE_FORMAT(account_produit.created_date,"%Y-%m-%d") <=', date('Y-m-d',strtotime($this->input->get('to_period'))));
		}
		$query = $this->db->get();
		return $query->result();
	}

	function getProduitAccountSignle($insert_id)
	{
		$this->db->select('account_produit.*,account_statut.statut,account_periode.periode,account_modereglement.modereglement,servicecategory.category_name');
		$this->db->from('account_produit');
		$this->db->join('account_statut','account_statut.id = account_produit.status_id','left');
		$this->db->join('servicecategory','servicecategory.id = account_produit.categorie_de_dervice','left');
		$this->db->join('account_periode','account_periode.id = account_produit.periode_id','left');
		$this->db->join('account_modereglement','account_modereglement.id = account_produit.mode_reglement_id','left');
		$this->db->where('account_produit.id',$insert_id);
		$query = $this->db->get();
		return $query->row();
	}
	function getJob()
	{
		$this->db->select('job_workingplace.workingplace,job_typeofcontract.typeofcontract,job_statut.statut,job_requiredexperiance.requiredexperiance,job.*,job_hourspermonth.hourspermonth,job_job.job,other.job as otherjob,job_jobcategory.jobcategory,job_natureofcontract.natureofcontract');
		$this->db->from('job');
		$this->db->join('job_hourspermonth','job_hourspermonth.id = job.hourspermonth_id','left');
		$this->db->join('job_job','job_job.id = job.job_id','left');
		$this->db->join('job_job as other','other.id = job.another_job_id','left');
		$this->db->join('job_jobcategory','job_jobcategory.id = job.jobcategory_id','left');
		$this->db->join('job_natureofcontract','job_natureofcontract.id = job.natureofcontract_id','left');
		$this->db->join('job_requiredexperiance','job_requiredexperiance.id = job.requiredexperiance_id','left');
		$this->db->join('job_statut','job_statut.id = job.status_id','left');
		$this->db->join('job_typeofcontract','job_typeofcontract.id = job.typeofcontract_id','left');
		$this->db->join('job_workingplace','job_workingplace.id = job.workingplace_id','left');
		if(!empty($this->input->post('Workplace')))
		{
	$this->db->where('job.workingplace_id', $this->input->post('Workplace'));
		}
		if(!empty($this->input->post('category')))
		{
	$this->db->where('job.jobcategory_id', $this->input->post('category'));
		}
		if(!empty($this->input->post('typeofcontract')))
		{
	$this->db->where('job.typeofcontract_id', $this->input->post('typeofcontract'));
		}
		if(!empty($this->input->post('experience')))
		{
	$this->db->where('job.requiredexperiance_id', $this->input->post('experience'));
	}
		if(!empty($this->input->post('Function')))
		{
			$this->db->where('job.job_id', $this->input->post('Function'));
		}
		if(!empty($this->input->post('natureofcontract')))
		{
			$this->db->where('job.natureofcontract_id', $this->input->post('natureofcontract'));
		}
		if(!empty($this->input->post('hourspermonth')))
		{
			$this->db->where('job.hourspermonth_id', $this->input->post('hourspermonth'));
		}
		if(!empty($this->input->post('from_period')))
		{
			$this->db->where('DATE_FORMAT(job.created_date,"%Y-%m-%d") >=', date('Y-m-d',strtotime($this->input->get('from_period'))));
		}
		if(!empty($this->input->post('to_period')))
		{
			$this->db->where('DATE_FORMAT(job.created_date,"%Y-%m-%d") <=', date('Y-m-d',strtotime($this->input->get('to_period'))));
		}
		if(!empty($this->input->post('searchword')))
		{
			$this->db->like('job.job_title', $this->input->get('searchword'));
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_alls_category()
	{
	    	$this->db->select('*');
	       $this->db->from('job_jobcategory');
	    	$query = $this->db->get();
		return $query->result();
	}
	function getJob_fornt($id=0)
	{
		$this->db->select('job_workingplace.workingplace,job_typeofcontract.typeofcontract,job_statut.statut,job_requiredexperiance.requiredexperiance,job.*,job_hourspermonth.hourspermonth,job_job.job,other.job as otherjob,job_jobcategory.jobcategory,job_natureofcontract.natureofcontract');
		$this->db->from('job');
		$this->db->join('job_hourspermonth','job_hourspermonth.id = job.hourspermonth_id','left');
		$this->db->join('job_job','job_job.id = job.job_id','left');
		$this->db->join('job_job as other','other.id = job.another_job_id','left');
		$this->db->join('job_jobcategory','job_jobcategory.id = job.jobcategory_id','left');
		$this->db->join('job_natureofcontract','job_natureofcontract.id = job.natureofcontract_id','left');
		$this->db->join('job_requiredexperiance','job_requiredexperiance.id = job.requiredexperiance_id','left');
		$this->db->join('job_statut','job_statut.id = job.status_id','left');
		$this->db->join('job_typeofcontract','job_typeofcontract.id = job.typeofcontract_id','left');
		$this->db->join('job_workingplace','job_workingplace.id = job.workingplace_id','left');
		$this->db->where('job.status_id', 1);
		if(!empty($this->input->post('Workplace')))
		{
	$this->db->where('job.workingplace_id', $this->input->post('Workplace'));
		}
		if($id)
		{
	$this->db->where('job.jobcategory_id', $id);
		}
		if(!empty($this->input->post('category')))
		{
	$this->db->where('job.jobcategory_id', $this->input->post('category'));
		}
		if(!empty($this->input->post('typeofcontract')))
		{
	$this->db->where('job.typeofcontract_id', $this->input->post('typeofcontract'));
		}
		if(!empty($this->input->post('experience')))
		{
	$this->db->where('job.requiredexperiance_id', $this->input->post('experience'));
	}
		if(!empty($this->input->post('Function')))
		{
			$this->db->where('job.job_id', $this->input->post('Function'));
		}
		if(!empty($this->input->post('natureofcontract')))
		{
			$this->db->where('job.natureofcontract_id', $this->input->post('natureofcontract'));
		}
		if(!empty($this->input->post('hourspermonth')))
		{
			$this->db->where('job.hourspermonth_id', $this->input->post('hourspermonth'));
		}
		//echo $this->input->post('typeofcontract');
	//	die();
		$query = $this->db->get();
		return $query->result();
	}
		
	public function job_detail($id){
        $this->db->select('job_workingplace.workingplace,job_typeofcontract.typeofcontract,job_statut.statut,job_requiredexperiance.requiredexperiance,job.*,job_hourspermonth.hourspermonth,job_job.job,other.job as otherjob,job_jobcategory.jobcategory,job_natureofcontract.natureofcontract');
		$this->db->from('job');
		$this->db->join('job_hourspermonth','job_hourspermonth.id = job.hourspermonth_id','left');
		$this->db->join('job_job','job_job.id = job.job_id','left');
		$this->db->join('job_job as other','other.id = job.another_job_id','left');
		$this->db->join('job_jobcategory','job_jobcategory.id = job.jobcategory_id','left');
		$this->db->join('job_natureofcontract','job_natureofcontract.id = job.natureofcontract_id','left');
		$this->db->join('job_requiredexperiance','job_requiredexperiance.id = job.requiredexperiance_id','left');
		$this->db->join('job_statut','job_statut.id = job.status_id','left');
		$this->db->join('job_typeofcontract','job_typeofcontract.id = job.typeofcontract_id','left');
		$this->db->join('job_workingplace','job_workingplace.id = job.workingplace_id','left');
			$this->db->where('job.status_id', 1);
        $this->db->where('job.id',$id);
    
      return $this->db->get();
    }
	function requireddiploma_id($requireddiploma_id)
	{
		$query = $this->db->where('id',$requireddiploma_id);
		$query = $this->db->get('job_requireddiploma')->row();
		return $query;
	}	
	
	function requireddocument_id($id)
	{
		$query = $this->db->where('id',$id);
		$query = $this->db->get('job_requireddocument')->row();
		return $query;
	}	
	
	
	function getServiceCategory()
	{
		$this->db->select('servicecategory.*,servicecategory_statut.statut,servicecategory_tvapercent.tvapercent,servicecategory_pricecalculmethode.pricecalculmethode,servicecategory_bookingform.bookingform');
		$this->db->from('servicecategory');
		$this->db->join('servicecategory_statut','servicecategory_statut.id = servicecategory.statut_id','left');
		$this->db->join('servicecategory_tvapercent','servicecategory_tvapercent.id = servicecategory.tvapercent_id','left');
		$this->db->join('servicecategory_bookingform','servicecategory_bookingform.id = servicecategory.bookingform_id','left');
		$this->db->join('servicecategory_pricecalculmethode','servicecategory_pricecalculmethode.id = servicecategory.pricecalculmethode_id','left');
		if(!empty($this->input->get('from_period')))
		{
			$this->db->where('DATE_FORMAT(servicecategory.created_date,"%Y-%m-%d") >=', date('Y-m-d',strtotime($this->input->get('from_period'))));
		}
		if(!empty($this->input->get('to_period')))
		{
			$this->db->where('DATE_FORMAT(servicecategory.created_date,"%Y-%m-%d") <=', date('Y-m-d',strtotime($this->input->get('to_period'))));
		}
		if(!empty($this->input->get('searchword')))
		{
			$this->db->like('category_name', $this->input->get('searchword'));
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	
    
    	function update($table, $where=null, $data=null)
           {
		$this->db->update($table, $data, $where);
		return TRUE;
           }	
    
    	function delete($table, $where)
	   {
		$this->db->where($where);
		 
		$this->db->delete($table);
		if ($this->db->affected_rows() > 0) {
			 
			return TRUE;
		}
		return FALSE;
	   }
	   
	   
	   
	    function getPosts($limit = NULL)
			{
				return $this->db->get('posts', $limit);
			}

        function task_detail($id)
			{
				 $this->db->select('jari_task.task_id as task_id, jari_task_milestone.milestone_title as milestone_title, jari_user.full_name as full_name, jari_task.status as status, jari_task.wireframe as wireframe, jari_task.description as description')
				->from('jari_task')
				->join('jari_task_milestone', 'jari_task_milestone.milestone_id=jari_task.milestone_id', 'left')
				->join('jari_user', 'jari_user.id=jari_task.member_id', 'left')
                ->where("jari_task.task_id=$id");
	             $query = $this->db->get();
				return $query->first_row('array');
			}
			
		function comments_list($id) 
			{
				 $this->db->select('jari_comments.comments as comments, jari_comments.screenshot as screenshot, jari_comments.entry_date as entry_date, jari_user.full_name as full_name')
				->from('jari_comments')
				->join('jari_user', 'jari_comments.user_id=jari_user.id', 'left')
                ->where("jari_comments.task_id=$id");
	             $query = $this->db->get();
				return $query->result_array();
			}	
	
	    function loghour_list($id)
			{
				 $this->db->select('jari_loghour.loghour_id as loghour_id,jari_loghour.hour as hour, jari_loghour.jobdate as jobdate, jari_user.full_name as full_name')
				->from('jari_loghour')
				->join('jari_user', 'jari_loghour.employee_id=jari_user.id', 'left')
                ->where("jari_loghour.task_id=$id");
	             $query = $this->db->get();
				return $query->result_array();
			}
			
			
			function getConfigAccounting($table)
			{
				$query = $this->db->get($table);
				return $query->result();
			}
	
			function getConfig($table)
			{
				$query = $this->db->get($table);
				return $query->result();
			}
                        
                        
        function  get_call_center()
        {
            $this->db->select('*');
            $this->db->from('call_center');
            if(!empty($this->input->get('from_period')))
            {
                $this->db->where('DATE_FORMAT(created_date,"%Y-%m-%d") >=', date('Y-m-d',strtotime($this->input->get('from_period'))));
            }
            if(!empty($this->input->get('to_period')))
            {
                $this->db->where('DATE_FORMAT(created_date,"%Y-%m-%d") <=', date('Y-m-d',strtotime($this->input->get('to_period'))));
            }
                
            $query = $this->db->get();
            return $query->result();
            
        }
	
}
?>
