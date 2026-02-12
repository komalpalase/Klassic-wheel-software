<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Department Master</title>

<!-- Single Bootstrap -->
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
    background-color: #343a40;
    color: white;
    z-index: 2;
}

</style>
</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="page-title">Department Management</h3>
        <a href="Master" class="btn btn-secondary btn-sm">← Back</a>
    </div>

    <div class="row">

        <!-- Department List -->
        <div class="col-md-7 mb-4">
            <div class="card card-custom p-3">
                <h5 class="mb-3">Department List</h5>

                <?php
                $query = "SELECT * FROM DeptMaster ORDER BY DepartmentId";
                $db_handle = new DBController();
                $result = $db_handle->runQuery($query);
                ?>

                <div class="table-responsive table-scroll">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Department ID</th>
                                <th>Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($result){
                            foreach ($result as $row){
                        ?>
                            <tr>
                                <td><?= $row['DepartmentId']; ?></td>
                                <td><?= $row['DepartmentName']; ?></td>
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

        <!-- Add Department -->
        <div class="col-md-5">
            <div class="card card-custom p-4">
                <h5 class="mb-3">Add New Department</h5>

                <form action="Save_Dept" method="POST">

                <?php
                $DepartmentId = 1;

                $host='localhost';
                $db='proddata';
                $user='root';
                $passwd='';
                $port=3307;

                $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);
                $query = "SELECT max(DepartmentId) as DepartmentId from DeptMaster";
                $statement = $gconn->prepare($query);
                $statement->execute();
                $results = $statement->fetch(PDO::FETCH_ASSOC);

                if ($results && $results['DepartmentId'] != 0) {
                    $DepartmentId = $results['DepartmentId'] + 1;
                }
                ?>

                    <div class="form-group">
                        <label>Department ID</label>
                        <input type="text" name="DepartmentId" class="form-control" readonly value="<?= $DepartmentId; ?>">
                    </div>

                    <div class="form-group">
                        <label>Department Name</label>
                        <input type="text" name="DepartmentName" class="form-control" required placeholder="Enter department name">
                    </div>

                    <button type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block">
                        Save Department
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
