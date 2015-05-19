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

	<?php foreach ($gadget->css as $css):?>
		<?php $cssContent = Yii::app()->less->compile('.gadget'.$this->position.' {'.file_get_contents($css). '}');?>
		<?php Yii::app()->getClientScript()->registerCss(microtime(), $cssContent); ?>
	<?php endforeach;?>

	<?php foreach ($gadget->js as $js):?>
		<?php Yii::app()->getClientScript()->registerScriptFile($js, CClientScript::POS_END); ?>
	<?php endforeach;?>

	<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->getBaseUrl() . '/assets/js/jquery.gadget.js', CClientScript::POS_END); ?>
	<?php Yii::app()->getClientScript()->registerScript(microtime(), "
		$(function(){
			$('.gadget" . $this->position . "').gadget({
				url: '" . Yii::app()->createUrl('site/ajax', array('url' => rawurlencode($gadget->html))) . "',
				interval: '" .$gadget->interval . "'
			});
		});
	", CClientScript::POS_END);?>
<?php endif; ?>
