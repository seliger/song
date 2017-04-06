<?php include('header.php'); ?>

 	<div class="container">
 		<h1><?= $heading ?></h1>
 	</div>

    <?
    if ($alert) {
    ?>
        <div class="container">
            <div class="alert alert-<?= $alert['type'] ?>"><?= $alert['text'] ?></div>
        </div>
    <?
    }
    ?>

    <div class="container">
        <p><a href="<?= BASE_URL ?>">Back to Song List</a></p>
    </div>


<?php include('footer.php'); ?>