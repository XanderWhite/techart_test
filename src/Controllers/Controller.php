<?php

namespace App\Controllers;

use App\View;

abstract class Controller
{
	public $view;

	protected function __construct()
	{
		$this->view = new View();
	}

	abstract function index();
}
