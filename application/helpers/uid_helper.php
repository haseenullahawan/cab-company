<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('create_uid'))
{
    function create_uid($start = "", $id = 0, $length = 5)
    {
        return $start . str_pad($id, $length, '0', STR_PAD_LEFT);
    }
}
if ( ! function_exists('create_timestamp_uid'))
{
    function create_timestamp_uid($timestamp = "", $id = 0, $length = 5)
    {
        return create_uid(date("dmY",strtotime($timestamp)),$id,$length);
    }
}

if ( ! function_exists('create_request_reply_uid'))
{
    function create_request_reply_uid($id, $addedBy, $type)
    {
        $CI = &get_instance();
        $CI->load->model('request_model');
        $result = $CI->request_model->getRequestReplyUser($id, $addedBy);
        if($type == 1){
            return isset($result[0]->username) ? $result[0]->username : "";
        }else{
            return isset($result[0]->department) ? $result[0]->department : "";
        }
    }
}
if ( ! function_exists('create_support_reply_uid'))
{
    function create_support_reply_uid($id, $addedBy, $type)
    {
        $CI = &get_instance();
        $CI->load->model('support_model');
        $result = $CI->support_model->getSupportReplyUser($id, $addedBy);
        if($type == 1){
            return isset($result[0]->username) ? $result[0]->username : "";
        }else{
            return isset($result[0]->department) ? $result[0]->department : "";
        }
    }
}