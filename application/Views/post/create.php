<h2>Create new post</h2>
<?php if(count($model->getErrors()) > 0 ):?>
	<div class="error">
		<ul>
		<?php foreach($model->getErrors() as $error):?>
			<li><?php echo $error;?></li>
		<?php endforeach;?>
		</ul>
	</div>
<?php endif;?>
<?php
echo $model->drawForm();