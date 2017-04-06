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
        <form id="song-form" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="artist-name">Artist Name</span>
                        <input type="text" class="form-control" value="<?= $artist ?>" placeholder="The Avener, Phobe Killdeer" id="artist" name="artist" aria-describedby="artist-name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="track-name">Track Name</span>
                        <input type="text" class="form-control" value="<?= $track ?>" placeholder="Fade Out Lines" id="track" name="track" aria-describedby="track-name">
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="basic-addon3">Link URL</span>
                        <input type="text" class="form-control" id="link" name="link" value="<?= $link ?>" placeholder="https://youtu.be/hqwU7nv3hTM" aria-describedby="basic-addon3">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group btn-group-justified">
                        <!-- The only reason I used this mess is because it is the only way to make the button
                             span the entire container. Use button or input type="button" instead... -->
                        <a href="#" role="button" class="btn btn-success" onclick="document.getElementById('song-form').submit();">Save Song</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <p><a href="<?= BASE_URL ?>">Back to Song List</a></p>
    </div>


<?php include('footer.php'); ?>