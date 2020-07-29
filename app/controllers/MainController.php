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
		$result = $product->findAll();

		$insert = $product->insert(['category_id' => 1]);
		// dd($result);
	}
}

