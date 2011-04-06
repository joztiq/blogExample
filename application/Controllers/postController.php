<?php
/**
 * This controller will handle crud operations for posts
 * @package blogExample
 * @subpackage controllers
 * @author Daniel Maison
 * 
 *
 */
class postController extends blog_pageController
{
	public $layout = 'default';
	
	/*
	 * This action will handle creation of new posts
	 */
	public function createAction()
	{
		$post = new postModel();
		//Check if the form is posted
		if(isset($_POST['postForm']))
		{
			//Assign values from the form to the model
			$post->assign($_POST['postForm']);
			//Validate values
			if($post->validate())
			{
				//Add time stamp
				$post->createdDate = date("Y-m-d H:i:s");
				//Save the post
				if($post->save())
				{
					//Redirect the browser to the "home page"
					$this->redirect('/home/index');
				}else{
					$post->setError('Ops...Unable to save to database');
				}

			}
		}
		$this->setViewVar('model', $post);
		$this->render();
	}
	
	public function deleteAction()
	{
		//Make sure its from our ajax
		if(isset($_POST['ajax']) && isset($_POST['id']))
		{
			//cast int to int to sanitize it
			$id = (int)$_POST['id'];
			$model = new postModel($id);
			$model->delete();
		}
	}
	
	public function commentsAction()
	{
		//cast int to int to sanitize it
		$postid = (int)$this->params['id'];
		//Create the models
		$post = new postModel($postid);
		$comment = new commentModel();
		//If a comment was posted, validate it and save the comment
		if(isset($_POST['commentForm']))
		{
			$comment->assign($_POST['commentForm']);
			//Set the id of the post the comment was for
			$comment->postid = $postid;
			if($comment->validate())
			{
				$comment->save();
			}
		}
		//Pass vars to view and render the view
		$this->setViewVar('post', $post);
		$this->setViewVar('comment', $comment);
		$this->render();
	}
	
}