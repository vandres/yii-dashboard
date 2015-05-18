<?php
/**
 * @var $this SiteController
 * @var $gadgets array
 */
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<?php $this->widget('GadgetWidget', array('gadgets' => $gadgets, 'position' => 1)); ?>
		</div>
		<div class="col-xs-12 col-sm-6">
			<?php $this->widget('GadgetWidget', array('gadgets' => $gadgets, 'position' => 2)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<?php $this->widget('GadgetWidget', array('gadgets' => $gadgets, 'position' => 3)); ?>
		</div>
		<div class="col-xs-12 col-sm-8">
			<?php $this->widget('GadgetWidget', array('gadgets' => $gadgets, 'position' => 4)); ?>
		</div>
	</div>
</div>
