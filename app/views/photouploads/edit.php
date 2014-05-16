<style>
	.modal img{max-width: 100%;}
</style>

<div class="modal-dialog">


<div class="modal-content">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
    	<h3 id="myModalLabel">Edit Photo</h3>
    	<a class="btn btn-danger btn-minier" href="/photouploads/delete/<?php echo $this->product->id ?>">Delete</a>
	</div>
	<div class="modal-body">
		<div class="btn-group btn-group-justified">
			<div class="btn-group">
				<button type="button" class="btn btn-default" onclick="rotate(90)">Rotate Left</button>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-default" onclick="rotate(-90)">Rotate Right</button>
			</div>
		</div>
		<p>&nbsp;</p>
		<img src="/uploads/<?php echo $this->product->name ?>" class="" id="mainimage"/>
		<p>&nbsp;</p>
		<form id="photoinfo">
		<select class="btn btn-minier btn-success dropdown-toggle" name="type" onchange="editinfo()">
			<?php foreach(Homepagesection::$link_category as $type):?>
			<option value="<?php echo $type ?>" <?php echo (isset($this->product) && $this->product->type == $type) ? 'selected="selected"':'' ?>><?php echo $type ?></option>		
			<?php endforeach ?>
		</select>
		</form>
	</div>
	<div class="modal-footer">
		<h4>This saves on change..</h4>
	</div>
</div>



<script>

 var resCanvas2 ="";

 var productid = <?php echo $this->product->id ?>;

function rotate(degree) {
	$.get("/photouploads/rotate/<?php echo $this->product->id ?>/?degree="+degree, function(data) {
		$("#mainimage").attr("src","/uploads/<?php echo $this->product->name ?>");
	});
}

function editinfo()
{
	$.post("/photouploads/editinfo/<?php echo $this->product->id ?>/", $("#photoinfo").serialize());
}
 
 </script>
 </div>
 
