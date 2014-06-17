
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="js/highcharts/highcharts.js" type="text/javascript"></script>
<script src="js/highcharts/highcharts-3d.js" type="text/javascript"></script>
<script src="js/highcharts/exporting.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>
<div style="text-align:center;">
	<?php foreach($arr_rank as $key => $value){ ?>
		<?php echo $value['alias'] ?>	
		<?php echo $value['total'] ?>
		<?php echo $key != count($arr_rank)-1 ? '>' : ''; ?>	
	<?php } ?>
</div>
	

