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
      <h1 class="line-height-two">Direct Sales</h1>
      <p class="line-height-one"><?=today()?></p>

     <h2 class="text-right line-height-one">#<?=$get_summary->drno;?></h2>
       <p class="text-right line-height-two"><?=$get_summary->trandate?></p>
        <h5>Delivery Information</h5>
        <p class="line-height-one">Customer: <?=strtoupper($get_summary->name)?></p>
        <p class="line-height-one">Branch: <?=strtoupper($get_summary->branchname)?></p>
        <p class="line-height-one">Mode of Payment: <?=strtoupper($get_summary->termcredit)?></p>
        <p class="line-height-one">Contact No: <?=strtoupper($get_summary->conno)?></p>
        <p class="line-height-one">Outlet Address: <?=strtoupper($get_summary->address)?></p>
        <p class="line-height-one">Encoded By: <?=strtoupper($get_summary->username)?></p>


   <!--   <h2 class="text-right line-height-one"><?=$get_infosummary->id;?></h2>
       <p class="text-right line-height-two"><?=$get_infosummary->trandate?></p>
        <h5>Collected From</h5>
          <p ><?php echo strtoupper($get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname)?></p>
          <p class="line-height-one"><?php echo strtoupper($get_edit_credit->branchname) ?></p> -->
      <div class="col-md-6">
        <div class="col-md-12">
         <div class="well">
            <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
               <thead >
                  <tr >
                     <th>ID</th>
                     <th>Name</th>
                     <th>Qty</th>
                     <th>Unit</th>
                     <th>Unit Price</th>
                     <th>Total</th>
                  </tr>
               </thead>
               <tbody>
                <?php    
               $query1      = $this->model_accounts->bcth_view_print($get_summary->drno);    
               foreach ($query1->result_array() as &$row) {
            echo
           '<tr>
              <td>' . $row["id"] .  '</td>
              <td>'.$row["itemname"].'</td>
              <td>'.number_format($row["qty"],2).'</td>
              <td>'.$row["unit"].'</td>
              <td>'.number_format($row["price"],2).'</td>
              <td>'.number_format($row["total"],2).'</td>
           </tr>';  }
            ?>
               </tbody>
            </table>
         </div>
      </div>
  </div>

   
