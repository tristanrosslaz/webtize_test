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
    <div style="height: 5px"></div>
    <div class="container-fluid main-content">
      <h1 class="line-height-two">Purchase Order Return</h1>
      <p class="line-height-one"><?=today()?></p>

      <h2 class="text-right line-height-one">#<?=$poretno;?></h2>
      <p class="text-right line-height-one"><?=$get_summary->trandate?></p>
      <h5>Customer Information</h5>

      <p class="line-height-one">Supplier: <?php echo strtoupper($get_summary->suppliername)?></p>
      <p class="line-height-one">Contact Person: <?php echo strtoupper($get_summary->contactperson) ?></p>
      <p class="line-height-one">Contact #: <?php echo strtoupper($get_summary->contactno) ?></p>
      <p class="line-height-one">Mode of Payment: <?php echo strtoupper($get_summary->description) ?></p>
      <p class="line-height-one">Address: <?php echo strtoupper($get_summary->address) ?></p>
      <div class="col-md-6">
        <div class="col-md-12">
          <div class="well">
            <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
               <thead >
                  <tr >
                    <th>Date</th>
                    <th>Reference</th>
                    <th class="text-right">Amount</th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                  $totalalloc = 0;
                  $totaldrretamount = ( $get_summary->totalamt * 1 ) + ( $get_summary->freight * 1 );

                  $query1 = $this->model_prhistoryview->get_purchasereturn_retno($pono);
                  foreach ($query1->result_array() as $row) {
                    $totalalloc = ( $totalalloc * 1 ) + ( $row["totalamt"] * 1 );
                    echo
                    '<tr>
                      <td>'.$row["trandate"].'</td>
                      <td>'.$row["allocreftype"] . '#' . $row["allocrefid"] . '</td>
                      <td class="text-right">'.number_format($row["totalamt"], 2).'</td>
                    </tr>';
                  }

                  if(($totalalloc*1) < ($totaldrretamount*1)){
                    $today = date("m/d/Y");
                    $remaining = ( $totaldrretamount * 1 ) - ( $totalalloc * 1 );
                    echo 
                    '<tr>
                      <td>' . $today . '</td>
                      <td>Balance</td>
                      <td class="text-right">' . number_format($remaining, 2) . '</td>
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
              <th class="text-right">Quantity</th>
              <th class="text-right">Unit</th>
              <th class="text-right">Price</th>
              <th class="text-right">Discount</th>
              <th class="text-right">Total</th>
           </tr>
        </thead>
        <tbody>
            <?php
              $query1 = $this->model_prhistoryview->get_poreturn_poretno($poretno);
              foreach ($query1->result_array() as $row) {
                if($row["discamt"] == 0 || $row["discamt"] == NULL) {
                  $discount = "";
                }
                else {
                  if ($row['discount_type'] == 2) { //percentage
                    $discount = $row["discamt"] . '%';
                  }
                  else { //whole number
                    $discount = number_format($row["discamt"], 2);
                  }
                }
                echo
                '<tr>
                  <td>' . strtoupper($row["itemname"]) . '</td>
                  <td class="text-right">' . number_format($row["retqty"], 2) . '</td>
                  <td class="text-right">' . $row["description"] . '</td>
                  <td class="text-right">' . number_format($row["retprice"], 2) . '</td>
                  <td class="text-right">' . number_format($discount, 2) . '</td>
                  <td class="text-right">' . discounted_total($row["retprice"], $row["retqty"], $row["discamt"], $row["discount_type"]) . '</td>
                </tr>';
              }
            ?>
        </tbody>
        <tfoot>
          <?php
            if ($get_summary->gen_discount != 0){
              if ($get_summary->discount_type ==  2) {
                $discount_val = number_format($get_summary->gen_discount).'%';
              }
              else {
                $discount_val = number_format($get_summary->gen_discount,2,".",",");
              }
              ?>
              <tr>
                <td class="text-right" colspan="4">
                  <h3>Shipping:  </h3>
                </td>
                <td class="text-right">                                                                         
                  <h3>
                  <?php 
                    echo  $discount_val;
                  ?>
                  </h3>
                </td>
              </tr>
          <?php } ?>
          <?php
            if ($get_summary->freight != 0){ ?>
              <tr>
                <td class="text-right" colspan="4">
                  <h3>Shipping:  </h3>
                </td>
                <td class="text-right">                                                                         
                  <h3>
                  <?php 
                    echo  number_format($get_summary->freight,2,".",",");
                  ?>
                  </h3>
                </td>
              </tr>
          <?php } ?>
              <tr>
                <td class="text-right" colspan="4">
                  <h3>Total:  </h3>
                </td>
                <td class="text-right" >
                  <h3><?php echo general_discounted_total($get_summary->totalamt, $get_summary->freight, $get_summary->gen_discount, $get_summary->discount_type); ?></h3>
                </td>
              </tr>
        </tfoot>
      </table>