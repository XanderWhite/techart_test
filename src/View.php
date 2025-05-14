<?php

namespace App;

class View
{
	function generate($contentView, $data = [])
	{
		extract($data);

		require_once './resources/views/template.php';
	}
}
