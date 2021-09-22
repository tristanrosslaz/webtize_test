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
<div style="margin-left: 50px;"> 
<h3><?php echo company_name(); ?></h3>
<p class="line-height-two">Address:   <?php echo company_address(); ?></p>
<p class="line-height-two">Website:   <?php echo company_website(); ?></p>
<p class="line-height-two">Contact #: <?php echo company_phone(); ?></p>
</div>
    <div style="height: 5px"></div>
    <div class="container-fluid main-content">
      <h1 class="line-height-two">Sales Return</h1>
      <p class="line-height-one"><?=today()?></p>

     <h2 class="text-right line-height-one">#<?=$get_infosummary->drretno;?></h2>
       <p class="text-right line-height-one"><?=$get_infosummary->trandate?></p>
        <h5>Customer Information</h5>
          <p class="line-height-one">Customer: <?php echo strtoupper($get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname)?></p>
          <p class="line-height-one">Branch: <?php echo strtoupper($get_edit_credit->branchname) ?></p>
          <p class="line-height-one">Contact #: <?php echo strtoupper($get_edit_credit->conno) ?></p>
          <p class="line-height-one">Address: <?php echo strtoupper($get_edit_credit->address) ?></p>
      <div class="col-md-6">
        <div class="col-md-12">
         <div class="well">
            <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
               <thead >
                  <tr >
                     <th>Date</th>
                     <th>Reference</th>
                     <th>Amount</th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                $totalalloc=0;
                $drretnodetailssummary = $this->model_sales->get_infosalesreturnSummaryID($get_infosummary->drretno);
                $totaldrretamount = ($drretnodetailssummary->row()->totalamt*1)+($drretnodetailssummary->row()->freight*1);

                      $query1      = $this->model_sales->get_salesreturn_drno($get_infosummary->drretno);
                     foreach ($query1->result_array() as &$row) {
                  $totalalloc=($totalalloc*1)+($row["totalamt"]*1);
                  echo
                  '<tr>
                     <td>'.$row["trandate"].'</td>
                     <td>'.$row["allocreftype"] . '#' . $row["allocrefid"] . '</td>
                     <td>'.number_format($row["totalamt"], 2).'</td>
                     <td></td>
                  </tr>';
                  }

                if(($totalalloc*1) < ($totaldrretamount*1)){
                  $today = date("m/d/Y");
                    $remaining = ($totaldrretamount*1)-($totalalloc*1);
                      echo '<tr><td>' . $today . '</td>
                       <td>Balance</td>
                       <td>' . number_format($remaining,2) . '</td>
                      <td></td>
                      </tr>';  
                }
                    ?>
               </tbody>
            </table>
         </div>
      </div>
  </div>

    <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
        <thead>
           <tr>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Price</th>
              <th>Discount</th>
              <th class="text-right">Total</th>
           </tr>
        </thead>
        <tbody>
            <?php 
            
               $query1 = $this->model_sales->get_salesorder_id_usingdrretno($get_infosummary->drretno);
               foreach ($query1->result_array() as &$row) {
                $result      = $this->model_sales->get_salesreturn_details($get_infosummary->drretno, $row["itemid"])->row();
                $item_name = $this->model_sales->get_ItemName($row["itemid"])->row();
                $price       = $result->drprice;
                // $grand_total = $price * $row["retqty"];
                $unitid    = $item_name->uomid;
                $item_unit = $this->model_sales->get_ItemUnit1($unitid);
            echo
           '<tr>
              <td>' . strtoupper($item_name->itemname) .  '</td>
              <td>'.number_format($row["retqty"], 2).'</td>
              <td>'.$item_unit->description.'</td>
              <td>'.number_format($price, 2).'</td>
              <td>'.$row["discamt"].'%</td>

              <td class="text-right">'.number_format($row["totalamt"], 2).'</td>
           </tr>';  } ?>

        </tbody>
        <tfoot>
          <?php
            if ($get_infosummary->freight == 0){       
                   }else{ ?>
          <tr>
              <td class="text-right" colspan="5">
                 <h3>Shipping:  </h3>
              </td>
              <td class="text-right">                                                                         
                 <h3><?php 
                   echo  number_format($get_infosummary->freight,2,".",",");
                 ?>
                 </h3>
              </td>
           </tr>
            <?php } ?>
           <tr>
              <td class="text-right" colspan="5">
                 <h3>Total:  </h3>
              </td>
              <td class="text-right" ><?php $totalamt = $get_infosummary->totalamt + $get_infosummary->freight; ?>
                 <h3><?php echo  number_format($totalamt,2,".",",") ?></h3>
              </td>
           </tr>
        </tfoot>
     </table>
