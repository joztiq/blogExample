<?php
/**
* Class representing a comment. This class is related to the post class using the "relations" array.
* @package blogExample
* @subpackage models
* @author Daniel Maison
*
*/
class commentModel extends joz_activeRecordModel
{
	public $primaryKey = 'id';
	public $tableName = 'comments';
	
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