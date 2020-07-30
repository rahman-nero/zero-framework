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
		// $result = $product->delete('`id`', [1,2,3, 'asdasd']);
		dd($result);
	}
}

