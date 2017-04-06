<?php include('header.php'); ?>
	

    <!-- Main jumbotron for a primary marketing message or call to action -->
<!--     <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
 -->


 	<div class="container">
 		<h1>Song List</h1>
 	</div>

    <div class="container">
    	<div class="row">
    		<div class="col-md-1"><h3>ID</h3></div>
    		<div class="col-md-3"><h3>Artist</h3></div>
    		<div class="col-md-5"><h3>Track</h3></div>
            <div class="col-md-3"><h3>Action</h3></div>
    	</div>

		<?
		foreach ($songs as $song) {
			echo '<div class="row buff">';
    			echo '<div class=col-md-1><a href="song/show/'.$song->id.'">'.$song->id.'</a></div>';
    			echo '<div class=col-md-3>'.$song->artist.'</div>';
    			echo '<div class=col-md-5><a href="'.$song->link.'" target="_new">'.$song->track.'</a></div>';
                echo '<div class=col-md-3>';
                    echo '<div class="btn-group btn-group-justified">';
                        echo '<a role="button" class="btn btn-primary" href="song/edit/'.$song->id.'">Edit</a>';
                        echo '<a role="button" class="btn btn-danger" href="song/delete/'.$song->id.'">Delete</a>';
                    echo '</div>';
                echo '</div>';
			echo '</div>';

		}
		?>

        <div class="row buff">
            <div class="col-md-9">&nbsp;</div>
            <div class="col-md-3">
                <div class="btn-group btn-group-justified">
                    <a role="button" class="btn btn-success" href="song/add/">Add Song</a>
                </div>
            </div>
        </div>
	</div>

<?php include('footer.php'); ?>