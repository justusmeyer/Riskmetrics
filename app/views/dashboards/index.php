
<style>
	*[data-href] {cursor: pointer;}
</style>

<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget well" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

		<!-- widget div-->
		<div>

			<!-- widget content -->
			<div class="widget-body">
				<h4>
					Priorities &nbsp;&nbsp;
					<a href="/todos/create"  class="btn btn-danger btn-small" >
					<i class="fa fa-pencil"></i>
					New</a>
				</h4>
				<hr class="simple">

				<ul id="myTab3" class="nav nav-tabs tabs-pull-right bordered">
					<li class="pull-right">
						<a href="#l4" data-toggle="tab">Annual</a>
					</li>
					<li class="pull-right">
						<a href="#l3" data-toggle="tab">Quarterly</a>
					</li>
					<li class="pull-right">
						<a href="#l2" data-toggle="tab">Monthly</a>
					</li>
					<li class="active">
						<a href="#l1" data-toggle="tab">Weekly </a>
					</li>
				</ul>

				<div id="myTabContent3" class="tab-content padding-10">
					<div class="tab-pane fade in active" id="l1">
						<table class="tablesorter">
							<thead>
								<tr>
									<th width="15%">Department</th>
									<th width="70%">To Do</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach(Todo::getWeekly() as $week):?>
								<tr>
									<td><?php echo $week->category ?></td>
									<td><?php echo $week->task ?></td>
									<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
											<a class="green" href="/todos/edit/<?php echo $week->id ?>">
												<i class="fa fa-pencil"></i>
											</a>
											<a class="red" href="/todos/remove/<?php echo $week->id ?>" onclick="return confirm('Are your sure?');" >
												<i class="fa fa-trash-o"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="l2">
						<table class="tablesorter">
							<thead>
								<tr>
									<th width="15%">Department</th>
									<th width="70%">To Do</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach(Todo::getMonthly() as $month):?>
								<tr>
									<td><?php echo $month->category ?></td>
									<td><?php echo $month->task ?></td>
									<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
											<a class="green" href="/todos/edit/<?php echo $month->id ?>">
												<i class="fa fa-pencil"></i>
											</a>
											<a class="red" href="/todos/remove/<?php echo $month->id ?>" onclick="return confirm('Are your sure?');" >
												<i class="fa fa-trash-o"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="l3">
						<table class="tablesorter">
							<thead>
								<tr>
									<th width="15%">Department</th>
									<th width="70%">To Do</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach(Todo::getQuarterly() as $quarter):?>
								<tr>
									<td><?php echo $quarter->category ?></td>
									<td><?php echo $quarter->task ?></td>
									<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
											<a class="green" href="/todos/edit/<?php echo $quarter->id ?>">
												<i class="fa fa-pencil"></i>
											</a>
											<a class="red" href="/todos/remove/<?php echo $quarter->id ?>" onclick="return confirm('Are your sure?');" >
												<i class="fa fa-trash-o"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="l4">
						<table class="tablesorter">
							<thead>
								<tr>
									<th width="15%">Department</th>
									<th width="70%">To Do</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach(Todo::getLongterm() as $long):?>
								<tr>
									<td><?php echo $long->category ?></td>
									<td><?php echo $long->task ?></td>
									<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
											<a class="green" href="/todos/edit/<?php echo $long->id ?>">
												<i class="fa fa-pencil"></i>
											</a>
											<a class="red" href="/todos/remove/<?php echo $long->id ?>" onclick="return confirm('Are your sure?');" >
												<i class="fa fa-trash-o"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->
</article>
