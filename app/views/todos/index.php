<style>
.red {color: #FF0000;}

@media print {
	@page {size: portrait;
		margin-top: 5mm;
		margin-left:1mm;
		margin-right:1mm;
		margin-bottom: 5mm;}
	#side-menu {display:none}
	.navbar {display:none}
   	table.tablesorter tbody tr {font-size:8px;}
    table.tablesorter thead th, table.tablesorter tbody td {font-size:8px;}
}
</style>

<div class="page-header">
	<h1>
		Hub
		<small>
			<i class="icon-double-angle-right"></i>
			Priorities
		</small>
	</h1>
</div>

<h2>Halsbrook Office Priorities: <span class="red"><?php echo date("j F Y");?></span></h2>

<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-block alert-success">
			<a href="/todos/create"  class="btn btn-danger btn-xs" >
			<i class="icon-pencil align-top bigger-125"></i>
			Add New To Do</a>
		</div>
	</div>
</div>

<h4>Ongoing Weekly To Dos</h4>
<table class="tablesorter">
	<thead>
		<tr>
			<th width="10%">Department</th>
			<th width="44%">To Do</th>
			<th width="20%">Preparation</th>
			<th width="10%">Responsible</th>
			<th width="10%">Due Date</th>
			<th width="6%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->todos as $todo): ?>
		<tr>
			<td><?php echo $todo->category ?></td>
			<td><?php echo $todo->task ?></td>
			<td><?php echo $todo->preparation ?></td>
			<td><?php echo $todo->responsible ?></td>
			<td><?php echo $todo->due_date ?></td>
			<td>
				<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
					<a class="green" href="/todos/edit/<?php echo $todo->id ?>">
						<i class="icon-pencil bigger-120"></i>
					</a>
					<a class="red" href="/todos/remove/<?php echo $todo->id ?>" onclick="return confirm('Are your sure?');" >
						<i class="icon-trash bigger-120"></i>
					</a>
				</div>
			</td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>

<h4>Monthly To Dos</h4>
<table class="tablesorter">
	<thead>
		<tr>
			<th width="10%">Department</th>
			<th width="44%">To Do</th>
			<th width="20%">Preparation</th>
			<th width="10%">Responsible</th>
			<th width="10%">Due Date</th>
			<th width="6%">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach(Todo::getMonthly($this->todos) as $month):?>
		<tr>
			<td><?php echo $month->category ?></td>
			<td><?php echo $month->task ?></td>
			<td><?php echo $month->preparation ?></td>
			<td><?php echo $month->responsible ?></td>
			<td><?php echo $month->due_date ?></td>
			<td>
				<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
					<a class="green" href="/todos/edit/<?php echo $month->id ?>">
						<i class="icon-pencil bigger-120"></i>
					</a>
					<a class="red" href="/todos/remove/<?php echo $month->id ?>" onclick="return confirm('Are your sure?');" >
						<i class="icon-trash bigger-120"></i>
					</a>
				</div>
			</td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>

<h4>Quarterly To Dos</h4>
<table class="tablesorter">
	<thead>
		<tr>
			<th width="10%">Department</th>
			<th width="44%">To Do</th>
			<th width="20%">Preparation</th>
			<th width="10%">Responsible</th>
			<th width="10%">Due Date</th>
			<th width="6%">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach(Todo::getQuarterly($this->todos) as $quarter):?>
		<tr>
			<td><?php echo $quarter->category ?></td>
			<td><?php echo $quarter->task ?></td>
			<td><?php echo $quarter->preparation ?></td>
			<td><?php echo $quarter->responsible ?></td>
			<td><?php echo $quarter->due_date ?></td>
			<td>
				<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
					<a class="green" href="/todos/edit/<?php echo $quarter->id ?>">
						<i class="icon-pencil bigger-120"></i>
					</a>
					<a class="red" href="/todos/remove/<?php echo $quarter->id ?>" onclick="return confirm('Are your sure?');" >
						<i class="icon-trash bigger-120"></i>
					</a>
				</div>
			</td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>

<h4>Long-Term</h4>
<table class="tablesorter">
	<thead>
		<tr>
			<th width="10%">Department</th>
			<th width="44%">To Do</th>
			<th width="20%">Preparation</th>
			<th width="10%">Responsible</th>
			<th width="10%">Due Date</th>
			<th width="6%">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach(Todo::getLongterm($this->todos) as $long):?>
		<tr>
			<td><?php echo $long->category ?></td>
			<td><?php echo $long->task ?></td>
			<td><?php echo $long->preparation ?></td>
			<td><?php echo $long->responsible ?></td>
			<td><?php echo $long->due_date ?></td>
			<td>
				<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
					<a class="green" href="/todos/edit/<?php echo $long->id ?>">
						<i class="icon-pencil bigger-120"></i>
					</a>
					<a class="red" href="/todos/remove/<?php echo $long->id ?>" onclick="return confirm('Are your sure?');" >
						<i class="icon-trash bigger-120"></i>
					</a>
				</div>
			</td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>