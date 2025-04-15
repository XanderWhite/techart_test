<?php

class NotFoundController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->generate('notFoundPage.php');
	}

	public function show($id)
	{
		$this->index();
	}
}
