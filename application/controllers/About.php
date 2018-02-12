<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application
{

	/**
	 * Index Page for About controller.
	 *
	 * This display the page title and sets page body to the about.php view
	 */
	public function index()
	{
                $this->data['pagetitle'] = 'Path of Exile - About';
		$this->data['pagebody'] = 'about';
		$this->render(); 
	}
}