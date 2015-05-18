<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	/**
	 * @param string     $id     id of this controller
	 * @param CWebModule $module the module that this controller belongs to.
	 */
	public function __construct($id, $module = null) {
		parent::__construct($id, $module);
		Yii::app()->setLayoutPath(Yii::app()->getViewPath() . DIRECTORY_SEPARATOR . '_layouts');
	}
}
