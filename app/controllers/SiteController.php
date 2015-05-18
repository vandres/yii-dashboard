<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$this->render('index', array(
			'gadgets' => Yii::app()->gadget->gadgets
		));
	}
	public function actionAjax($url)
	{
		echo file_get_contents(rawurldecode($url));
	}
}
