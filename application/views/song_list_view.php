<?php include('header.php'); ?>
	
 	<div class="container">
 		<h1>Song List</h1>
 	</div>


    <div class="container">
        <?= $pagination ?>
        <form method="get">
            Artist Filter: <input type="text" value="<?= $searchArtist ?>" name="searchArtist"> <input type="submit" value="Search">
        </form>
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
        ?>
			<div class="row buff">
    			<div class=col-md-1><a href="<?= BASE_URL ?>song/show/<?= $song->id ?>"><?= $song->id ?></a></div>
    			<div class=col-md-3><?= $song->artist ?></div>
    			<div class=col-md-5><a href="<?= $song->link ?>" target="_new"><?= $song->track ?></a></div>
                <div class=col-md-3>
                    <div class="btn-group btn-group-justified">
                        <a role="button" class="btn btn-primary" href="<?= BASE_URL ?>song/edit/<?= $song->id ?>">Edit</a>
                        <a role="button" class="btn btn-danger" href="<?= BASE_URL ?>song/delete/<?= $song->id ?>">Delete</a>
                    </div>
                </div>
			</div>
        <?
		}
		?>

        <div class="row buff">
            <div class="col-md-9">&nbsp;</div>
            <div class="col-md-3">
                <div class="btn-group btn-group-justified">
                    <a role="button" class="btn btn-success" href="<?= BASE_URL ?>song/add/">Add Song</a>
                </div>
            </div>
        </div>
	</div>

    <div class="container">
        <?= $pagination ?>
    </div>


<?php include('footer.php'); ?>