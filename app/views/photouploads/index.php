

<div class="container">
	<h5>Please select type before uploading photo..</h5>
	<div class="row">
		<form id="upload" method="post" action="/photouploads/upload" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-2">
					<select id="type" class="span3 btn btn-success" name="type">
						<?php foreach(Homepagesection::$link_category as $cat):?>
						<option value="<?php echo $cat ?>"><?php echo $cat ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<p>&nbsp;</p>
			<div id="drop">
				Drop Here <a>Browse</a> <input type="file" name="upl" multiple />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>
			
		</form>
	</div>

	
	
	<p>&nbsp;</p>
	<div class="row">
		<a href="/photouploads/show" class="btn btn-primary">Return to All
			Photos</a>
	</div>
</div>

<script src="../js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="../js/jquery.ui.widget.js"></script>
<script src="../js/jquery.iframe-transport.js"></script>
<script src="../js/jquery.fileupload.js"></script>

<!-- Our main JS file -->
<script src="../js/script.js"></script>
