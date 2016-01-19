<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
include("inc/header.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
	<!--<span id="logo"></span>-->

	<div id="logo-group">
		<span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="SmartAdmin"> </span>

		<!-- END AJAX-DROPDOWN -->
	</div>

	
</header>

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
				<h1 class="txt-color-red login-header-big">Аналитическая подсистема</h1>
				<div class="hero">

					<div class="pull-left login-desc-box-l">
						<h4 class="paragraph-header">Войдите, используя Ваш логин и пароль</h4>
						
					</div>
					
					

				</div>

				

			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<div class="well no-padding">
					<form action="checklogin.php" id="login-form" method="POST" class="smart-form client-form">
						<header>
							Вход
						</header>

						<fieldset>
							
							<section>
								<label class="label">Логин</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="email" name="email">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Введите Ваш логин</b></label>
							</section>

							<section>
								<label class="label">Пароль</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Введите Ваш пароль</b> </label>
								<div class="note">
									<a href="<?php echo APP_URL; ?>/forgotpassword.php">Забыли пароль?</a>
								</div>
							</section>

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" checked="">
									<i></i>Запомнить</label>
							</section>
							<section id='wrong'>
							sss
							</section>
						</fieldset>
						<footer>
							<button type="submit" class="btn btn-primary">
								Войти
							</button>
						</footer>
					</form>

				</div>
				
			
			</div>
		</div>
	</div>

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					email : false
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				email : {
					required : 'Пожалуйста, введите Ваш логин',
					
				},
				password : {
					required : 'Пожалуйста, введите Ваш пароль'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
		$('#login-form').submit(function(e){
			//отменяем стандартное действие при отправке формы
			e.preventDefault();
			//берем из формы метод передачи данных
			var m_method=$(this).attr('method');
			//получаем адрес скрипта на сервере, куда нужно отправить форму
			var m_action=$(this).attr('action');
			//получаем данные, введенные пользователем в формате input1=value1&input2=value2...,
			//то есть в стандартном формате передачи данных формы
			var m_data=$(this).serialize();
			$.ajax({
			type: m_method,
			url: m_action,
			data: m_data,
			success: function(result){
			$('#wrong').html(result);
			}
			});
			});
	});
</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>