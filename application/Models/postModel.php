<?php
/**
 * This is a model representing a blog post.
 * This model extends the joz_activeRecordModel which provides easy database access through a active record like aproach.
 * Models should by convention end with 'Model' with a capital M.
 * @package blogExample
 * @subpackage models
 * @author Daniel Maison
 *
 */
class postModel extends joz_activeRecordModel implements joz_Ivalidation
{
	/**
	 * This property sets the database table name and is required for classes extending joz_activeRecordModel
	 * @var string
	 */
	public $tableName = 'posts';
	
	protected $labels = array(
						'text' => 'text',
						'author'=> 'author',
						);

	public function getRules()
	{
		return array
		(
			new joz_validationRule('text', joz_validationRule::VALIDATE_REQUIRED, 'You must write a text for your post...'),
			new joz_validationRule('author', joz_validationRule::VALIDATE_REQUIRED, 'Who wrote this post? type your name!'),
		);
	}
	
	/*
	 * Set the table columns as public keys and joz_activeRecordModel will populate them for you.
	 * 
	CREATE TABLE `posts` (
 	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`text` varchar(1024) DEFAULT NULL,
  	`author` varchar(45) DEFAULT NULL,
  	PRIMARY KEY (`id`)
	)
	 */
	public $id;
	public $text;
	public $author;
	public $createdDate;
	
}