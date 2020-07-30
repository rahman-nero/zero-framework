<?php 

namespace App\controllers;
use App\models\Main;

/**
 * 
 */
class MainController extends AppController
{
	public function indexAction()
	{
		$product = new Main();
		$result = $product->findOne('`id` = 2');
		dd($result);
	}
}

