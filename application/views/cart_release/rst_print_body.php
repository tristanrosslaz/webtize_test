<link href="<?=base_url('assets/reports/fontsapi.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/bootstrap.min.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/style.css');?>" media="all" rel="stylesheet" type="text/css">
<style>
  th {
    font-weight: bold;
    text-align: left;
    border-bottom: 0.5pt solid black;
    line-height: 12px;
  }
  td{
     line-height: 12px;
  }
  .line-height-one{
    line-height: 1px;
  }
  .line-height-two{
    line-height: 2px;
  }
</style>

<div class="container-fluid main-content">
	<h1 class="line-height-two">Release Details #<?=$release_details["rdno"]?></h1>
	<p class="line-height-one"><?=today()?></p>

	<h2 class="text-right line-height-two"><?=$release_details["rdno"]?></h2>
	<p class="text-right line-height-one"><?=$release_details["trandate"]?></p>

	<h2 class="line-height-two"><?=$release_details["name"]?></h2>
	<p class="line-height-one">Location: <?=$release_details["location"]?></p>
	<p class="line-height-one">Concept: <?=$release_details["concept"]?></p>
	<p class="line-height-one">Type: <?=$release_details["type"]?></p>
	<p class="line-height-one">Size: <?=$release_details["size"]?></p>
	<p class="line-height-one">Mode of Release: <?=$release_details["mor"]?></p>
	<br>

	<div class="col-md-12">
		<div class="well">
			<p class="line-height-one">Sketch: </p>
			<img src="https://foodcartfranchisingsite.files.wordpress.com/2016/11/siomai-king-food-cart-showcase.jpg?w=778">
		</div>
		<hr>
	</div>
	
	<p class="line-height-one">Cart Installer: (Manual)</p>