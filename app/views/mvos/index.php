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
<input id="Button1" type="button" value="Reload" class="btn btn-danger" />
<p>&nbsp;</p>

<?php foreach ($this->mvos as $weights): ?>
<?php endforeach ?>

<h4>Please enter different porfolio weights here:</h4>
<p>&nbsp;</p>
<form method="post" action="/mvo/addweight/<?php echo $weights->id ?>" >
<table class="mvo">
	<thead>
		<tr>
			<th>Asset Class</th>
			<th>Portfolio 1</th>
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
		
	</tbody>
</table>
</form>

<hr class="simple">

<table>
	<tbody>
		<tr>
			<th>Rebalanced Geometric Mean</th>
		</tr>
		<tr>
			<th>Portfolio Std. Deviation</th>
		</tr>
		<tr>
			<th>Sharpe (3%)</th>
		</tr>
		<tr>
			<th>Geometric Weighted Mean</th>
		</tr>
	
	</tbody>

</table>

<hr class="simple">

<h4>Please enter your return and standard deviation assumptions here:</h4>

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