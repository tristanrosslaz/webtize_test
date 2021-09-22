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
<div style="margin-left: 50px;line-height: 8px;"> 
<h3>JC Worldwide Franchise Inc.</h3><br>
<p class="line-height-two">Address:   1196 Batangas Street, San Isidro, Makati City, Philippines</p><br>
<p class="line-height-two">Website:   jcworldwidefranchiseinc.com</p><br/>
<p class="line-height-two">Contact #: 63.2.8894474 to 76</p>
</div>
<div class="container-fluid main-content">
  <h1 class="line-height-two">Franchise Service Receipt</h1>
  <p class="line-height-one"><?=today()?></p>
  
     <h2 class="text-right line-height-one">#<?=$get_infosummary->fsrno;?></h2>
       <p class="text-right line-height-one"><?=$get_infosummary->trandate?></p>
       <p class="line-height-one text-right"><?php echo $get_infosummary->ispaid ?></p>
        <h5>Infromation</h5>
          <p class="line-height-one">Customer: <?php echo strtoupper($get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname)?></p>
          <p class="line-height-one">Branch: <?php echo strtoupper($get_edit_credit->branchname) ?></p>
          <p class="line-height-one">Contact #: <?php echo strtoupper($get_edit_credit->conno) ?></p>
          <p class="line-height-one">Address: <?php echo strtoupper($get_edit_credit->address) ?></p>

<div class="col-md-12">
         <div class="well">
    <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
        <thead>
           <tr>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th class="text-right">Price</th>
              <th class="text-right">Total</th>
           </tr>
        </thead>
        <tbody>
            <?php 
            
               $query1      = $this->model_sales->get_fsrid_usingfsrno($fsrno);
               foreach ($query1->result_array() as &$row) {
                $result      = $this->model_sales->get_fsr_details_view($get_infosummary->fsrno, $row["itemid"])->row();
                $item_name = $this->model_sales->get_ItemName($row["itemid"])->row();
                $price       = $result->price;
                $grand_total = $price * $row["qty"];
                $unitid    = $item_name->uomid;
                $item_unit = $this->model_sales->get_ItemUnit1($unitid);
            echo
           '<tr>
              <td>' . strtoupper($item_name->itemname) .  '</td>
              <td>'.number_format($row["qty"], 2).'</td>
              <td>'.$item_unit->description.'</td>
              <td class="text-right">'.number_format($price, 2).'</td>
              <td class="text-right">'.number_format($grand_total, 2).'</td>
           </tr>';  } ?>

        </tbody>
        <tfoot>
           <tr>
              <td class="text-right" colspan="4">
                 <h3>Total:  </h3>
              </td>
              <td class="text-right">
                 <h3><?php echo  number_format($get_infosummary->totalamt,2,".",",") ?></h3>
              </td>
           </tr>
        </tfoot>
     </table>
  </div>
</div>

