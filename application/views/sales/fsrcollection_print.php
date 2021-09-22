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
  <h1 class="line-height-two">Franchise Service Collection</h1>
  <p class="line-height-one"><?=today()?></p>
     <h2 class="text-right line-height-one">#<?=$get_infosummary->id;?></h2>
       <p class="text-right line-height-one"><?=$get_infosummary->trandate?></p>
        <h5>Collected From</h5>
          <p class="line-height-one">Customer: <?php echo strtoupper($get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname)?></p>
          <p class="line-height-one">Branch: <?php echo strtoupper($get_edit_credit->branchname) ?></p>
          <p class="line-height-one">Contact #: <?php echo strtoupper($get_edit_credit->conno) ?></p>
          <p class="line-height-one">Address: <?php echo strtoupper($get_edit_credit->address) ?></p>

<div class="col-md-12">
         <div class="well">

         <div class="well">
            <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
               <thead >
                  <tr >
                     <th>Date</th>
                     <th>Reference</th>
                     <th>Amount</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                $totalalloc=0;
                $drpaydetails = $this->model_sales->fsr_collectionDetailsSummary($get_infosummary->id)->row();
                $totaldrpayamount = ($drpaydetails->payamt*1);
                      $query1 = $this->model_sales->get_fsr_forcollection($get_infosummary->id); 
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
                if(($totalalloc*1) < ($totaldrpayamount*1))
                {
                  $today = date("m/d/Y");
                    $remaining = ($totaldrpayamount*1)-($totalalloc*1);
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
    <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
        <thead>
           <tr>
              <th>ID</th>
              <th>Payment Type</th>
              <th>Reference</th>
              <th class="text-right">Amount</th>
           </tr>
        </thead>
        <tbody>
            <?php 
            
               $query1      = $this->model_sales->get_fsrcollection_id($get_infosummary->id);
               foreach ($query1->result_array() as &$row) {
                $payment      = $this->model_sales->get_paymenttype($row["paymenttype"])->row();
            echo
           '<tr>
              <td>'.$row["id"].'</td>
              <td>'.$row["refno"].'</td>
              <td>'.$payment->description.'</td>
              
              <td class="text-right">'.number_format($row["payamt"], 2).'</td>
           </tr>';  } ?>

        </tbody>
        <tfoot>
           <tr>
              <td class="text-right" colspan="3">
                 <h3>Total:  </h3>
              </td>
              <td class="text-right">
                 <h3><?php echo  number_format($row["payamt"],2,".",",") ?></h3>
              </td>
           </tr>
        </tfoot>
     </table>
  </div>
</div>

