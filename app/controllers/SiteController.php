<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$gadgetFactory = new GadgetFactory();

		$this->render('index', array(
			'gadgets' => $gadgetFactory->discoverAll(),
		));
	}

	public function actionAjax($url)
	{
		$content = file_get_contents(rawurldecode($url));

		$dom = new DOMDocument;
		$mock = new DOMDocument;
		$dom->loadHTML($content);
		$body = $dom->getElementsByTagName('body')->item(0);
		foreach ($body->childNodes as $child){
			$mock->appendChild($mock->importNode($child, true));
		}
		echo $mock->saveHTML();
	}
}
