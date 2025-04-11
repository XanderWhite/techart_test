<?php
class View
{
	function generate($contentView, $data = [])
	{
		extract($data);

		require_once './app/views/template.php';
	}
}
?>