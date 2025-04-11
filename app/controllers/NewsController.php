<?php
require_once __DIR__ . '/../models/News.php';

class NewsController extends Controller
{

	public function __construct() {
		parent::__construct();

		$this->model = new News;
	}

	function index()
	{
		$data = $this->model->getAll();
		$this->view->generate('mainPage.php',$data);
	}

	function show($id){

	}
}