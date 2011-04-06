<?php
class errorController extends blog_pageController
{
	public $layout = 'default';
	
	public function error404Action()
	{
		echo "error 404";
	}
}