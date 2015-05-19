<?php

class GadgetFactory
{
	public function discoverAll()
	{
		$gadgets = array();
		$urls = Yii::app()->gadget->gadgets;
		foreach ($urls as $url) {
			$url = $this->prepareUrl($url);
			$data = $this->getRemoteData($url);

			$gadget = new GadgetModel();
			$gadget->attributes = (array)$data;
			$gadgets[] = $gadget;
		}

		return $gadgets;
	}

	private function prepareUrl($url)
	{
		$url = str_replace('gadget.json', '', $url);
		$url = rtrim($url, '/');
		return $url . '/gadget.json';
	}

	private function getRemoteData($url)
	{
		if (false === ($data = @file_get_contents($url))) {
			throw new Exception('No gadget.json found at ' . $url);
		}

		return json_decode($data);
	}
}
