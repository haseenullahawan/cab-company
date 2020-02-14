<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookingForm extends MY_Controller {
    	function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');

		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('language');
	}

	function index() {}
        
        function getForm() {
            $form_name = $this->input->post('page');
            if ($form_name == 'login') {
                $htmlForm = '<div class="row" id="loginDiv" style="display: block;">
                                <div class="col-md-6 login-page-divider"><!--col-md-offset-3-->
                                    <div id="total-login">
                                        <form action="http://navetteo.fr/fr/auth/login" method="post" accept-charset="utf-8" name="login_form" id="login_form" novalidate="novalidate">
                                            <div style="display:none">
                                                <input type="hidden" name="csrf_test_name" value="722bb822f76eb8ecd48dff44dcb66393">
                                            </div>                                
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty">
                                                                                            <input type="text" name="identity" value="" id="identity" class="user-name" placeholder="Email">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty">  
                                                    <input type="password" name="password" value="" class="password" placeholder="Mot de passe" id="password">                                                                                <input type="hidden" name="remember" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4" style="padding:10px 0px 0px 10px;">
                                                <input type="submit" class="button green_button" value="S\'identifier">  
                                            </div>
                                            <div class="col-md-8 col-xs-8" style="float:left;top:28px;">
                                                <a href="http://navetteo.fr/fr/auth/forgot_password"> Mot de passe oublié?</a> 
                                            </div>    
                                        </form>                            
                                    </div>
                                    <div class="shadow"></div>
                                    <div class="col-md-10">
                                        <div id="fp"> 
                                            <input type="text" class="forget" placeholder="Forgot Password"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 benefits">
                                    <div class="titleBox">
                                        <h4>Avantages</h4>
                                        <h6>Pourquoi choisir NAVETTEO Pour vos transferts?</h6>
                                    </div>
                                    <div class="infoBox">
                                        <div class="col-md-2 wallet"><i class="fa fa-money"></i></div>
                                        <div class="col-md-10">
                                            <div class="wallet">
                                                <h5>Le rapport qualité prix</h5>
                                                <h6>Un Transfert de qualité à des prix abordables</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infoBox">
                                        <div class="col-md-2 customer-service"><i class="fa fa-headphones"></i></div>
                                        <div class="col-md-10">
                                            <div class="wallet">
                                                <h5>Service Clients</h5>
                                                <h6>Un service client de qualité, pour vous assister par téléphone, par email, ou par chat en ligne.</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infoBox">
                                        <div class="col-md-2 easy-use"><i class="fa fa-leaf"></i></div>
                                        <div class="col-md-10">
                                            <div class="wallet">
                                                <h5>Facilité d\'utilisation</h5>
                                                <h6>Une Réservation facile en 4 étapes seulement, et un espace client pour suivre vos réservations en ligne.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
            else if ($form_name == 'register') {
                $htmlForm = '<div class="row" id="registerDiv" style="display: block;">
                                <div class="col-md-6 register-page-divider">
                                    <div id="total-login">
                                        <form action="http://navetteo.fr/fr/auth/create_user" method="post" accept-charset="utf-8" name="register_form" id="register_form" novalidate="novalidate">
                                            <div style="display:none">
                                                <input type="hidden" name="csrf_test_name" value="722bb822f76eb8ecd48dff44dcb66393">
                                            </div>                                
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty"> 
                                                    <input type="text" name="first_name" value="" class="user" placeholder="Prénom" id="first_name">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty"> 
                                                    <input type="text" name="last_name" value="" class="user" placeholder="Nom De Famille" id="last_name">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty"> 
                                                    <input type="text" name="phone" value="" class="phone1" placeholder="Téléphone" id="phone" maxlength="11">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty">  
                                                    <input type="text" name="email" value="" class="user-name" placeholder="E-mail" id="email">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty"> 
                                                    <input type="text" name="address1" value="" class="user" placeholder="Adresse" id="address1">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty"> 
                                                    <input type="text" name="address2" value="" class="location" placeholder="Adresse de Facturation" id="address2" autocomplete="off">                                                                            </div>
                                            </div>

                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty">  
                                                    <input type="password" name="password" value="" class="password" placeholder="Mot de passe" id="password">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group input-group-lg in-ty">  
                                                    <input type="password" name="password_confirm" value="" class="password" placeholder="Confirmez Le Mot De Passe" id="password_confirm">                                                                            </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12" style="padding:10px 0px 0px 10px;">
                                                <input type="submit" class="button green_button" value="Se enregistrer">
                                            </div>
                                        </form>                            
                                    </div>
                                </div>
                                <div class="col-md-6 benefits">
                                    <div class="titleBox">
                                        <h4>Avantages</h4>
                                        <h6>Pourquoi choisir NAVETTEO Pour vos transferts?</h6>
                                    </div>
                                    <div class="infoBox">
                                        <div class="col-md-2 wallet"><i class="fa fa-money"></i></div>
                                        <div class="col-md-10">
                                            <div class="wallet">
                                                <h5>Le rapport qualité prix</h5>
                                                <h6>Un Transfert de qualité à des prix abordables</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infoBox">
                                        <div class="col-md-2 customer-service"><i class="fa fa-headphones"></i></div>
                                        <div class="col-md-10">
                                            <div class="wallet">
                                                <h5>Service Clients</h5>
                                                <h6>Un service client de qualité, pour vous assister par téléphone, par email, ou par chat en ligne.</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="infoBox">
                                        <div class="col-md-2 easy-use"><i class="fa fa-leaf"></i></div>
                                        <div class="col-md-10">
                                            <div class="wallet">
                                                <h5>Facilité d\'utilisation</h5>
                                                <h6>Une Réservation facile en 4 étapes seulement, et un espace client pour suivre vos réservations en ligne.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
            
            echo $htmlForm;
        }
}
