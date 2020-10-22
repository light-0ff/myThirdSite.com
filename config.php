<?php

const DEVELOP_MODE = true;

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'test';

const ABS_PATH = __DIR__;
const SEP = '/';
const EXT = '.php';

const INC = ABS_PATH . SEP . 'includes' . SEP;
const CON = ABS_PATH . SEP . 'content' . SEP;

const CORE_PATH = INC . 'core' . SEP;
const MODELS_PATH = INC . 'models' . SEP;

const VIEWS_PATH = CON . 'views' . SEP;
const PAGES_PATH = VIEWS_PATH . 'pages' . SEP;
const CONTRL_PATH = CON . 'controllers' . SEP;

function autoloadCoreClass($class_name)
{
	$directorys = array(
		CORE_PATH,
		MODELS_PATH,
		CONTRL_PATH
	);
	foreach ($directorys as $directory) {
		$parts = explode('\\', $class_name);
		//var_dump($parts);
		if (file_exists($directory . end($parts) . EXT)) {
			require_once($directory . end($parts) . EXT);
			return;
		}
	}
}
spl_autoload_register('autoloadCoreClass');

function varDump($data = null)
{
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}
// -------------------------------------------------------------------------------------------------------

// -------------------------------------------------------------------------------------------------------
//  вывод коминтариев
function comment_render($mass = [], $index = null)
{
	foreach ($mass as  $value) {
		// varDump($value);
		if ($value['parent_id'] == $index) {
			if ($index != null) echo '<div class="commentOneLevel pl-md-20 pl-sm-10 pl-0 mb-9">';
			echo "<article class='commentArea overflow-hidden d-flex align-items-start mb-6'>
		<a href='javascript:void(0);' class='img rounded pr-5'><img src='" . $value['avatar'] ."' alt='image description' class='img-fluid'></a>
		<div class='txtHolder border px-2 py-2'>
			<span class='commentDate d-block mb-2'><a href='javascript:void(0);'>" . $value['fio'] . "</a> " . $value['date'] . " <a href='javascript:void(0);' class='link text-green'>Reply</a></span>
			<p class='mb-1'>" . $value['comment'] . "</p>
			<p class='d-none userId'>". $value['user_id'] ."</p>
		</div>
	  </article>";
			if ($index != null) echo '</div>';
			comment_render($mass, $value['id']);
		}
	}
}
