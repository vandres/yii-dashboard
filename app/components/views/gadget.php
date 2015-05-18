<?php
/**
 * @var $this GadgetWidget
 * @var $gadget HTMLGadget
 * @var $position int
 */
?>
<?php if ($gadget !== null): ?>
	<div class="gadget gadget<?php echo $this->position ?>">

	</div>

	<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->getBaseUrl() . '/assets/js/jquery.gadget.js', CClientScript::POS_END); ?>
	<?php Yii::app()->getClientScript()->registerScript(microtime(), "
		$(function(){
			$('.gadget" . $this->position . "').gadget({
				url: '" . Yii::app()->createUrl('site/ajax', array('url' => rawurlencode($gadget['url']))) . "',
				interval: '" .$gadget['interval'] . "'
			});
		});
	", CClientScript::POS_END);?>
<?php endif; ?>
