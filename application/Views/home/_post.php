<div class="post">
	<strong><?php echo $model->title;?></strong>
	<span class="postTime"><?php echo $model->createdDate;?>
		<span id="<?php echo $model->id;?>"class="ss_sprite ss_delete deletePost"></span>
	</span>
	<span class="author"><?php echo $model->author;?></span>
	<br/>
	<p><?php echo $model->text;?></p>
	<div class="post">
		<a class="commentLink" href="<?php echo Joztiq::app()->config->rootPath;?>post/comments/<?php echo $model->id?>">Comments(<?php echo count($model->comments)?>)</a>
	</div>
</div>