<h3>Add New To Do:</h3>

<form method="post" action="/todos/<?php echo $this->action ?>" class="form-horizontal ">

<fieldset>
		<div class="row-fluid">
			<div class="form-group">
				<label class="col-sm-2 control-label">Timeline</label>
				<div class="col-xs-3">
					<select class="form-control" name="todos[timeline]">
					<?php foreach(Todo::$todo_lengths as $time):?>
						<option value="<?php echo $time ?>" <?php echo (isset($this->todos) && $this->todos->timeline == $time) ? 'selected="selected"':'' ?>><?php echo $time ?></option>
					<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Task</label>
				<div class="col-xs-7">
					<input class="form-control" name="todos[task]" type="text" placeholder="Task.." value="<?php echo isset($this->todos)?$this->todos->task:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">To Do Category</label>
				<div class="col-xs-3">
					<input class="form-control" name="todos[category]" type="text" placeholder="Category.." value="<?php echo isset($this->todos)?$this->todos->category:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Preparation</label>
				<div class="col-xs-7">
					<input class="form-control" name="todos[preparation]" type="text" placeholder="Preparation.." value="<?php echo isset($this->todos)?$this->todos->preparation:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Responsible</label>
				<div class="col-xs-3">
					<input class="form-control" name="todos[responsible]" type="text" placeholder="Initials.." value="<?php echo isset($this->todos)?$this->todos->responsible:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Due Date</label>
				<div class="col-xs-3">
					<input class="form-control" name="todos[due_date]" type="text" placeholder="mm/dd.." value="<?php echo isset($this->todos)?$this->todos->due_date:'' ?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Link</label>
				<div class="col-xs-3">
					<input class="form-control" name="todos[link]" type="text" placeholder="url.." value="<?php echo isset($this->todos)?$this->todos->link:'' ?>"/>
				</div>
			</div>
		</div>
</fieldset>
<input type="submit" value="Add / Save To Do" class="btn btn-primary" />
	
</form>

