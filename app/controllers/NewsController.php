<?php
require_once __DIR__ . '/../models/News.php';
require_once __DIR__ . '/../core/Pagination.php';

class NewsController extends Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->model = new News;
	}

	function index($page = 1)
	{
		$limit = 4;
		$offset = ($page - 1) * $limit;
		$news = $this->model->getNews($limit, $offset);

		$this->redirectIfEmpty($news);

		$totalNews = $this->model->getTotalNews();
		$totalPages = ceil($totalNews / $limit);
		$lastNews = $this->model->getLast();
		$pagination = new Pagination($page, $totalPages);

		$this->view->generate('mainPage.php', ['news' => $news, 'lastNews' => $lastNews[0] ?? null, 'pagination' => $pagination]);
	}

	function show($id) {
		$news = $this->model->getNewsById($id);
		$this->redirectIfEmpty($news);
		$this->view->generate('detailPage.php', ['news' => $news]);
	}

	function redirectIfEmpty($news){
		if (empty($news)) {
            Route::load404();
            return;
        }
	}
}
