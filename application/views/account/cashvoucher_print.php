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
<div style="height: 20px"></div>
<div style="margin-left: 50px;"> 
    <h3><?php echo company_name(); ?></h3>
    <p class="line-height-two">Address:   <?=company_address();?></p>
    <p class="line-height-two">Website:   <?=company_website();?></p>
    <p class="line-height-two">Contact #: <?=company_phone();?></p>
</div>
    <div style="height: 5px"></div>
    <div class=" container-fluid main-content">
      <h1 class="line-height-two">Cash Voucher</h1>
<!--       <p class="line-height-one"><?=today()?></p> -->

     <h2 class="text-right line-height-one">#<?=$get_summary->cvno;?></h2>
       <p class="text-right line-height-two"><?=$get_summary->trandate?></p>
        <h5>Delivery Information</h5>
        <p class="line-height-one">Pay To: <?=strtoupper($get_summary->payto)?></p>
        <p class="line-height-one">Account: <?=strtoupper($get_summary->fundfrom)?></p>
        <p class="line-height-one">Encoded By: <?=strtoupper($encoder_details->user_fname." ".$encoder_details->user_lname)?></p>
        <p class="line-height-one">Approved By: <?=strtoupper($approver_details->user_fname." ".$approver_details->user_lname)?></p>
 
      <div class="col-md-6">
        <div class="col-md-12">
         <div class="well">
            <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
               <thead >
                  <tr >
                     <th>Details</th>
                     <th>Amount</th>
                  </tr>
               </thead>
               <tbody>
                <?php    
               $query1 = $this->model_accounts->get_cashvoucher_desc($get_summary->cvno);    
               foreach ($query1->result_array() as &$row) {
            echo
           '<tr>
              <td>' . $row["trandetails"] .  '</td>
              <td>'.number_format($row["tranamt"],2).'</td>
           </tr>';  }
            ?>
               </tbody>
            </table>
         </div>
      </div>

      <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="20%">
         <tr><td></td></tr>
         <tr>
            <td style="border-bottom: 1px solid !important"></td>
         </tr>
         <tr>
            <td class="text-center">Received by: </td>
         </tr>
      </table>
  </div>

   
