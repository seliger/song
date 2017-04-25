<?php

class SongModel extends Model {

	// NOTES:
	// Functions query and escapeString defined in the base class (Model)
	// are wrapper functions for the MySQL library functions mysql_query
	// and mysql_real_escape_string.
	//
	// Another wrapper function, escapeArray is also provided. It will
	// walk all elements of an array and escape the values of each element.

	public function getAllSongs() {
		return $this->query('SELECT * FROM song ORDER BY id');
	}

	public function getAllSongsCount() {
		return $this->query('SELECT COUNT(*) AS songcount FROM song');
	}

	public function getSongsByRange($low, $high) {
		$query = sprintf('SELECT * FROM song ORDER BY id LIMIT %s, %s',
			$this->escapeString($low),
			$this->escapeString($high));

		return $this->query($query);
	}	
	
	public function getSong($id) {
		// When you have a query where you are substituting in values that
		// come from input, this is the documented best way to bind the
		// values into the SQL query string.
		// http://php.net/manual/en/function.mysql-query.php
		$query = sprintf("SELECT * FROM song WHERE id=%s",
			$this->escapeString($id));

		$result = $this->query($query);
		return $result;
	}

	public function insertSong($artist, $track, $link) {

		$query = sprintf('INSERT INTO song (artist, track, link) VALUES ("%s", "%s", "%s")',
			$this->escapeString($artist),
			$this->escapeString($track),
			$this->escapeString($link));

		// Returns a boolean
		return $this->execute($query);

	}

	public function updateSong($id, $artist, $track, $link) {
		$query = sprintf('UPDATE song SET artist = "%s", track = "%s", link = "%s" WHERE id = %s',
			$this->escapeString($artist),
			$this->escapeString($track),
			$this->escapeString($link),
			$this->escapeString($id));

		// Returns a boolean
		return $this->execute($query);

	}

	public function deleteSong ($id) {
		$query = sprintf('DELETE FROM song WHERE id = %s',
			$this->escapeString($id));

		// Returns a boolean
		return $this->execute($query);

	}
}

?>
