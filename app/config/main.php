<?php

return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Dashboard',
	'language' => 'de',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components' => array(
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
		'gadget' => array(
			'class' => 'Gadget',
			'gadgets' => array(
				array(
					'class' => 'HTMLGadget',
					'url' => 'http://dashboard.va/test.php',
					'interval' => 60,
					'position' => 1,
				),
				array(
					'class' => 'HTMLGadget',
					'url' => 'http://dashboard.va/test2.php',
					'interval' => 30,
					'position' => 2,
				),
				array(
					'class' => 'HTMLGadget',
					'url' => 'http://dashboard.va/clock.php',
					'interval' => 1,
					'position' => 3,
				),
			),
		),
	),

	'params' => array(
		'infoEmail' => 'info@dachcom.ch',
	),
);
