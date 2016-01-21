<?php 

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title, $message);
}

/**
 * The path to a given flyer
 * 
 * @param  Flyer  $flyer [description]
 * @return string
 */
function flyer_path(App\Flyer $flyer)
{
	 return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}