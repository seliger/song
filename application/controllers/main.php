<?php

class Main extends Controller {
	
	function index()
	{

		$songmodel = $this->loadModel('SongModel');
		$songs = $songmodel->getAllSongs();

		$template = $this->loadView('main_view');
		$template->set('songs', $songs);
		$template->render();
	}
    
}

?>
