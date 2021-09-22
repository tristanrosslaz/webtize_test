<link href="<?=base_url('assets/reports/fontsapi.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/bootstrap.min.css');?>" media="all" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/reports/style.css');?>" media="all" rel="stylesheet" type="text/css">
<style>
.display > th {
  font-weight: bold;
  text-align: center;
  border-bottom: 0.5pt solid black;
  line-height: 12px;
}
.display > td{
  line-height: 12px;
}
.top-border {
  border-top: 0.5pt solid black;
}
.line-height-one{
  line-height: 1px;
}
.line-height-two{
  line-height: 2px;
}
</style>

<?php 
    // Variables
    $drpaydetails = $this->model_sales->tbl_collectiondetailed_print($get_infosummary->id)->row();
    $totaldrpayamount = ($drpaydetails->payamt*1);
    $totalalloc = 0;
?>

<div class="container-fluid main-content">
    <br>
	<h1 class="line-height-two text-center">COLLECTION #<?=$get_infosummary->id;?></h1>
    <br>

    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td colspan="4"><h2><?=concatenate_name($get_edit_membermain->fname, $get_edit_membermain->mname, $get_edit_membermain->lname)?></h2></td>
        </tr>
        <tr>
            <td width="100px">Address</td>
            <td width="190px"><?=format_address($get_edit_membermain->homeaddress);?></td>
            <td width="150px" class="text-right">Date Encoded</td>
            <td width="95px" class="text-right"><?=DATE('d M Y', strtotime($get_infosummary->trandate));?></td>
        </tr>
        <tr>
            <td width="100px">Contact Number</td>
            <td width="190px"><?=$get_edit_membermain->conno;?></td>
            <td width="150px" class="text-right">Date Printed</td>
            <td width="95px" class="text-right"><?=DATE('d M Y', strtotime(today()));?></td>
        </tr>
    </table>
</div>

<table class="table table-striped table-hover table-bordered"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%" style="padding-left: ">
    <thead >
        <tr>
            <th width="50px"></th>
            <th width="100px">Date</th>
            <th width="170px">Description</th>
            <th width="95px">Reference</th>
            <th width="120px">Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td width="50px" class="text-right"><b>Add: </b></td>
            <td colspan="4"></td>
        </tr>
        <?php
            echo'
            <tr>
                <td width="50px"></td>
                <td width="100px" class="text-center"> ' . DATE('d M Y', strtotime($drpaydetails->trandate)) . ' </td>
                <td width="170px"> COLLECTION (' . $drpaydetails->paymenttype . ')</td>
                <td width="95px"> N/A </td>
                <td width="120px" class="text-right"> ' . number_format($drpaydetails->payamt, 2) . ' </td>
            </tr>';
        ?>
        
        <tr>
            <td colspan="5" class="top-border text-right"><b><?=number_format($totaldrpayamount, 2);?></b></td>
        </tr>
        <tr>
            <td width="50px" class="text-right"><b>Less: </b></td>
            <td colspan="4"></td>
        </tr>

        <?php 
            $query1 = $this->model_sales->get_customeralloc_forsicollection_j($get_infosummary->id); 
            
            foreach ($query1->result_array() as &$row) {
                $totalalloc=($totalalloc*1)+($row["totalamt"]*1);
                
                if ($row["allocreftype"] == "SI")
                    $desc = "SALES INVOICE";
                else
                    $desc = "UNDEFINED";

                echo
                '<tr>
                    <td width="50px"></td>
                    <td width="100px" class="text-center"> ' . DATE('d M Y', strtotime($row["trandate"])) .' </td>
                    <td width="170px"> ' . $desc .' </td>
                    <td width="95px"> ' . $row["allocreftype"] . '#' . $row["allocrefid"] . ' </td>
                    <td width="120px" class="text-right"> '.number_format($row["totalamt"], 2).' </td>
                </tr>';
            }
        ?>

        <tr>
            <td colspan="5" class="top-border text-right"><b><?=number_format($totalalloc, 2);?></b></td>
        </tr>
    </tbody>
    <tfoot>
        <?php
            $remaining = ($totaldrpayamount*1)-($totalalloc*1);
        ?>
        <tr>
            <td class="text-right" colspan="4">
                <h2 class="m-0"><b>COLLECTED AMOUNT</b></h2>
            </td>
            <td class="text-right">
                <h2 class="m-0"><b><?php echo number_format($get_infosummary->payamt, 2, "." , ",") ?></b></h2>
            </td>
        </tr>
        <tr>
            <td class="text-right" colspan="4">
                REMAINING
            </td>
            <td class="text-right">
                <?php echo number_format($remaining, 2, ".", ",") ?>
            </td>
        </tr>
    </tfoot>
</table>