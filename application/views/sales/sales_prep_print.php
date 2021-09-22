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
   line-height: 18px;
}
.line-height-one{
  line-height: 4px;
}
.line-height-two{
  line-height: 2px;
}
</style>
<div style="margin-left: 50px;line-height: 8px;"> 
<p>Address:   1196 Batangas Street, San Isidro, Makati City, Philippines</p>
<p class="line-height-two">Website:   jcworldwidefranchiseinc.com</p>
<p class="line-height-two">Contact #: 63.2.8894474 to 76</p>
</div>
<div class="container-fluid main-content">
  <h1 class="line-height-two">Sales Order Preparation Summary</h1>
  <h3 class="line-height-one">Date: <?=$get_infosummary->trandate?></h3>
  <h3 class="line-height-one">Prep No. #<?=$prepno;?></h3>
  <h3 class="line-height-one">Destination: <?=$get_location->description?></h3>
  <h3 class="line-height-one">Source WHS: _____________________</h3>
       <!-- <p class="text-right line-height-two"><?=$get_infosummary->trandate?></p> -->
       
      <div class="col-md-6">
        <div class="col-md-12">
         <div class="well">
            <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
               <thead >
                  <tr >
                     <th>Item Name</th>
                     <th>Unit</th>
                     <th>Qty</th>
                     <th>Released Qty</th>
                     <th>Remarks</th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                      $query1 = $this->model_sales->get_so_Details($prepno);
                     foreach ($query1->result_array() as &$row) {
                    $totalqty = $this->model_sales->get_qty_in_so($prepno, $row["itemid"]);
                    //$nestedData[] = number_format($totalqty->row()->totalqty, 2);
                      $item_name = $this->model_sales->get_ItemName($row["itemid"])->row();
                      $unitid    = $item_name->uomid;
                      $item_unit = $this->model_sales->get_ItemUnit1($unitid); 
                  echo
                  '<tr>
                     <td>'.$item_name->itemname.'</td>
                     <td>'.$item_unit->description. '</td>
                     <td>'.number_format($totalqty->row()->totalqty, 2).'</td>
                     <td>____________</td>
                     <td>_______________</td>
                  </tr>';
                  }
                    ?>
               </tbody>
            </table>
         </div>
      </div>
  </div>
