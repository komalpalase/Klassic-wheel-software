<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Designation Master</title>

<!-- Single Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
body {
    background-color: #f4f6f9;
}

.card-custom {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.page-title {
    font-weight: 600;
}

/* Scrollable Table */
.table-scroll {
    max-height: 350px;
    overflow-y: auto;
}

/* Sticky Header */
.table-scroll thead th {
    position: sticky;
    top: 0;
    background: #343a40;
    color: white;
    z-index: 2;
}

</style>
</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="page-title">Designation Management</h3>
        <a href="Master" class="btn btn-secondary btn-sm">← Back</a>
    </div>

    <div class="row">

        <!-- Left Side - List -->
        <div class="col-md-7 mb-4">
            <div class="card card-custom p-3">

                <div class="d-flex justify-content-between mb-2">
                    <h5>Designation List</h5>
                </div>

                <?php
                $query = "SELECT * FROM Desgmaster ORDER BY DesignationId";
                $db_handle = new DBController();
                $result = $db_handle->runQuery($query);
                ?>

                <div class="table-responsive table-scroll">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Designation ID</th>
                                <th>Designation Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($result){
                            foreach ($result as $row){
                        ?>
                            <tr>
                                <td><?= $row['DesignationId']; ?></td>
                                <td><?= $row['Designation']; ?></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="col-md-5">
            <div class="card card-custom p-4">
                <h5 class="mb-3">Add New Designation</h5>

                <form action="Save_Desg" method="POST">

                <?php
                $DesignationId = 1;

                $host='localhost';
                $db='proddata';
                $user='root';
                $passwd='';
                $port=3307;

                $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);
                $query = "SELECT max(DesignationId) as DesignationId from Desgmaster";
                $statement = $gconn->prepare($query);
                $statement->execute();
                $results = $statement->fetch(PDO::FETCH_ASSOC);

                if ($results && $results['DesignationId'] != 0) {
                    $DesignationId = $results['DesignationId'] + 1;
                }
                ?>

                    <div class="form-group">
                        <label>Designation ID</label>
                        <input type="text" name="DesignationId" class="form-control" readonly value="<?= $DesignationId; ?>">
                    </div>

                    <div class="form-group">
                        <label>Designation Name</label>
                        <input type="text" name="Designation" class="form-control" required placeholder="Enter designation name">
                    </div>

                    <button type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block">
                        Save Designation
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
