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
			<th>Asset Class</th>
			<th>Mean Return</th>
			<th>Mean Standard Deviation</th>
			<th>Variance</th>
			<th>R* (approx. arithmetic return)</th>
		
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
			<td><input placeholder="Corr.." <?php if ($weights->corr_1 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_1]" value="<?php echo $weights->corr_1 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_2 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_2]" value="<?php echo $weights->corr_2 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_3 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_3]" value="<?php echo $weights->corr_3 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_4 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_4]" value="<?php echo $weights->corr_4 ?>"></td>
			<td><input placeholder="Corr.." <?php if ($weights->corr_5 == "1"): ?>class="green"<?php endif;?> class="black" type="text" onchange="addWeight(this)" name="mvo[corr_5]" value="<?php echo $weights->corr_5 ?>"></td>
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