<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - PopUp';
$this->breadcrumbs = array(
	'PopUp',
);
?>
<h1>PopUp Demo</h1>

<?php $this->widget('ext.widgets.PopupWidget', ['id' => $id]); ?>

<hr>
<div class="content">
	<h1>Modal Animations</h1>
	<div class="buttons">
		<div id="five" class="button">Run</div>
	</div>
</div>




<?php
Yii::app()->clientScript->registerScript(
	'modal-run',
	<<<JAVASCRIPT
	$('#five').click(function() {
		if(!($('#modal-container').length)) return false;
		$('#modal-container').removeAttr('class').addClass('five');
		$('body').addClass('modal-active');
	})
	$('#close-modal').click(function() {
		$('#modal-container').addClass('out');
		$('body').removeClass('modal-active');
	});
JAVASCRIPT,
	CClientScript::POS_END
);
?>