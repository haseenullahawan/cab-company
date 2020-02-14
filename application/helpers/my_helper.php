<?php
function get_jobs_category($id)
    {
        $CI =& get_instance();
        $CI->load->model('sitemodel');
        $getJob_fornt = $CI->sitemodel->getJob_fornt($id);
        return $getJob_fornt;
    }
?>