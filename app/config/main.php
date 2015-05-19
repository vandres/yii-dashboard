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
		'less'=>array(
			'class'=>'LessCompiler',
			'compiledPath'=>'application.assets.css', // path to store compiled css files
			'formatter'=>'lessjs', // - lessjs / compressed / classic , see http://leafo.net/lessphp/docs/#output_formatting for details
			'forceCompile'=>false, // passing in true will cause the input to always be recompiled
			'disabled'=>true, // if set to true .less files will not compile if .css file found
		),
		'gadget' => array(
			'class' => 'Gadget',
			'gadgets' => array(
				'http://dashboard.va/test',
				'http://dashboard.va/test2/',
				'http://dashboard.va/clock/gadget.json',
				'http://dashboard.va/marquee/gadget.json',
			),
		),
	),

	'params' => array(
		'infoEmail' => 'info@dachcom.ch',
	),
);
