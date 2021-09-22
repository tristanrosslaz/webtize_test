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

<div class="container-fluid main-content">
  <h1 class="line-height-two">Package Release Form #<?=$prno?></h1>
  <p class="line-height-one"><?=today()?></p>

  <h2 class="text-right line-height-two"><?=$prno?></h2>
  <p class="text-right line-height-one">Release Date: <?=$packagerelease_details->trandate?></p>

  <h2 class="line-height-two"><?=$packagerelease_details->name?></h2>
  <p class="line-height-one">Location Address: <?=$packagerelease_details->location?></p>
  <p class="line-height-one">Concept: <?=$packagerelease_details->concept?></p>
  <p class="line-height-one">Contact No.: <?=$packagerelease_details->conno?></p>
  <p class="line-height-one">Mode of Release: <?=$packagerelease_details->mor?></p>
  <p class="line-height-one">Cart Installer: </p>
  
  <div class="col-md-12">
    <div class="well">
      <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
        <thead>
          <tr >
            <th width="50px">Item ID</th>
            <th width="300px">Description</th>
            <th width="60px">Qty</th>
            <th width="60px">Unit</th>
            <th width="60px">Remarks</th>
          </tr>
        </thead>
        <tbody>
          <?php  
            $query1 = $this->model_cart->get_prt_item_details($prno);    
            foreach ($query1 as $row) {
              echo
              '<tr>
                <td width="50px">' . $row["itemid"] . '</td>
                <td width="300px">' . $row["itemname"] . '</td>
                <td width="60px">' . number_format($row["ri_qty"], 2) .'</td>
                <td width="60px">' . $row["unit"] . '</td>
                <td width="60px">' . $row["ri_remarks"] . '</td>
              </tr>';  
            }
          ?>
        </tbody>
      </table>
    </div>
    <p class="line-height-two">Notes: <?=$packagerelease_details->notes?></p>
    <hr>
  </div>

  <p class="text-center line-height-one">I hereby certify that I have received all items listed above in complete quantity and good condition.</p>

  <p style="line-height: 20px;"></p>
  <table>
    <tr>
      <td width="60px">Checked By:</td>
      <td width="290px"> _____________________</td>
      <td width="60px">Received By:</td>
      <td> _____________________</td>
    </tr>
    <tr>
      <td width="60px"></td>
      <td width="290px">Signature over printed name</td>
      <td width="60px"></td>
      <td>Signature over printed name</td>
    </tr>
  </table>