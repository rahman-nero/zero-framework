<?php 

namespace App\controllers;

/**
 * 
 */
class MainController extends AppController
{
	public function indexAction()
	{
		$main = 'Hello world';
		$this->vars(compact('main'));
	}
}

