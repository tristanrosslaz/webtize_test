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
    <div class=" container-fluid main-content">
      <h1 class="line-height-two">Puchase Order Receive Form</h1>
      <div style="height: 10px"></div>
     <p class="line-height-one"><strong>PO No.</strong>: #<?=$pono;?></p>
     <p class="line-height-one"><strong>RCV No.</strong>: #<?=$rcvno?></p>
     <p class="line-height-one"><strong>PO Date</strong>: <?=$get_summary->trandate?></p>
     <p class="line-height-one"><strong>Ref. No</strong>: #<?=$get_summary->suprefno?></p>

<div class="col-md-12">
         <div class="well">
    <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
        <thead>
           <tr>
              <th>Rcv Date</th>
              <th>Item Name</th>
              <th class="text-right">Rcv Qty</th>
              <th class="text-right">Unit</th>

           </tr>
        </thead>
        <tbody>
            <?php     
                $query = $this->model_porhistoryreceiveview->poreceived_print_details($rcvno);
                foreach ($query->result_array() as $row) {
                    echo
                    '<tr>
                        <td>' . $row["trandate"] .  '</td>
                        <td>' . strtoupper($row["itemname"]) .  '</td>
                        <td class="text-right">'.number_format($row["qty"], 2).'</td>
                        <td class="text-right">'.$row["description"].'</td>
                    </tr>';  
                }
            ?>

        </tbody>
     </table>
  </div>
</div>