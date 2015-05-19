<?php

class GadgetModel extends CModel
{
	public $title;
	public $description;
	public $html;
	public $css;
	public $js;
	public $priority;
	public $position;
	public $interval;

	/**
	 * Returns the list of attribute names of the model.
	 * @return array list of attribute names.
	 */
	public function attributeNames()
	{
		return array(
			'title',
			'description',
			'html',
			'css',
			'js',
			'priority',
			'position',
			'interval',
		);
	}

	public function rules() {
		return array(
			array('title, description, html, css, js, priority, position, interval', 'safe')
		);
	}
}
