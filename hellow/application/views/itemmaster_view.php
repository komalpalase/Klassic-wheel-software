<!DOCTYPE html>
<html>
<head>
    <title>Item Master</title>
    <link rel="stylesheet" href="<?php echo base_url('Assets/css/bootstrap.min.css'); ?>">
</head>
<body>
<div class="container mt-5">
    <h2>Item Master List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company ID</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Item Type</th>
                <th>UOM</th>
                <th>User ID</th>
                <th>Active</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
            <tr>
                <td><?php echo $item->companyid; ?></td>
                <td><?php echo $item->itemcode; ?></td>
                <td><?php echo $item->itemname; ?></td>
                <td><?php echo $item->itemtype; ?></td>
                <td><?php echo $item->uom; ?></td>
                <td><?php echo $item->userid; ?></td>
                <td><?php echo $item->active ? 'Yes' : 'No'; ?></td>
                <td><?php echo $item->tdate; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
