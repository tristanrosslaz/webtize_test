<link href="<?=base_url('assets/reports/fontsapi.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/bootstrap.min.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/style.css');?>" media="all" rel="stylesheet" type="text/css">
<style>
th{
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

.line-height-five{
     line-height: 5px;
}
</style>

<div style="margin-left: 50px;"> 
    <h3><?php echo company_name(); ?></h3>
    <p class="line-height-two">Address:   <?=company_address();?></p>
    <p class="line-height-two">Website:   <?=company_website();?></p>
    <p class="line-height-two">Contact #: <?=company_phone();?></p>
</div>

<div class=" container-fluid main-content">
    <h1 class="line-height-two">Sales Order</h1>
    <p class="line-height-one"><?=today()?></p>

    <h2 class="text-right line-height-one">#<?=$get_infosummary->sono;?></h2>
    <p class="text-right line-height-two"><?=$get_infosummary->trandate?></p>
    <h5>Delivery Information</h5>
    <p class="line-height-one">Encoded by: <?=get_name_by_username($get_infosummary->username);?></p>
    <p class="line-height-one">Sold To: <?php echo strtoupper($get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname)?></p>
    <p class="line-height-one">Branch: <?php echo strtoupper($get_edit_credit->branchname) ?></p>
    <p class="line-height-one">Contact #: <?php echo strtoupper($get_edit_credit->conno) ?></p>
    <p class="line-height-one">Address: <?php echo strtoupper($get_edit_credit->address) ?></p>

<div class="col-md-12">
    <div class="well">
        <table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
            <thead>
                <tr>
                    <th width="100px">Item Name</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-center">Unit</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Discount</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php     
                $query1 = $this->model_sales->get_salesorder_id_usingsono_j($get_infosummary->sono);

                foreach ($query1->result_array() as &$row){

                    $result = $this->model_sales->get_salesorder_details($get_infosummary->sono, $row["itemid"])->row();
                    $price = $result->price;
                    $item_name = $this->model_sales->get_ItemName($row["itemid"])->row();
                    $unitid = $item_name->uomid;
                    $item_unit = $this->model_sales->get_ItemUnit1($unitid); 

                    // if ($row["discamt"] > 0 ) { //check if having a discount
                    //     if ($row['discount_type'] == 2) { // if percentage
                    //         $discount_amt = $row["discamt"].'%';
                    //     }else{ // if whole number
                    //         $discount_amt = number_format($row["discamt"], 2);
                    //     }
                        
                    // }else{
                    //     $discount_amt = "-";
                    // }

                    $discount_amt = selec_discount_type($price,$row["qty"],$row["discamt"],$row["discount_type"]);
                    
                    echo'<tr>
                            <td width="100px">'.strtoupper($item_name->itemname).'</td>
                            <td class="text-right">'.number_format($row["qty"], 2).'</td>
                            <td class="text-center">'.$item_unit->description.'</td>
                            <td class="text-right">'.number_format($price, 2).'</td>
                            <td class="text-right">'.$discount_amt.'</td>
                            <td class="text-right">'.number_format($row["total"], 2).'</td>
                        </tr>';
                } ?>
            </tbody>

            <?php
            if ($get_infosummary->discount_type ==  2) {

                $discount_val = number_format($get_infosummary->gen_discount).'%';

            }else{
                $discount_val = number_format($get_infosummary->gen_discount,2,".",",");   
            }
                $total_amount_computed= general_discounted_total($get_infosummary->totalamt, $get_infosummary->freight, $get_infosummary->gen_discount, $get_infosummary->discount_type);
            ?>

            <tfoot>
                <?php if ($get_infosummary->gen_discount > 0){ ?>
                    <tr>
                        <td class="text-right" colspan="5">
                            <h3 class="line-height-five">Discount:</h3>
                        </td>
                        <td class="text-right">
                            <h3 class="line-height-five"><?=$discount_val;?></h3>
                        </td>
                    </tr>
                <?php } ?>

                <?php if ($get_infosummary->freight > 0){ ?>
                    <tr>
                        <td class="text-right" colspan="5">
                            <h3 class="line-height-five">Shipping:</h3>
                        </td>
                        <td class="text-right">                                                                         
                            <h3 class="line-height-five"><?=number_format($get_infosummary->freight,2,".",",");?></h3>
                        </td>
                    </tr>
                <?php } ?>
                
                <tr>
                    <td class="text-right" colspan="5">
                        <h3 class="line-height-five">Total:</h3>
                    </td>
                    <td class="text-right">
                        <h3 class="line-height-five"><?=$total_amount_computed;?></h3>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
