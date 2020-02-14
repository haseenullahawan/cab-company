<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['configuration'] = get_configuration();
    }

    /*public function view($page) {

        if (!file_exists(APPPATH . '/views/services/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('site/common/header');
        $this->load->view('site/common/navigation');
        $this->load->view('services/' . $page, $data);
        $this->load->view('site/common/footer', $data);
    }*/

    private function addMetaData($param = 3, $data = [])
    {
        $data['meta_keywords'] = "tpmr;transport pmr;pmr transport;transport handicapé;transport handicapés;handicapé transport;transport handicape;transport handicap;transport mobilité réduite;transport adapté;transports handicapés;transport des handicapés;transport enfant handicapé;transports handicapés;transport personne agée;taxi handicapé;handicapé taxi;taxi pmr;taxi avec rampe;transport handicapes;transport de personnes handicapées;transport de personne handicapé;transport personnes âgées;transport personnes handicapées;transport de personnes à mobilité réduite;transport personne mobilité réduite;transport de personnes agées;transport personnes agée;transport personnes handicapées;transport personne handicapée;transport personne agée​";
        $data['meta_description'] = "HANDI EXPRESS Le spécialiste du transport de personnes à mobilité réduite,Transport de personnes handicapées et Transport de personne âgées.Tout Trajet - Toute Distance 24h/24 - 7j/7.";
        switch ($param) {
            case 3:
                $data['title'] = 'HANDI PRO - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 4:
                $data['title'] = 'HANDI PRIVE - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 5:
                $data['title'] = 'HANDI SHUTTLE - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 6:
                $data['title'] = 'HANDI SCOLAIRE - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 7:
                $data['title'] = 'HANDI MEDICAL - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 8:
                $data['title'] = 'HANDI BUSINESS - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 9:
                $data['title'] = 'HANDI SENIOR - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 10:
                $data['title'] = 'HANDI EVENT - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
            case 11:
                $data['title'] = 'HANDI VOYAGE - HANDI EXPRESS Transport de personnes à mobilité réduite';
                break;
        }
        return $data;
    }



    public function index($param = '') {
        //$records = $this->base_model->run_query("SELECT p.*,v.image,v.name as vehicle_name,v.model FROM " . $this->db->dbprefix('package_settings') . " p, " . $this->db->dbprefix('vehicle') . " v WHERE v.id=p.vehicle_id AND p.status='Active'");
//        if ($param1 == '' || !is_numeric($param1)) redirect('packages');
//        $recs = $this->db->get_where($this->db->dbprefix('package_settings') , array(
//                'status' => 'Active',
//                'id' => $param1
//        ))->result();
//        if (count($recs) <= 0) redirect('packages');
//        $this->data['package_details'] = $recs[0];
//        $vehicleid = $recs[0]->vehicle_id;
//        unset($recs);
//        $recs = $this->db->get_where($this->db->dbprefix('vehicle') , array(
//                'id' => $vehicleid
//        ))->result();
        //$this->data['cabs'] 				= $recs;
        //$this->db->select('*');
        //$rec = $this->db->get_where($this->db->dbprefix('services'),array('id' => $param))->result()[0];
        if ($this->lang->lang() == 'en') {
            $query = "SELECT    s.id as id, s.package_id as package_id, name_en as name
                                , description_en as description, meta_tag_en as meta_tag
                                , meta_description_en as meta_description, seo_keywords_en as seo_keywords
                                , s.image as image, s.order_no as order_no, s.status as status, p.min_cost as min_cost
                        FROM " . $this->db->dbprefix('services') . " s
                            INNER JOIN " . $this->db->dbprefix('package_settings') . " p ON p.id = s.package_id
                        WHERE s.id = " . $param;
        }
        else if ($this->lang->lang() == 'fr') {
            $query = "SELECT s.id as id, s.package_id as package_id, name_fr as name
                                , description_fr as description, meta_tag_fr as meta_tag
                                , meta_description_fr as meta_description, seo_keywords_fr as seo_keywords
                                , s.image as image, s.order_no as order_no, s.status as status, p.min_cost as min_cost
                        FROM " . $this->db->dbprefix('services') . " s
                            INNER JOIN " . $this->db->dbprefix('package_settings') . " p ON p.id = s.package_id
                        WHERE s.id = " . $param;
        }

        $rec = $this->base_model->run_query($query)[0];

        $this->data['service_info'] = $rec;
        $this->data['heading'] 				= $this->lang->line('services');
        $this->data['active_class'] 		= "services";
        $this->data['sub_heading'] 			= $rec->name;
        $this->data['bread_crumb'] 			= true;
        $this->data['title'] 				= $rec->name;

        $this->data 					    = $this->addMetaData($param, $this->data);
        $this->data['content'] 				= 'site/services';
        $this->_render_page('templates/site_template', $this->data);
    }

    function _remap($method,$args) {

        if (method_exists($this, $method)) {
            $this->$method($args);
        } else {

             $this->index($method,$args);
        }
    }
}
