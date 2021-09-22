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
.line-height-four{
  line-height: 4px;
}
</style>
<div style="margin-left: 50px;line-height: 8px;"> 
    <h3><?php echo company_name(); ?></h3>
    <p class="line-height-two">Address:   <?php echo company_address(); ?></p>
    <p class="line-height-two">Website:   <?php echo company_website(); ?></p>
    <p class="line-height-two">Contact #: <?php echo company_phone(); ?></p>
</div>
<div class="container-fluid main-content">

    <h1 class="line-height-two">Purchase Order</h1>
    <p class="line-height-one"><?=today()?></p>
    <h2 class="text-right line-height-one">#<?=$pono;?></h2>
    <p class="text-right line-height-two"><?=$get_poprintsummary->trandate?></p>

    <h5>Collected From</h5>
    <p class="line-height-one">Supplier: <?php echo strtoupper($get_poprintsummary->suppliername)?></p>
    <p class="line-height-one">Terms: <?php echo strtoupper($get_poprintsummary->description) ?></p>
    <p class="line-height-one">Inventory WH: <?php echo strtoupper($get_polocation->description) ?></p>
    <p class="line-height-one">Contact #: <?php echo strtoupper($get_poprintsummary->contactno) ?></p>
    <p class="line-height-one">Address: <?php echo strtoupper($get_poprintsummary->address) ?></p>

    <div class="col-md-12">
        <div class="well">
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
                    $query = $this->model_pohistorypoview->get_poprintdetails($pono);
                    foreach ($query->result_array() as $row) {
                        $grand_total = $row["price"] * $row["qty"];

                        echo '<tr>
                        <td>' . strtoupper($row["itemname"]) .  '</td>
                        <td class="text-right">'.number_format($row["qty"], 2).'</td>
                        <td class="text-right">'.$row["description"].'</td>
                        <td class="text-right">'.number_format($row["price"], 2).'</td>
                        <td class="text-right">'.$row["discamt"].'%</td>
                        <td class="text-right">'.number_format($grand_total, 2).'</td>
                        </tr>';
                    }
                    ?>
                </tbody>
                <?php if ($get_poprintsummary->freight == 0){       
                }
                else { ?>
                <tr>
                    <td class="text-right" colspan="5">
                        <h2 class="line-height-four">Shipping:  </h3>
                        </td>
                        <td class="text-right">                                                                         
                            <h2 class="line-height-four"><?= number_format($get_poprintsummary->freight,2,".",",");?></h3>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php
                        if ($get_poprintsummary->discount_type ==  2) {

                            $discount_val = number_format($get_poprintsummary->gen_discount).'%';

                                // $total_amount_computed= number_format(($get_pohistoryposummary->totalamt + $get_pohistoryposummary->freight) - (($get_pohistoryposummary->gen_discount / 100) * $get_pohistoryposummary->totalamt),2,".",",");
                        }else{
                            $discount_val = number_format($get_poprintsummary->gen_discount,2,".",",");

                                // $total_amount_computed= number_format(($get_pohistoryposummary->totalamt + $get_pohistoryposummary->freight) - ($get_pohistoryposummary->gen_discount),2,".",",");      
                        }
                            $total_amount_computed= general_discounted_total($get_poprintsummary->totalamt, $get_poprintsummary->freight, $get_poprintsummary->gen_discount, $get_poprintsummary->discount_type);
                        ?>
                        <?php if($discount_val == 0){}else{?>
                        <tr>
                            <td class="text-right" colspan="5">
                                <h2 class="line-height-four">Discount:  </h2>
                            </td>
                            <td class="text-right">
                                <h2 class="line-height-four"><?= $discount_val; ?></h2>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td class="text-right" colspan="5">
                                <h2 class="line-height-four">Total:  </h2>
                            </td>
                            <td class="text-right">

                                <h2 class="line-height-four"><?= $total_amount_computed; ?></h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
