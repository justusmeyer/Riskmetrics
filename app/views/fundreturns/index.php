<h4>Fund Summary:</h4>
<table class="tablesorter">
	<thead>
		<tr>
			<th>Fund</th>
			<th>Asset Class</th>
			<th>Inception</th>
			<th>Fee</th>
			<th>Terms</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->fundreturns as $fundr): ?>
		<tr>
			<td><?php echo $fundr->fund ?></td>
			<td><?php echo $fundr->type ?></td>
			<td><?php echo $fundr->inception ?></td>
			<td><?php echo number_format($fundr->fee,2) ?>%</td>
			<td><?php echo $fundr->terms ?></td>
			<td>
				<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
					<a class="green" href="/fundreturns/edit/<?php echo $fundr->id ?>">
						<i class="fa fa-pencil bigger-120"></i>
					</a>
				</div>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
