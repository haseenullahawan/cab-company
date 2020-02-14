<link href="<?= base_url(); ?>assets/css/easy-weather.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url(); ?>assets/js/easy-weather-keys.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/easy-weather.js"></script>
<div class="ew" style="margin-top:0px;"></div>
	  		<script>

	  		        $('.ew').EasyWeather({ forecasts: true, orientation: 'horizontal',width: '300px', height: '42px', nbForecastDays: 6 });
	  		</script>