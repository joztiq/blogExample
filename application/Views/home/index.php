<?php $this->renderElement('home/_top.php' , array());?>
<div id="load"><img src="<?php echo $this->rootPath;?>/public/images/loading.gif"/> Loading...</div>
<?php foreach($posts as $model)
{
	$this->renderElement('home/_post.php' , array('model' => $model));
}