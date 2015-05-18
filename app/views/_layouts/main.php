<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>

	<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->getBaseUrl() . '/assets/css/bootstrap.min.css'); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery.ui'); ?>
	<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->getBaseUrl() . '/assets/js/bootstrap.min.js', CClientScript::POS_END); ?>

</head>
<body>

<?php echo $content?>

</body>
</html>
