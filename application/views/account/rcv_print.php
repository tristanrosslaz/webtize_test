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
    <p class="line-height-two">Address:   <?=company_address();?></p>
    <p class="line-height-two">Website:   <?=company_website();?></p>
    <p class="line-height-two">Contact #: <?=company_phone();?></p>
</div>


<div style="height: 20px"></div>
<div class="container-fluid main-content">
  <h1 class="line-height-two">RCV Print Record</h1>
  <p class="line-height-one"><?=today()?></p>

  <h3 class="text-right line-height-one"><?=$get_print->rcvno?></h3>
  <p class="text-right line-height-two"><?=$get_print->trandate?></p>
  <h5>Purchase From</h5>
  <h2 class="line-height-two"><?=$get_print->suppliername?></h2>
  <p class="line-height-one">PO No.: <?=$get_print->pono?></p>
  <p class="line-height-one">PO Date: <?=$get_print->podate?></p>
  <p class="line-height-one">Supplier Ref. No.:<?=$get_print->suprefno?></p>
  
  <div class="col-md-6">
    <div class="col-md-12">
      <div class="well">
        <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
          <thead >
            <tr >
              <th>ID</th>
              <th>Name</th>
              <th>Received Date</th>
              <th>Received Qty</th>
              <th>Unit</th>
            </tr>
          </thead>
          <tbody>
            <?php    
              $query1 = $this->model_accounts->get_rcv_table($get_print->rcvno);    
              foreach ($query1 as &$row) { 
                $suprefno = $this->model_accounts->poreceivedsuprefno($row["rcvno"])->row_array();

                echo
                '<tr>
                  <td>' . $row["itemid"] .  '</td>
                  <td>' . $row["itemname"] .'</td>
                  <td>' . $suprefno["trandate"] . '</td>
                  <td>' . number_format($row["qty"], 2) . '</td>
                  <td>' . $row["unit"] . '</td>
                </tr>';  
              } 
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
