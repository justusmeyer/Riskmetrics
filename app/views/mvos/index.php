<style>
.mvo {width: 100%;}
.mvo thead td{text-align:center; background-color:#303030 ; color: white; font-weight: bold;}
.mvo input{width: 100%; height: 100%; padding:0px; font-size:12px;}
.mvo tbody td:first-child{width: 20%; font-size:12px; text-align: left;}
.mvo tbody td{font-size:11px; text-align: center;}
.mvo tbody th{font-size:14px; text-align: center;}
.mvo tbody th:first-child{font-size:14px; text-align: left;}
.mvo thead th{font-size:14px; text-align: center;}
.mvo thead th:first-child{font-size:14px; text-align: left;}
.mvo input, textarea{text-align: left; color:black; background-color:transparent; font-size:12px;}
.mvo input.black, textarea{background-color:white; color:grey; text-align: center; }
.mvo input.orange, textarea{background-color:Lightskyblue; color:black; text-align: center; }
.mvo input.green, textarea{background-color:red; color:white; text-align: center;}
::-webkit-input-placeholder{color:grey; font-size:9px; }
:-moz-placeholder{color:grey; font-size:9px; }
::-moz-placeholder{color:grey; font-size:9px; }
:-ms-input-placeholder{color:grey; font-size:9px; }

</style>

 
    <script type="text/javascript">
        $(document).ready(function() {
            $('#Button1').click(function() {
                location.reload();
            });
        });     
    </script>

    <button id="Button1" class="btn btn-danger">
    <i class="fa fa-refresh"></i>&nbsp;&nbsp;Reload
    </button>
    <p>&nbsp;</p>

<?php foreach ($this->mvos as $weights): ?>
<?php endforeach ?>
<?php foreach(MVO::getTrans1($this->mvos) as $trans):?>
<?php $a = $trans->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans2($this->mvos) as $trans2):?>
<?php $b = $trans2->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans3($this->mvos) as $trans3):?>
<?php $c = $trans3->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans4($this->mvos) as $trans4):?>
<?php $d = $trans4->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans5($this->mvos) as $trans5):?>
<?php $e = $trans5->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans6($this->mvos) as $trans6):?>
<?php $f = $trans6->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans7($this->mvos) as $trans7):?>
<?php $g = $trans7->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans8($this->mvos) as $trans8):?>
<?php $h = $trans8->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans9($this->mvos) as $trans9):?>
<?php $i = $trans9->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans10($this->mvos) as $trans10):?>
<?php $j = $trans10->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans11($this->mvos) as $trans11):?>
<?php $k = $trans11->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans12($this->mvos) as $trans12):?>
<?php $l = $trans12->mean_stdev/100 ?>
<?php endforeach?>
<?php foreach(MVO::getTrans13($this->mvos) as $trans13):?>
<?php $m = $trans13->mean_stdev/100 ?>
<?php endforeach?>

<h4>Please enter different porfolio weights here:</h4>
<form method="post" action="/mvo/addweight/<?php echo $weights->id ?>" >
	<table class="mvo">
		<thead>
			<tr>
				<th>Asset Class</th>
				<th>Target Allocation</th>
				<th>Portfolio 2</th>
				<th>Portfolio 3</th>
				<th>Portfolio 4</th>
				<th>Portfolio 5</th>
			
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->mvos as $weights): ?>
			<tr>
				<td><input type="text" id="form-input-readonly" readonly="" name="mvo[asset_class]" value="<?php echo $weights->asset_class ?>"></td>
				<td><input placeholder="% Weight.." class="black" type="text" name="mvo[weight_1]" onchange="addWeight(this)"  value="<?php echo $weights->weight_1 ?>" /></td>
				<td><input placeholder="% Weight.." class="black" type="text" name="mvo[weight_2]" onchange="addWeight(this)"  value="<?php echo $weights->weight_2 ?>" /></td>
				<td><input placeholder="% Weight.." class="black" type="text" name="mvo[weight_3]" onchange="addWeight(this)"  value="<?php echo $weights->weight_3 ?>" /></td>
				<td><input placeholder="% Weight.." class="black" type="text" name="mvo[weight_4]" onchange="addWeight(this)"  value="<?php echo $weights->weight_4 ?>" /></td>
				<td><input placeholder="% Weight.." class="black" type="text" name="mvo[weight_5]" onchange="addWeight(this)"  value="<?php echo $weights->weight_5 ?>" /></td>
				<td><input type="hidden" name="mvo[id]" value="<?php echo $weights->id ?>"></td>
				<td><input type="hidden" name="mvo[mean_return]" value="<?php echo $weights->mean_return ?>"></td>
				<td><input type="hidden" name="mvo[mean_stdev]" value="<?php echo $weights->mean_stdev ?>"></td>
				<td><input type="hidden" name="mvo[corr_1]" value="<?php echo $weights->corr_1 ?>"></td>
				<td><input type="hidden" name="mvo[corr_2]" value="<?php echo $weights->corr_2 ?>"></td>
				<td><input type="hidden" name="mvo[corr_3]" value="<?php echo $weights->corr_3 ?>"></td>
				<td><input type="hidden" name="mvo[corr_4]" value="<?php echo $weights->corr_4 ?>"></td>
				<td><input type="hidden" name="mvo[corr_5]" value="<?php echo $weights->corr_5 ?>"></td>
				<td><input type="hidden" name="mvo[corr_6]" value="<?php echo $weights->corr_6 ?>"></td>
				<td><input type="hidden" name="mvo[corr_7]" value="<?php echo $weights->corr_7 ?>"></td>
				<td><input type="hidden" name="mvo[corr_8]" value="<?php echo $weights->corr_8 ?>"></td>
				<td><input type="hidden" name="mvo[corr_9]" value="<?php echo $weights->corr_9 ?>"></td>
				<td><input type="hidden" name="mvo[corr_10]" value="<?php echo $weights->corr_10 ?>"></td>
				<td><input type="hidden" name="mvo[corr_11]" value="<?php echo $weights->corr_11 ?>"></td>
				<td><input type="hidden" name="mvo[corr_12]" value="<?php echo $weights->corr_12 ?>"></td>
				<td><input type="hidden" name="mvo[corr_13]" value="<?php echo $weights->corr_13 ?>"></td>
			</tr>
			<?php endforeach?>
			<?php $w1 = 0; ?>
			<?php $w2 = 0; ?>
			<?php $w3 = 0; ?>
			<?php $w4 = 0; ?>
			<?php $w5 = 0; ?>
			<?php foreach ($this->mvos as $weights): ?>
			<?php $w1 += $weights->weight_1; ?>
			<?php $w2 += $weights->weight_2; ?>
			<?php $w3 += $weights->weight_3; ?>
			<?php $w4 += $weights->weight_4; ?>
			<?php $w5 += $weights->weight_5; ?>
			<?php endforeach ?>
			<tr>
				<th>Total</th>
				<th><?php echo $w1 ?></th>
				<th><?php echo $w2 ?></th>
				<th><?php echo $w3 ?></th>
				<th><?php echo $w4 ?></th>
				<th><?php echo $w5 ?></th>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<th>Rebalanced Geometric Mean</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
			</tr>
			<tr>
				<th>Portfolio Std. Deviation</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
			</tr>
			<tr>
				<th>Sharpe (3%)</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
				<th>p</th>
			</tr>
			<?php $gwm1 = 0; ?>
			<?php $gwm2 = 0; ?>
			<?php $gwm3 = 0; ?>
			<?php $gwm4 = 0; ?>
			<?php $gwm5 = 0; ?>
			<?php foreach ($this->mvos as $weights): ?>
			<?php $gwm1 += $weights->product_1; ?>
			<?php $gwm2 += $weights->product_2; ?>
			<?php $gwm3 += $weights->product_3; ?>
			<?php $gwm4 += $weights->product_4; ?>
			<?php $gwm5 += $weights->product_5; ?>
			<?php endforeach ?>
			<tr>
				<th>Geometric Weighted Mean</th>
				<th><?php echo number_format($gwm1*100,2); ?>%</th>
				<th><?php echo number_format($gwm2*100,2); ?>%</th>
				<th><?php echo number_format($gwm3*100,2); ?>%</th>
				<th><?php echo number_format($gwm4*100,2); ?>%</th>
				<th><?php echo number_format($gwm5*100,2); ?>%</th>
			</tr>
		</tbody>
	</table>
</form>

<hr class="simple">

<h4>Please enter your return and standard deviation assumptions here:</h4>

<form method="post" action="/mvo/addweight/<?php echo $weights->id ?>" >
<table class="mvo">
	<thead>
		<tr>
			<th width="20%">Asset Class</th>
			<th width="20%">Mean Return</th>
			<th width="20%">Mean St Dev</th>
			<th width="20%">Variance</th>
			<th width="20%">R* (approx. arithmetic return)</th>
		
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->mvos as $weights): ?>
		<tr>
			<td><input type="text" id="form-input-readonly" readonly="" name="mvo[asset_class]" value="<?php echo $weights->asset_class ?>"></td>
			<td><input placeholder="Mean Return.." class="black" type="text" onchange="addWeight(this)" name="mvo[mean_return]" value="<?php echo $weights->mean_return ?>"></td>
			<td><input placeholder="Mean Stdev.." class="black" type="text" onchange="addWeight(this)" name="mvo[mean_stdev]" value="<?php echo $weights->mean_stdev ?>"></td>
			<td><input type="text" id="form-input-readonly" readonly="" name="mvo[var]" class="black" value="<?php echo number_format(($weights->var)*100,2) ?>%"></td>
			<td><input type="text" id="form-input-readonly" readonly="" name="mvo[R]" class="black" value="<?php echo number_format(($weights->R)*100,2) ?>%"></td>
			<td><input type="hidden" name="mvo[id]" value="<?php echo $weights->id ?>"></td>
			<td><input type="hidden" name="mvo[weight_1]" value="<?php echo $weights->weight_1 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_2]" value="<?php echo $weights->weight_2 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_3]" value="<?php echo $weights->weight_3 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_4]" value="<?php echo $weights->weight_4 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_5]" value="<?php echo $weights->weight_5 ?>" /></td>
			<td><input type="hidden" name="mvo[corr_1]" value="<?php echo $weights->corr_1 ?>"></td>
			<td><input type="hidden" name="mvo[corr_2]" value="<?php echo $weights->corr_2 ?>"></td>
			<td><input type="hidden" name="mvo[corr_3]" value="<?php echo $weights->corr_3 ?>"></td>
			<td><input type="hidden" name="mvo[corr_4]" value="<?php echo $weights->corr_4 ?>"></td>
			<td><input type="hidden" name="mvo[corr_5]" value="<?php echo $weights->corr_5 ?>"></td>
			<td><input type="hidden" name="mvo[corr_6]" value="<?php echo $weights->corr_6 ?>"></td>
			<td><input type="hidden" name="mvo[corr_7]" value="<?php echo $weights->corr_7 ?>"></td>
			<td><input type="hidden" name="mvo[corr_8]" value="<?php echo $weights->corr_8 ?>"></td>
			<td><input type="hidden" name="mvo[corr_9]" value="<?php echo $weights->corr_9 ?>"></td>
			<td><input type="hidden" name="mvo[corr_10]" value="<?php echo $weights->corr_10 ?>"></td>
			<td><input type="hidden" name="mvo[corr_11]" value="<?php echo $weights->corr_11 ?>"></td>
			<td><input type="hidden" name="mvo[corr_12]" value="<?php echo $weights->corr_12 ?>"></td>
			<td><input type="hidden" name="mvo[corr_13]" value="<?php echo $weights->corr_13 ?>"></td>
		</tr>
		<?php endforeach?>
	</tbody>
</table>
</form>

<p>&nbsp;</p>
<h4>Please enter your correlation assumptions here:</h4>

<form method="post" action="/mvo/addweight/<?php echo $weights->id ?>" >
<table class="mvo">
	<thead>
		<tr>
			<th>Asset Class</th>
			<th>Cash</th>
			<th>Govt</th>
			<th>Corp</th>
			<th>AR</th>
			<th>HE</th>
			<th>LCE</th>
			<th>SCE</th>
			<th>EME</th>
			<th>PE</th>
			<th>ILBs</th>
			<th>Comms</th>
			<th>CRE</th>
			<th>PERE</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->mvos as $weights): ?>
		<tr>
			<td><input type="text" id="form-input-readonly" readonly="" name="mvo[asset_class]" value="<?php echo $weights->asset_class ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_1 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_1]" value="<?php echo number_format(isset($weights->corr_1) ? $weights->corr_1:0,2) ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_2 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_2]" value="<?php echo number_format($weights->corr_2,2) ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_3 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_3]" value="<?php echo number_format($weights->corr_3,2) ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_4 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_4]" value="<?php echo number_format($weights->corr_4,2) ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_5 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_5]" value="<?php echo number_format($weights->corr_5,2) ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_6 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_6]" value="<?php echo $weights->corr_6 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_7 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_7]" value="<?php echo $weights->corr_7 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_8 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_8]" value="<?php echo $weights->corr_8 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_9 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_9]" value="<?php echo $weights->corr_9 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_10 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_10]" value="<?php echo $weights->corr_10 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_11 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_11]" value="<?php echo $weights->corr_11 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_12 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_12]" value="<?php echo $weights->corr_12 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_13 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_13]" value="<?php echo $weights->corr_13 ?>"></td>
			<td><input type="hidden" name="mvo[mean_return]" value="<?php echo $weights->mean_return ?>"></td>
			<td><input type="hidden" name="mvo[mean_stdev]" value="<?php echo $weights->mean_stdev ?>"></td>
			<td><input type="hidden" name="mvo[id]" value="<?php echo $weights->id ?>"></td>
			<td><input type="hidden" name="mvo[weight_1]" value="<?php echo $weights->weight_1 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_2]" value="<?php echo $weights->weight_2 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_3]" value="<?php echo $weights->weight_3 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_4]" value="<?php echo $weights->weight_4 ?>" /></td>
			<td><input type="hidden" name="mvo[weight_5]" value="<?php echo $weights->weight_5 ?>" /></td>
		</tr>
		<?php endforeach?>
	</tbody>
</table>
</form>

<p>&nbsp;</p>
<h4>Covariance Matrix:</h4>
<table class="table">
	<thead>
		<tr>
			<th>Asset Class</th>
			<th>Cash</th>
			<th>Govt</th>
			<th>Corp</th>
			<th>AR</th>
			<th>HE</th>
			<th>LCE</th>
			<th>SCE</th>
			<th>EME</th>
			<th>PE</th>
			<th>ILBs</th>
			<th>Comms</th>
			<th>CRE</th>
			<th>PERE</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->mvos as $weights): ?>
		<?php $cov1 = $weights->corr_1*($weights->mean_stdev/100)*$a ?>
		<?php $cov2 = $weights->corr_2*($weights->mean_stdev/100)*$b ?>
		<?php $cov3 = $weights->corr_3*($weights->mean_stdev/100)*$c ?>
		<?php $cov4 = $weights->corr_4*($weights->mean_stdev/100)*$d ?>
		<?php $cov5 = $weights->corr_5*($weights->mean_stdev/100)*$e ?>
		<?php $cov6 = $weights->corr_6*($weights->mean_stdev/100)*$f ?>
		<?php $cov7 = $weights->corr_7*($weights->mean_stdev/100)*$g ?>
		<?php $cov8 = $weights->corr_8*($weights->mean_stdev/100)*$h ?>
		<?php $cov9 = $weights->corr_9*($weights->mean_stdev/100)*$i ?>
		<?php $cov10 = $weights->corr_10*($weights->mean_stdev/100)*$j ?>
		<?php $cov11 = $weights->corr_11*($weights->mean_stdev/100)*$k ?>
		<?php $cov12 = $weights->corr_12*($weights->mean_stdev/100)*$l ?>
		<?php $cov13 = $weights->corr_13*($weights->mean_stdev/100)*$m ?>
		
		<tr>
			<td><?php echo $weights->asset_class ?></td>
			<td><?php echo number_format($cov1,5) ?></td>
			<td><?php echo number_format($cov2,5) ?></td>
			<td><?php echo number_format($cov3,5) ?></td>
			<td><?php echo number_format($cov4,5) ?></td>
			<td><?php echo number_format($cov5,5) ?></td>
			<td><?php echo number_format($cov6,5) ?></td>
			<td><?php echo number_format($cov7,5) ?></td>
			<td><?php echo number_format($cov8,5) ?></td>
			<td><?php echo number_format($cov9,5) ?></td>
			<td><?php echo number_format($cov10,5) ?></td>
			<td><?php echo number_format($cov11,5) ?></td>
			<td><?php echo number_format($cov12,5) ?></td>
			<td><?php echo number_format($cov13,5) ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script>
function addWeight(id){
	var data = {}
	var row = $(id).parent().parent().find("input").each(function(d){
			data[$(this).attr("name")] = $(this).val();
		});
	var row = $(id).parent().parent().find("select").each(function(d){
		data[$(this).attr("name")] = $(this).val();
	});
	$.post('/mvos/addweight/', data, function(da){
		
			$("#"+ data["mvo[id]"]).val(da);

		});
	
}
$( InitPage );

//Init the page.
function InitPage(){
var jInput = $( "input" );

//Bind the onchange event of the inputs to flag
//the inputs as being "dirty".
jInput.change(
function( objEvent ){
//Add dirtry flag to the input in
//question (whose value has changed).
$( this ).addClass( "orange" );
}
);
}

</script>