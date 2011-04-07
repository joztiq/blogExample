<div class="post">
	<h1><?php echo $post->title?></h1>
	<span class="postTime"><?php echo $post->createdDate?></span><span class="author"><?php echo $post->author?></span>
	<p><?php echo $post->text?></p>
</div>
<?php 
foreach($post->comments as $postComment)
{
	$this->renderElement('post/_comment.php' , array('postComment' => $postComment));	
}
?>
<div class="post comment">
	<?php if(count($comment->getErrors()) > 0):?>
		<div class="error">
			<ul>
				<?php foreach($comment->getErrors() as $error):?>
					<li><?php echo $error?></li>
				<?php endforeach;?>
			</ul>
		</div>
	<?php endif;?>
	<?php $comment->drawForm();?>
</div>


