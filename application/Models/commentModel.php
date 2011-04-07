<?php
/**
* Class representing a comment. This class is related to the post class using the "relations" array.
* @package blogExample
* @subpackage models
* @author Daniel Maison
*
*/
class commentModel extends joz_activeRecordModel implements joz_Ivalidation
{
	public $primaryKey = 'id';
	public $tableName = 'comments';
	
	public function getRules()
	{
		return array
		(
			new joz_validationRule('author', joz_validationRule::VALIDATE_REQUIRED, 'Your name please. Fill out the author field!'),
			new joz_validationRule('text', joz_validationRule::VALIDATE_REQUIRED, 'Whats your comment? Write something!'),
			new joz_validationRule('author', joz_validationRule::VALIDATE_MAX_LENGTH, "Sorry, you'll have to shorten your name to 20 chars" , 20),
			new joz_validationRule('text', joz_validationRule::VALIDATE_MAX_LENGTH, 'Woow! That was a might long post. Please limit it to 1024 chars' , 1024),
		);
	}
	
	public $labels = array
	(
		'author' => "Your name",
		'text'	=> "The comment",
	);
	
	/*
	* Markup for relations. You might want to add '@property' tags in the class phpDoc.
	*/
	protected $relations = array(
					'post' => array
								(
								'class' => 'postModel',
								'key' => 'postid',
								'type' => self::BELONGS_TO
								),
							);
	
	
	public $id;
	public $author;
	public $text;
	public $timestamp;
	public $postid;
	
}