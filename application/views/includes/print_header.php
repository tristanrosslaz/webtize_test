<link href="<?=base_url('assets/reports/fontsapi.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/bootstrap.min.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/style.css');?>" media="all" rel="stylesheet" type="text/css">
<style>
	.line-height-one{
		line-height: 1px;
	}
	.line-height-two{
		line-height: 2px;
	}
</style>
<div style="margin-left: 50px;line-height: 8px;"> 
	<h3><?php echo company_name(); ?></h3>
	<?=(company_address() ? '<p class="line-height-two">Address: ' . company_address() . '</p>' : '');?>
	<?=(company_website() ? '<p class="line-height-two">Website: ' . company_website() . '</p>' : '');?>
	<?=(company_phone() ? '<p class="line-height-two">Contact #: ' . company_phone() . '</p>' : '');?>
</div>