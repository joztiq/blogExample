<?php
/**
 * This is your default controller, where users will land when first entering the blog.
 * Your default controller can be set in the main config.
 * Controllers have 'actions' for each page. The contrllers role is to process data from the model and pass it to the view.
 * For mor information read an article on MVC :)
 * 
 * @package blogExample
 * @subpackage controllers
 * @author Daniel Maison
 *
 */
class homeController extends blog_pageController
{
	public $layout = 'default';
	
	
	/**
	 * This is your default action, where users will land when first entering the blog.
	 * The default action can be set in the main config.
	 * Actions must by convention be named in all lower case and ended with 'Action' with a capital A.
	 */
	public function indexAction()
	{
		//Get the five latest posts
		$posts = postModel::find('1 order by id desc limit 5');
		//Give the posts to the view
		$this->setViewVar('posts' , $posts);
		//render the view, if no view is set joztiq will look in application/views/<controller>/<action>.php
		$this->render();
	}
	
}