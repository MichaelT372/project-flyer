<?php

namespace App\Http;

class Flash {

	/**
	 * create a flash message.
	 * 						
	 * @param  string 	   $title   
	 * @param  string 	   $message 
	 * @param  string 	   $level   
	 * @param  string|null $key     
	 * @return void
	 */
	public function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level' => $level
		]);
	}

	/**
	 * create an information flash message.
	 * 						
	 * @param  string $title   
	 * @param  string $message 
	 * @return void
	 */
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');
	}

	/**
	 * create a success flash message.
	 * 						
	 * @param  string $title   
	 * @param  string $message 
	 * @return void
	 */
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');
	}

	/**
	 * create an error flash message.
	 * 						
	 * @param  string $title   
	 * @param  string $message 
	 * @return void
	 */
	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');
	}

	/**
	 * create a confirm flash message.
	 * 						
	 * @param  string $title   
	 * @param  string $message 
	 * @param  string $level      
	 * @return void
	 */
	public function confirm($title, $message, $level = 'success')
	{
		return $this->create($title, $message, $level, 'flash_message_confirm');
	}

}