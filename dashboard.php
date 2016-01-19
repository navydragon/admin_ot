<?php require_once("inc/init.php"); ?>

<?
$d = getdate();


$total_users = mysql_num_rows(mysql_query("select * from users   WHERE `users`.`category` <> 0 AND `users`.`rights` = 0 "));
$passed_users = mysql_num_rows(mysql_query("select * from users where YEAR(`users`.assign)>0 AND `users`.`category` <> 0 AND `users`.`rights` = 0 "));
$passed_percent = round($passed_users/$total_users,2)*100;

$l_12_u = last_12_users ();
$a_12_r = avg_12_results ();

$avg_ball = mysql_fetch_array(mysql_query("SELECT avg(`stat_tests`.`result`) AS `res` FROM `users` INNER JOIN `stat_tests` ON (`users`.`userid` = `stat_tests`.`userid`) WHERE `users`.`category` <> 0 AND `users`.`rights` = 0"));
?>
<div class="row">
	
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> Всего пользователей <span class="txt-color-blue"><?=$total_users;?></span></h5>
			</li>
			<li class="sparks-info">
				<h5> Закончили тестирование <span class="txt-color-purple"></i>&nbsp;<?=$passed_users;?>&nbsp;(<?=$passed_percent;?>%)</span></h5>
				
			</li>
			<li class="sparks-info">
				<h5> Средний балл <span class="txt-color-greenDark"></i><?=$avg_ball['res'];?> %</span></h5>
				
			</li>
		</ul>
	</div>
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-0"  data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<h2>Пользователи за последние 12 месяцев </h2>				
				</header>
				<!-- widget div-->
				<div>	
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						<input class="form-control" type="text">	
					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">	
						<!-- this is what the user will see -->
						<canvas id="barChart" height="120"></canvas>
					</div>
					<!-- end widget content -->	
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
		<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		s
		</article>
	</div>

<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-0"  data-widget-editbutton="false" data-widget-deletebutton="false">
				<header>
					<h2>Средние результаты за последние 12 месяцев </h2>				
				</header>
				<!-- widget div-->
				<div>	
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						<input class="form-control" type="text">	
					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body">	
						<!-- this is what the user will see -->
						<canvas id="linechart" height="120"></canvas>
					</div>
					<!-- end widget content -->	
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
		<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		s
		</article>
	</div>

	
</section>
<canvas id="canvas" height="260" width="600"></canvas>

	<canvas id="canvas2" height="260" width="600"></canvas>

<script type="text/javascript">
	
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR you can load chain scripts by doing
	 * 
	 * loadScript(".../plugin.js", function(){
	 * 	 loadScript("../plugin.js", function(){
	 * 	   ...
	 *   })
	 * });
	 */
	
	 var  myNewChart_1, myNewChart_2, myNewChart_3, myNewChart_4, myNewChart_5, myNewChart_6;

	// pagefunction

	var pagefunction = function() {
		// clears the variable if left blank
		    // BAR CHAR
Chart.defaults.global.responsive = true;

		   result = <?=$l_12_u;?>;  var _labels = [],_data=[];
           for(var i=0;i<result.length;i++)
         		{ _labels.push(result[i].date); _data.push(result[i].kol);}

		    var dt={"labels":_labels,"datasets":[{"data":_data,"strokeColor":"rgba(151,187,205,1)","fillColor":"rgba(151,187,205,0.5)"}]};
		    var options={showLabelsOnBars:true,  responsive: true,barLabelFontColor:"black"}

	
	var ctx = document.getElementById("barChart").getContext("2d");
	var myLine = new Chart(ctx).Bar(dt,options);  


	};
	
	loadScript("js/plugin/chartjs/chart.min.js", pagefunction); 

	// end pagefunction

	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){
		
		//destroy all charts
    	myNewChart_1.destroy();
		myNewChart_1=null;

    	myNewChart_2.destroy();
    	myNewChart_2=null;

    	myNewChart_3.destroy();
    	myNewChart_3=null;

    	myNewChart_4.destroy();
    	myNewChart_4=null;

    	myNewChart_5.destroy();
    	myNewChart_5=null;

    	myNewChart_6.destroy();
    	myNewChart_6=null;

    	if (debugState){
			root.console.log("✔ Chart.js charts destroyed");
		} 
	}

	// end destroy
	
</script>


	<script>
   
	</script>