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
<div style="margin-left: 50px;line-height: 6px;"> 
<p>Address:   1196 Batangas Street, San Isidro, Makati City, Philippines</p><br>
<p>Website:   jcworldwidefranchiseinc.com</p><br/>
<p>Contact #: 63.2.8894474 to 76</p>
</div>
  <div class="container-fluid main-content">
    <h1 class="line-height-two">Itinerary Report</h1>
    <p class="line-height-one"><?=today()?></p>
<div id="qrcode"></div>
     <h2 class="text-right" style="line-height: 1px;">#<?=$get_infosummary->itno;?></h2>
       <p class="text-right" style="line-height: 2px; "><?=$get_infosummary->trandate?></p>
<!-- <div id="qrcode" style="float: right"></div> -->

<div class="col-md-12">
         <div class="well">
    <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
        <thead>
           <tr>
              <th>DR No.</th>
              <th>Date</th>
              <th width="200px">Name</th>
              <th>Area</th>
              <th width="35px">Perish <br>(Box)</th>
              <th width="35px">Perish <br>(Bag)</th>
              <th width="35px">Dry <br>(Box)</th>
              <th width="35px">Dry <br>(Bag)</th>                               
           </tr>
        </thead>

         <tbody>
            <?php     
               $query1      = $this->model_sales->get_itinerary_itno($itno);
               foreach ($query1->result_array() as &$row) {
                
                $idno     = $row["idno"];
                $customer_name = $this->model_sales->get_sum_customername($idno);
        
                //area
                $areaid = $this->model_sales->ITsalesOrderCustomerAreaID($idno);
                $area_id = $areaid->areaid;
                $areaDescription = $this->model_sales->get_areaDescription($area_id);
               
                $customer_name = $this->model_sales->customerNameWithBranch($idno);

            echo
           '<tr>
              <td>' . $row["drno"] .  '</td>
              <td>' . $row["trandate"] .  '</td>
              <td width="200px">' . strtoupper($customer_name->lname) . ', ' . strtoupper($customer_name->fname) . ' ' . strtoupper($customer_name->mname) . '(' . strtoupper($customer_name->branchname) . ')' .  '</td>
              <td>' . $areaDescription->description .  '</td>

              <td width="35px">' . $row["pershbox"] .  '</td>
              <td width="35px">' . $row["pershbag"] .  '</td>
              <td width="35px">' . $row["drybox"] .  '</td>
              <td width="35px">' . $row["drybag"] .  '</td>

           </tr>';  } ?>

        </tbody>

     </table>
  </div>
</div>

