<!DOCTYPE html>
<html lang="en">
<head>
<title>Ooops....</title>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

html, body{

	background: url(<?php echo base_url(); ?>assets/system_design/images/login-bg.jpg);

	background-size:cover;

	width: 100%;

	height: 100%; background-repeat:no-repeat; background-attachment:local; margin:0; padding:0;

}




a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}
h3 {
  color: #ffda31 !important;
    font-family: open sans;
    font-size: 35px;
    margin: -107px 0 0;
    padding: 55px 0;
}
h1 {
    color: #ffda31 !important;
    font-family: open sans;
    font-size: 120px;
    font-weight: bold;
    margin:0px;
    padding: 14px 15px 10px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
 
	 
 
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
       background: none repeat scroll 0 0 #121e31;
    border: 1px solid #d0d0d0;
    color: #ffda31 !important;
    float: left;
    margin-left: 403px;
    margin-top: 130px;
    text-align: center;
    width: 35%;
}

p {
	margin: 12px 15px 12px 15px;
} 
button {
   background: none repeat scroll 0 0 #121e31;
    border: 1px solid #ccc;
    color: #fff;
    margin: 10px -4px;
    padding: 4px;
}
.home {
    margin: 0 auto;
    width: 40%;
}
</style>
</head>
<body>
<div class="home"> <button type="button" onclick="window.location.href='<?php echo site_url(); ?>/auth/index/home'"> Home </button> </div>
	<div id="container">
	 
		<h1>Ooops....</h1>
		<h3>DB Error</h3>
        <?php 
         $ci =& get_instance();
                     echo $sql = $ci->db->last_query();

	?>	 
	</div>
</body>
</html>