<div class="page-header">
	<h1>
		Photography
		<small>
			<i class="icon-double-angle-right"></i>
			Photography Database
		</small>
	</h1>
</div>

<a class="btn btn-primary" href="/photouploads">Click Here To Upload Photos</a>

<h4>Select website section to view photos:</h4>
<form action="/photouploads/show" method="post" id="formfilter">
	<select class="btn btn-minier btn-default dropdown-toggle" name="type" onchange="formfilter.submit()">
		<option value="0">No Category</option>
		<?php foreach(Homepagesection::$link_category as $typed):?>
		<option value="<?php echo $typed ?>" <?php echo (isset($_POST['type']) && $_POST['type'] == $typed) ? 'selected':'' ?>><?php echo $typed ?></option>
		<?php endforeach ?>
	</select>
</form>

<div class="">
	<?php for($i = 0; $i < ceil(count($this->products)/4);$i++):?>
	<ul class="thumbnails">
	<?php for($a = 0; $a <4 && (4*$i)+$a < count($this->products); $a++): ?>
		<?php $product = $this->products->current() ?>
		<li class="span3">
			<a class="thumbnail"  data-toggle="modal" class="" href="/photouploads/edit/?id=<?php echo $product->id ?>" data-target="#myModal">
				<img src="/uploads/<?php echo $product->name ?>" class="" style="height: 300px" />
			</a>
		</li>
		<?php $this->products->next();?>
	<?php endfor ?>
	</ul>
	<?php endfor ?>
</div>

<div id="myModal" class="modal fade" tabindex="-1">

</div>

<script>
$('#myModal').on('show.bs.modal', function (e) {
	  console.log(this);
	  console.log();
	  $.get(e.relatedTarget.href, function(data){
		  $('#myModal').html(data);
		  });
	})
</script>
