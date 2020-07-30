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
		dd($product);
		$this->setMeta('asdasd', 'asdasdad', 'asdasdasd');
	}
}

