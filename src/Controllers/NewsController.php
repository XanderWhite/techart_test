<?php

namespace App\Controllers;

use App\Models\News;
use App\Services\Pagination;
use App\Core\Route;

class NewsController extends Controller
{
	public $model;

	public function __construct()
	{
		parent::__construct();

		$this->model = new News();
	}

	function index($page = 1)
	{
		$limit = 4;
		$offset = ($page - 1) * $limit;
		$news = $this->model->getNews($limit, $offset);

		$this->show404IfEmpty($news);

		$totalNews = $this->model->getTotalNews();
		$totalPages = ceil($totalNews / $limit);
		$lastNews = $this->model->getLast();
		$pagination = new Pagination($page, $totalPages);
		$this->view->generate('mainPage.php', ['news' => $news, 'lastNews' => $lastNews ?? null, 'pagination' => $pagination]);
	}

	function show($id)
	{
		$news = $this->model->getNewsById($id);
		$this->show404IfEmpty($news);
		$this->view->generate('detailPage.php', ['news' => $news]);
	}

	function show404IfEmpty($news)
	{
		if (empty($news)) {
			Route::load404();
			return;
		}
	}
}
