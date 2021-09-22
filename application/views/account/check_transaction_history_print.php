<!DOCTYPE html>
<html>
<head>
    <title></title>

    <style type="text/css">
        table th{
            font-weight: bold;
        }
    </style>
</head>
<body>


<div id="div1">

    <table>
        <tbody>
            <tr style="text-align: center;">
                <td>
                    <label><?= $checkSummary['supname']; ?></label>
                </td>
                <td>
                    <label><?= $checkSummary['chkdate']; ?></label><br/>
                </td>
            </tr>
        </tbody>
    </table>

    
</div>



<div id="div2">

<label><b>Pay To: </b><?= $checkSummary['supname']; ?></label><br/>
<label><b>Check Date: </b><?= $checkSummary['chkdate']; ?></label><br/>
<label><b>Check Amount: </b> <?= number_format($checkSummary['amount'],2); ?></label><br/>

<br/>
<br/>


<table border="1">
    <thead>
        <tr>
            <th>Transaction Date</th>
            <th>Details</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($checkdetails as  $value) {
            ?>
                <tr>
                    <td><?= $value['chkdate'];?></td>
                    <td><?= $value['description'];?></td>
                    <td><?= number_format($value['amount'],2);?></td>
                </tr>
            <?php

            }
        ?>
    </tbody>
</table>
</div>

<div id="div3">
    <div style="text-align: right;">
        <?= $checkSummary['chkdate']; ?>
    </div>
    <br/>


    <table>
        <tbody>
            <tr>
                <td style="text-align: center;">
                    <label><?= $checkSummary['supname']; ?></label>
                </td >
                <td style="text-align: right;">
                    <label><label>*** <?= number_format($checkSummary['amount'],2); ?> ***</label><br/></label><br/>
                </td>
            </tr>
        </tbody>
    </table>

    <label>**<?= $number_in_words; ?>**</label>

</div>



</body>
</html>