<?php
require_once __DIR__ . '/../models/News.php';

class NewsController extends Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->model = new News;
	}

	function index()
	{
		$news = $this->model->getAll();
		$lastNews = $this->model->getLast();
		$this->view->generate('mainPage.php', ['news' => $news, 'lastNews' => $lastNews[0] ?? null]);
	}

	function show($id) {}
}
