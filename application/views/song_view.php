<?php include('header.php'); ?>
	

 	<div class="container">
 		<h1>Song Detail</h1>
 	</div>

    <div class="container">
		<div class="row">
			<div class="col-md-6"><strong>Song ID</strong></div><div class=col-md-6><?= $song->id ?></div>
			<div class="col-md-6"><strong>Artist</strong></div><div class=col-md-6><?= $song->artist ?></div>
			<div class="col-md-6"><strong>Track</strong></div><div class=col-md-6><a href="<?= $song->link ?>" target="_new"><?= $song->track ?></a></div>
		</div>
	</div>


<?php include('footer.php'); ?>