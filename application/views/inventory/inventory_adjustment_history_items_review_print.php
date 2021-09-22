<!-- <!DOCTYPE html> -->
<html>
<head>
    <title></title>

    <style type="text/css">
        table th{
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<br/><br/>
<label><b>PandaBooks</b></label><br/>
<!-- <label>1196 Batangas Street, San Isidro, Makati City, Philippines</label><br/>
<label>63.2.8894474 to 76</label><br/> -->

<br/><br/><br/>

<div style="text-align: right; width: 100%; padding-right: 0px;">
    <b><label>Adj No# <?= $adjusted_entries[0]['adjno']; ?></label><br/></b>
    <label><?= $adjusted_entries[0]['trandate']; ?></label>
</div>

<label><b>Location: </b><?= $adjusted_entries[0]['item_loc']; ?></label><br/>

<label><b>Type: </b>
        <?php 
            if($adjusted_entries[0]['adjtype']==="plus")
            {
                echo   "Positive Adjustment";
            }
            else{
                echo   "Negative Adjustment";
            }
        ?>
</label><br/>
<label><b>Classification: </b><?= $adjusted_entries[0]['classification']; ?></label><br/>
<br/>
<br/>



<div style="text-align: right;">
    
</div>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($adjusted_entries as  $value) {
            ?>
                <tr>
                    <td><?= $value['itemname'] ?></td>
                    <td><?= number_format($value['adjqty'],2); ?></td>
                    <td><?= $value['item_uom'] ?></td>
                </tr>
            <?php

            }
        ?>
    </tbody>
</table>

<br/>
<br/>
<br/>

<p>
    <?= $value['notes']; ?>
</p>

</body>
</html>