<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Model extends CI_Model  

{

		

	function __construct()

	{

		parent::__construct();

	}

	

	function create_thumbnail($sourceimage,$newpath, $width, $height)

	{

		$this->load->library('image_lib');

		$this->image_lib->clear();

		

		$config['image_library'] = 'gd2';

		$config['source_image'] = $sourceimage;

		$config['create_thumb'] = TRUE;

		$config['new_image'] = $newpath;

		$config['dynamic_output'] = FALSE;

		$config['maintain_ratio'] = TRUE;

		$config['width'] = $width;

		$config['height'] = $height;

	    $config['thumb_marker'] = '';

		

		$this->image_lib->initialize($config); 

		return $this->image_lib->resize();

	}

	function fetch_records_from_query( $query = '' , $offset = '', $perpage = '' )	{		$rs = $this->db->query($query);		$this->numrows = $rs->num_rows();		if($offset != '' && $perpage != '')		$this->db->limit($perpage,$offset);		return $rs->result();	}

	function validate_upload_image($fieldmessage,$fieldname,$filepath,$thumbnailpath='',$width='',$height='')

	{

		$config['upload_path'] = $filepath;

		$config['allowed_types'] = 'gif|jpeg|jpg|png';

		//$config['max_size']	= '500';

		//$config['max_width']  = '1024';

		//$config['max_height']  = '768';

		$config['remove_spaces'] = TRUE;

		$config['overwrite'] = FALSE;

		//print_r($config);

		//die();

		$this->load->library('upload', $config);



		if(!$this->upload->do_upload($fieldname))

		{

			$this->form_validation->set_message($fieldmessage,$this->upload->display_errors());

			return $this->upload->display_errors();

			//return FALSE;

		}

		else

		{

			$filedata = $this->upload->data();

			

			//$this->session->set_userdata('uploadedphotoname',$filedata['file_name']);

			$this->uploadedimagename = $filedata['file_name'];

			if(!empty($thumbnailpath))

			{

				 $this->create_thumbnail($filedata['full_path'],$thumbnailpath,$width,$height);

			}

			return TRUE;

		}

	}

	

	//General database operations

	function run_query( $query )

	{

              

		return($this->db->query( $query )->result());  

	}

	

	function getMaxId($TableName,$ColName)

	{

		$query = $this->db->query("select max(".$ColName.") as Id from ".$this->db->dbprefix($TableName))->result();

		return $query[0]->Id;

		

	}

	

	function insert_operation( $inputdata, $table, $email = '' )

	{

		//echo $this->db->dbprefix($table);

		if($this->db->insert($this->db->dbprefix($table),$inputdata))

		return 1;

		else 

		return 0;

	}

	

	function insert_operation_id( $inputdata, $table, $email = '' )

	{

		$result  = $this->db->insert($this->db->dbprefix($table),$inputdata);

		return $this->db->insert_id();

	}

	

	

	function update_operation( $inputdata, $table, $where )

	{
		

		$result  = $this->db->update($this->db->dbprefix($table),$inputdata, $where);
		/*echo "<pre>"; 
		echo $table;
		print_r($where); die();*/

		//echo $this->db->last_query();

		return $result;

	}

	

	function insert_or_update($inputdata,$table,$where='',$id='')

	{

		

	}

	

	function fetch_records_from( $table, $condition = '',$select = '*', $order_by = '',$order_type='asc',$limit='' )
	{		$this->db->select($select, FALSE);
		$this->db->from( $this->db->dbprefix( $table ) );
		if( !empty( $condition ) )			$this->db->where( $condition );
		
		if( !empty( $order_by ) )			
		$this->db->order_by( $order_by,$order_type );				
		
		if(!empty( $limit) )			
		$this->db->limit( $limit );

		$result = $this->db->get();

		return $result->result();

	}

	

	function fetch_single_column_value($table, $column, $where)
	{

		$this->db->select($column,FALSE);

		$this->db->from( $this->db->dbprefix( $table ) );

		

		if( !empty( $where ) )

			$this->db->where( $where );

		$result_rs = $this->db->get();

		$result = $result_rs->result();

		if( count( $result ) > 0 )

			$ret = $result[0]->$column;

		else

			$ret = '-';

		return $ret;

	}

	

	function fetch_business_info( $condition = '', $andcondition = '', $featurecondition = '', $offset = '', $perpage = '' )

	{

		$this->db->start_cache();

		$this->db->select("*",FALSE);



		$this->db->from( 'gps_business'  );

		



		if( !empty( $condition ) )

		$this->db->where( $condition );

		if( !empty( $andcondition ) )

		$this->db->where( $andcondition, 'date(now())',FALSE );

		if( !empty( $featurecondition ) )

		$this->db->where( $featurecondition );

		$this->db->stop_cache();



		$this->numrows = $this->db->count_all_results();



		//$this->db->limit($perpage,$offset);

		$result = $this->db->get();

		$this->db->flush_cache();

		//echo $this->db->last_query(); die();

		return $result->result();

		

	}

	

	function changestatus( $table, $inputdata, $where  )

	{

		$result = $this->db->update($this->db->dbprefix($table),$inputdata, $where);

		return $result;

	}

	

	function delete_record($table, $where)

	{	

		$result = $this->db->delete( $table, $where );

		return $result;

	}

	

	function getAreas($TableName='',$Val='',$Name='')

	{

		return($this->db->query("Select ".$Val.",".$Name." from ".$TableName."")->result());

	}

	function get_areasinfo($areaid)

	{

	$q = $this->db->query("SELECT a.*,sub.* FROM veggies_main_areas a,veggies_sub_areas sub WHERE sub.main_area_id = a.main_area_id and a.main_area_id='".$areaid."'")->result();

	return $q;

	}

	

	

	function get_tasks()

	{

		$query	=	$this->db->get('gps_tasks' );

		return $query->result_array();

	}

	function check_duplicate($table_name,$cond,$cond_val)
	{
		$col_name='*';
		$this->db->where(array($cond=>$cond_val));
		$this->db->from($this->db->dbprefix($table_name));
		$query = $this->db->get();
		$rows = $query->num_rows();
		if( $rows > 0 ) {
			return TRUE;			
		} else {
			return FALSE;
		}		
	}

	public function get_details($table)

	{

		$query	=	$this->db->get($table);

		return $query->result_array();

	}

	

	//fetching details from table name with one condition

	function fetch_vechile_details($table,$mrno)

	{

		$q = $this->db->query('select * from '.$table.' where vechicle_id='.$mrno)->result();

		return $q;

	}

	function fetch_vehicles( $condition = '', $andcondition = '', $featurecondition = '', $offset = '', $perpage = '' )

	{

		$this->db->start_cache();

		$this->db->select("*",FALSE);



		$this->db->from( 'cd_vehicle_details'  );

		



		if( !empty( $condition ) )

		$this->db->where( $condition );

		if( !empty( $andcondition ) )

		$this->db->where( $andcondition, 'date(now())',FALSE );

		if( !empty( $featurecondition ) )

		$this->db->where( $featurecondition );

		$this->db->stop_cache();



		$this->numrows = $this->db->count_all_results();



		//$this->db->limit($perpage,$offset);

		$result = $this->db->get();

		$this->db->flush_cache();

		//echo $this->db->last_query(); die();

		return $result->result();

		

	}

	function fetch_vehicle_types($condition = '', $andcondition = '', $featurecondition = '', $offset = '', $perpage = '')

	{

		$this->db->start_cache();

		$this->db->select("*",FALSE);



		$this->db->from( 'cd_vehicle_types'  );

		



		if( !empty( $condition ) )

		$this->db->where( $condition );

		if( !empty( $andcondition ) )

		$this->db->where( $andcondition, 'date(now())',FALSE );

		if( !empty( $featurecondition ) )

		$this->db->where( $featurecondition );

		$this->db->stop_cache();



		$this->numrows = $this->db->count_all_results();



		//$this->db->limit($perpage,$offset);

		$result = $this->db->get();

		$this->db->flush_cache();

		//echo $this->db->last_query(); die();

		return $result->result();

	}

	function get_duplicate_vehicle_type($table,$where)

	{

		$exist=$this->db->get_where($this->db->dbprefix($table),array('vehicle_type_name'=>$where))->result();

		if(count($exist)>0)

		return 1;

		else

		return 0;

		

	}

	function fetch_general_settings()

	{

		return $this->db->get('cd_general_settings')->result();

	}
	function get_stock()
	{
		$output = array(
            "aData" => array()
        );
		
		$q=$this->db->query("SELECT reference_no,pickup_point,drop_point,booking_date,pickup_date,pickup_time,way_type,total_cost,payment_type,user_name,user_phone,user_email from cd_booking_details");
					        
    $output["aData"] = $q->result();
    return $output;
	}

	function get_carname($id)
	{
	$query = $this->db->query("select * from cd_vehicle_details where vehicle_id=".$id)->result();
		return $query[0]->vehicle_name;
	
	}
	
	function get_last_record($table)
	{
		$query = $this->db->query("select * from ".$table." order by id desc limit 1")->result();
		return $query[0];
	}

	function get_replies($id, $type)
	{
		$query = $this->db->query("select rr.*, ra.attachments from vbs_request_replies rr left outer join vbs_request_attachments ra on rr.id = ra.request_reply_id where rr.request_id = ".$id." and rr.type = ".$type." ")->result();
		return $query;
	}
	
	
	//////////Adiyya////////////////
	
	function fetch_records_from_new( $table, $condition = '',$select = '*', $order_by = '', $like = '', $offset = '', $perpage = '' )
	{
		$this->db->start_cache();
		$this->db->select($select, FALSE);
		$this->db->from( $this->db->dbprefix( $table ) );
		if( !empty( $condition ) )
		$this->db->where( $condition );
		if( !empty( $like ) )
		$this->db->like( $like );
		//$this->db->where( array( 'is_deleted' => 'no' ) );
		if( !empty( $order_by ) )
		$this->db->order_by( $order_by );
		$this->db->stop_cache();
    
    $this->numrows = $this->db->count_all_results();
      
      if( $perpage != '' )
        $this->db->limit($perpage, $offset);
      $result = $this->db->get();
    $this->db->flush_cache();
		return $result->result();
	}
	function SaveForm($table,$form_data)
	{
		$this->db->insert($table, $form_data);
		
		
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	/****** GET SUM OF COLUMNS ******/
	function getSumOfColumns($column_name,$table_name)
	{
	
		$this->db->select_sum($column_name);
		$result_rs = $this->db->get($this->db->dbprefix( $table_name ));

		$result = $result_rs->row();

		return $result->$column_name;
	
	}
	
	function get($table,$where)
	{

		$result=$this->db->get_where($this->db->dbprefix($table),$where)->result();

		if(count($result)>0)

		return $result;

		else

		return false;
	}


	
	/* function changestatus( $table, $inputdata, $where  )
	{
		$result = $this->db->update($this->db->dbprefix($table),$inputdata, $where);
		return $result;
	}
	
	function delete_record($table, $where)
	{	
		$result = $this->db->delete( $table, $where );
		return $result;
	} */

	// chat messages code

	function run_query2( $query )

	{

              

		return($this->db->query( $query )->row_array());  

	}

	function run_query3($query)
	{
		return($this->db->query( $query )->result());
	}

	// end

}

?>