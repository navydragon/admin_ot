<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Главная" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_blank",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
	"dashboard" => array(
		"title" => "Главная",
		"url" => "dashboard.php",
		"icon" => "fa-home"
	),
	"tnd" => array (
		"title" => "ТНД",
		"icon" => "fa-pencil-square-o",
		"sub" => array(
			"general" => array(
				'title' => 'Отчеты',
				'icon' => 'fa-folder-open',
				'sub' => array(
					'users' => array(
						'title' => 'Пользователи',
						'url' => "reports/users.php"
					),
					'jobs' => array(
						'title' => 'Должности',
						'url' => 'reports/jobs.php'
					),
					'filials' => array(
						'title' => 'Полигоны',
						'url' => "reports/filials.php"
					),
					'directions' => array(
						'title' => 'Филиалы',
						'url' => 'reports/directions.php'
					)
				)
			),
			"carousel" => array(
				"title" => "Carousel",
				"url" => 'ajax/smartui-carousel.php'
			),
			'smartform' => array(
				'title' => 'Smart Form',
				'url' => 'ajax/smartui-form.php'
			)
		)
	)
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>