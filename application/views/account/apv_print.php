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
  <h1 class="line-height-two">Account Payable Voucher #<?=$get_summary->apvno?></h1>
  <p class="line-height-one"><?=today()?></p>

  <h3 class="text-right line-height-one"><?=$get_summary->apvno?></h3>
  <p class="text-right line-height-two"><?=$get_summary->trandate?></p>
  <h5>Payable To </h5>
  <h2 class="line-height-two"><?=$get_summary->supname?></h2>
  <p class="line-height-one">Terms of Payment: <?=$get_summary->terms?></p>
  <p class="line-height-one">APV Amount: <?=number_format($get_summary->amount, 2)?></p>
  <p class="line-height-one">APV Balance: <?=number_format($balance,2)?></p>
  <p class="line-height-one">APV Status: <?=$get_summary->apvstatus?></p>
  
  <div class="col-md-6">
    <div class="col-md-12">
      <div class="well">
        <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
          <thead >
            <tr >
              <th>Debit/Credit</th>
              <th>GL Account</th>
              <th>RCV No. | PO No.</th>
              <th>Supplier Ref. No.</th>
              <th class="text-right">Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $apvSummary = 0;
              $good = 0;   
              $query1 = $this->model_accounts->get_apv_table($get_summary->apvno);    
              foreach ($query1 as $row) {
                $suprefno = $this->model_accounts->poreceivedsuprefno($row["rcvno"])->row_array(); 
                $apvSummary += $row["amount"];
                $good = 1;

                echo
                '<tr>
                  <td>Debit</td>
                  <td>Inventory - Assets</td>
                  <td>RCV#' . $row["rcvno"] . ' | PO#' . $row["pono"] .'</td>
                  <td>' . $suprefno["suprefno"] . '</td>
                  <td class="text-right">' . number_format($row["amount"], 2) . '</td>
                </tr>';  
              }

              if ($good == 1) {
                echo
                '<tr>
                  <td>Credit</td>
                  <td>Accounts Payable - Liabilities</td>
                  <td>-</td>
                  <td>-</td>
                  <td class="text-right">' . number_format(($apvSummary * -1), 2) . '</td>
                </tr>';  
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
