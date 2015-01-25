<h3>Add / Edit Fund Details</h3>

<form method="post" action="/fundreturns/<?php echo $this->action ?>" class="form-horizontal ">

<fieldset>
		<div class="row-fluid">
			<div class="form-group">
				<label class="col-sm-2 control-label">Fund</label>
				<div class="col-xs-7">
					<input class="form-control" name="funds[task]" type="text" placeholder="Task.." value="<?php echo isset($this->todos)?$this->todos->task:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Asset Class</label>
				<div class="col-xs-3">
					<select class="form-control" name="funds[type]">
					<?php foreach(Fundreturn::$fund_types as $type):?>
						<option value="<?php echo $type ?>" <?php echo (isset($this->todos) && $this->todos->timeline == $type) ? 'selected="selected"':'' ?>><?php echo $type ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Inception</label>
				<div class="col-xs-7">
					<input class="form-control" name="todos[task]" type="text" placeholder="Task.." value="<?php echo isset($this->todos)?$this->todos->task:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Fees</label>
				<div class="col-xs-3">
					<input class="form-control" name="todos[category]" type="text" placeholder="Category.." value="<?php echo isset($this->todos)?$this->todos->category:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Terms</label>
				<div class="col-xs-7">
					<input class="form-control" name="todos[preparation]" type="text" placeholder="Preparation.." value="<?php echo isset($this->todos)?$this->todos->preparation:'' ?>"/>
				</div>
			</div>
		</div>
</fieldset>
<input type="submit" value="Add / Save Fund" class="btn btn-primary" />
	
</form>


