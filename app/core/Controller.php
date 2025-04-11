<?php

abstract class Controller {

	public $model;
	public $view;

	protected function __construct()
	{
		$this->view = new View();
	}

	abstract function index();
	abstract function show($id);
}
