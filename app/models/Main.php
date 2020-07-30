<?php 
namespace App\models;
use Zero\base\Model;

/**
 * 
 */
class Main extends Model
{
	protected $table = 'product';
	protected $routes = [
		'id',
		'title'
	];	
}

