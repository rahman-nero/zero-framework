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
		$main = 'Hello world';
		$a = new Main();
		$s = $a->findAll();
		dd($s);
		$this->vars(compact('main'));
	}
}

