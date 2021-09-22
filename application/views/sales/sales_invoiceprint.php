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
.line-height-breaking {
  line-height: 10px;
}
.line-height-two{
  line-height: 2px;
}
</style>
<div style="margin-left: 50px;line-height: 8px;"> 
  <!-- <h3><?php echo company_name(); ?></h3> -->
  <img src="<?= base_url('assets/img/cpanda.png') ?>" width="100" height="auto" alt="">
  <p class="line-height-two">Address:   <?php echo company_address(); ?></p>
  <p class="line-height-two">Website:   <?php echo company_website(); ?></p>
  <p class="line-height-two">Contact #: <?php echo company_phone(); ?></p>
</div>

<div class="container-fluid main-content">
  <p class="line-height-two">Sales Invoice #<?=$getSummary->sino;?></p>
  <p class="line-height-breaking"><?=today()?></p>
  
  <p class="line-height-one">Sold To: <?php echo strtoupper(check_name($getSummary->idno))?></p>
  <p class="line-height-one">Branch: <?php echo strtoupper($getSummary->branchname) ?></p>
  <p class="line-height-one">Contact #: <?php echo strtoupper($getSummary->conno) ?></p>
  <p class="line-height-one">Address: <?php echo strtoupper($getSummary->address) ?></p>

</div>  

<div class="col-md-12">
  <div class="well">
    <table class="table table-striped table-hover table-bordered"  cellpadding="2" cellspacing="0" border="0" class="display" width="100%">
      <thead>
        <tr>
          <th width="255px">Description</th>
          <th class="text-right" width="50px">Quantity</th>
          <th width="65px">Unit</th>
          <th class="text-right" width="60px">Price</th>
          <th class="text-right" width="40px">Disc.</th>
          <th class="text-right" width="60px">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php     
        $query1 = $this->model_siview->get_si_Details($sino);
        foreach ($query1->result_array() as $row) {

          $item_name = $this->model_sales->get_ItemName($row["itemid"])->row();
          $unitid    = $item_name->uomid;
          $item_unit = $this->model_sales->get_ItemUnit1($unitid);

          if($row["discamt"] == "0" || $row["discamt"] == NULL) {
            echo
            '<tr>
            <td width="255px">' . strtoupper($item_name->itemname) .  '</td>
            <td width="50px" class="text-right">'.number_format($row["qty"], 2).'</td>
            <td width="65px">'.$item_unit->description.'</td>
            <td class="text-right" width="60px">'.number_format($row["price"], 2).'</td>
            <td class="text-right" width="40px">-</td>
            <td class="text-right" width="60px">'.number_format($row['total'], 2).'</td>
            </tr>'; 
          }else{
            if ($row['discount_type'] == 2) { //percentage
              echo
              '<tr>
              <td width="255px">' . strtoupper($item_name->itemname) .  '</td>
              <td width="50px" class="text-right">'.number_format($row["qty"], 2).'</td>
              <td width="65px">'.$item_unit->description.'</td>
              <td class="text-right" width="60px">'.number_format($row["price"], 2).'</td>
              <td class="text-right" width="40px">'.($row["discamt"] ? $row["discamt"] : '-').'%</td>
              <td class="text-right" width="60px">'.number_format($row['total'], 2).'</td>
              </tr>'; 
            }else{ //whole number
              echo
              '<tr>
              <td width="255px">' . strtoupper($item_name->itemname) .  '</td>
              <td width="50px" class="text-right">'.number_format($row["qty"], 2).'</td>
              <td width="65px">'.$item_unit->description.'</td>
              <td class="text-right"  width="60px">'.number_format($row["price"], 2).'</td>
              <td class="text-right" width="40px">'.($row['discamt'] ? number_format($row["discamt"], 2) : '-').'</td>
              <td class="text-right" width="60px">'.number_format($row['total'], 2).'</td>
              </tr>'; 
            }
                  }
            } ?>
          </tbody>
          <tfoot>
              <!-- <?php //check the discount type if percentage or whole number  
              if ($getSummary->discount_type ==  2) {
                $discount_val = $getSummary->gen_discount.'%';
                $total_amount_computed= number_format(($getSummary->totalamt + $getSummary->freight) - (($getSummary->gen_discount / 100) * $getSummary->totalamt),2,".",",");
              }else{
                $discount_val = number_format($getSummary->gen_discount,2,".",",");
                $total_amount_computed= number_format(($getSummary->totalamt + $getSummary->freight) - ($getSummary->gen_discount),2,".",",");
              }
              ?> -->

              <?php
              if ($getSummary->discount_type ==  2) {

                  $discount_val = number_format($getSummary->gen_discount).'%';

              }else{
                  $discount_val = number_format($getSummary->gen_discount,2,".",",");       
              }
                  $total_amount_computed= general_discounted_total($getSummary->totalamt, $getSummary->freight, $getSummary->gen_discount, $getSummary->discount_type);
              ?>

              <?php if (number_format($getSummary->gen_discount) > 0) { ?>
              <tr>
                <td class="text-right" colspan="5">
                  <h3 style="line-height: 4px;">Discount: </h3>
                </td>
                <td class="text-right">                                                                         
                  <h3 style="line-height: 4px;"><?=$discount_val;?></h3>
                </td>
              </tr>
              <?php } ?>

              <?php if (number_format($getSummary->freight) > 0) { ?>
              <tr>
                <td class="text-right" colspan="5">
                  <h3 style="line-height: 4px;">Shipping:  </h3>
                </td>
                <td class="text-right">                                                                         
                  <h3 style="line-height: 4px;"><?=number_format($getSummary->freight,2,".",",");?></h3>
                </td>
              </tr>
              <?php } ?>

              <tr>
                <td class="text-right" colspan="5">
                  <p style="line-height: 4px;">Total:  </p>
                </td>
                <td class="text-right">
                  <p style="line-height: 4px;"><?=$total_amount_computed;?></p>
                </td>
              </tr>
          </tfoot>
      </table>

    <div style="margin-top: 10px; width: 100%" class="text center">
      <!-- <p >I hereby certify that I received the items in good condition and complete in quantity.</p> -->
      <p class="text center">Received By: ______________________________  Received Date:_________.</p>
    </div>

      <?php if ($getSummary->notes != ""){ ?>
        <h4>Notes:</h4>
        <p><?=$getSummary->notes?></p>
      <?php } ?>       

      <?php if (!empty($getSummary->drybox) && !empty($getSummary->drybag) && !empty($getSummary->pershbox) && !empty($getSummary->pershbag)) { ?>
        <p>Packing:</p>
        <table class="table table-striped table-hover table-bordered" float="right"  cellpadding="0" cellspacing="0" border="0" class="display" width="50%">
          <thead>
            <tr>
              <th>Dry Bag</th>
              <th>Dry Box</th>
              <th>Perish Bag</th>
              <th>Perish Box</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <?php  if(empty($getSummary->drybox)) {
                  echo 'none';
                }else{
                  echo $getSummary->drybox;
                } ?>
              </td>
              <td>
                <?php  if(empty($getSummary->drybag)) {
                  echo 'none';
                }else{
                  echo $getSummary->drybag;
                } ?>
              </td>
              <td>
                <?php  if(empty($getSummary->pershbox)) {
                  echo 'none';
                }else{
                  echo $getSummary->pershbox;
                } ?>
              </td>
              <td>
                <?php  if(empty($getSummary->pershbag)) {
                  echo 'none';
                }else{
                  echo $getSummary->pershbag;
                }?>
              </td>
            </tr>
          </tbody>
        </table>
      <?php } ?>
  </div>
</div>



