<?php

class Song extends Controller {
	
	function index() {
		$this->page(1);
	}

	function page($page = 1)
	{

		$songmodel = $this->loadModel('SongModel');
		
		$songs = $songmodel->getSongsByRange(($page * 10) - 10, 10);
		$songcount = $songmodel->getAllSongsCount();

		$template = $this->loadView('song_list_view');
		$template->set('songs', $songs);
		$template->set('songcount', $songcount[0]);
		$template->render();
	}

	function show($id) 
	{

		$songmodel = $this->loadModel('SongModel');
		$song = $songmodel->getSong($id);

		$template = $this->loadView('song_view');
		$template->set('song', $song[0]);
		$template->render();
	}

	function add() {

		// Instantiate an instance of the model
		$songmodel = $this->loadModel('SongModel');
		// Instantiate an instance of the view
		$template = $this->loadView('song_form_view');


		// If a form was attached to this request, attempt to do something with it.
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			// Populate the fields so the user can see the result and fix any issues.
			$template->set('artist', $_POST['artist']);
			$template->set('track', $_POST['track']);
			$template->set('link', $_POST['link']);

			if (empty($_POST['artist']) || empty($_POST['track']) || empty($_POST['link'])) {
				// The user did not fill in the form completely, return an error.
				$template->set('alert', array("type" => "warning", "text" => "<strong>ERROR!</strong> Not all fields were filled correctly. Please try again."));
			} else {
				// Form was filled in -- attempt to save the record to the database.
				if ($songmodel->insertSong($_POST['artist'], $_POST['track'], $_POST['link'])) {
				$template->set('alert', array("type" => "success", "text" => "<strong>SUCCESS!</strong> Song successfully saved."));
				} else {
					$template->set('alert', array("type" => "critical", "text" => "<strong>FATAL ERROR!</strong> Song was not saved. There was an error with the database."));
				}
			}
		} else {
			// If there was some more default configuration to do for the template prior to rendering it in a default stage,
			// that would go here.
			$template->set('heading', 'Add New Song');
		}

		$template->render();	
	}

	function edit($id) {

		// Instantiate an instance of the model
		$songmodel = $this->loadModel('SongModel');
		// Instantiate an instance of the view
		$template = $this->loadView('song_form_view');


		// If a form was attached to this request, attempt to do something with it.
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			// Populate the fields so the user can see the result and fix any issues.
			$template->set('artist', $_POST['artist']);
			$template->set('track', $_POST['track']);
			$template->set('link', $_POST['link']);

			if (empty($id)) {
				$template->set('alert', array("type" => "critical", "text" => "<strong>ERROR!</strong> No ID was specified. Navigate back to the main page."));
			} elseif (empty($_POST['artist']) || empty($_POST['track']) || empty($_POST['link'])) {
				// The user did not fill in the form completely, return an error.
				$template->set('alert', array("type" => "warning", "text" => "<strong>ERROR!</strong> Not all fields were filled correctly. Please try again."));
			} else {
				// Form was filled in -- attempt to save the record to the database.
				if ($songmodel->insertSong($_POST['artist'], $_POST['track'], $_POST['link'])) {
				$template->set('alert', array("type" => "success", "text" => "<strong>SUCCESS!</strong> Song successfully saved."));
				} else {
					$template->set('alert', array("type" => "critical", "text" => "<strong>FATAL ERROR!</strong> Song was not saved. There was an error with the database."));
				}
			}
		} else {
			// If there was some more default configuration to do for the template prior to rendering it in a default stage,
			// that would go here.

			$template->set('heading', 'Edit Existing Song');

			// Pull in the existing values from the database
			$song = $songmodel->getSong($id);
			$template->set('artist', $song[0]->artist);
			$template->set('track', $song[0]->track);
			$template->set('link', $song[0]->link);

		}

		$template->render();	
	}

	function delete($id) {

		// Instantiate an instance of the model
		$songmodel = $this->loadModel('SongModel');
		// Instantiate an instance of the view
		$template = $this->loadView('song_delete_view');

		$template->set('heading','Delete Song');

		if (empty($id)) {
			$template->set('alert', array("type" => "critical", "text" => "<strong>ERROR!</strong> No ID was specified. Navigate back to the main page."));
		} else {
			// An ID was specified -- attempt to delete the record.
			if ($songmodel->deleteSong($id)) {
			$template->set('alert', array("type" => "success", "text" => "<strong>SUCCESS!</strong> Song successfully deleted."));
			} else {
				$template->set('alert', array("type" => "critical", "text" => "<strong>FATAL ERROR!</strong> Song was not deleted. There was an error with the database."));
			}
		}

		$template->render();	
	}

    
}

?>