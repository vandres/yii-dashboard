<?php
Yii::import('zii.widgets.CPortlet');

class GadgetWidget extends CPortlet
{
	public $gadgets = array();
	public $position = 0;

	protected function renderContent()
	{
		$currentGadget = null;
		foreach ($this->gadgets as $gadget) {
			if ($this->position !== $gadget->position) {
				continue;
			}

			$currentGadget = $gadget;
		}

		$this->render('gadget', array('gadget' => $currentGadget, 'position' => $this->position));
	}
}
