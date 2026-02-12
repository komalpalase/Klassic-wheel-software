<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Site Master</title>

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
        <h3 class="page-title">Site Management</h3>
        <a href="Master" class="btn btn-secondary btn-sm">← Back</a>
    </div>

    <div class="row">

        <!-- Site List -->
        <div class="col-md-7 mb-4">
            <div class="card card-custom p-3">
                <h5 class="mb-3">Site List</h5>

                <?php
                $query = "SELECT * FROM SiteMaster ORDER BY SiteId";
                $db_handle = new DBController();
                $result = $db_handle->runQuery($query);
                ?>

                <div class="table-responsive table-scroll">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Site ID</th>
                                <th>Site Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($result){
                            foreach ($result as $row){
                        ?>
                            <tr>
                                <td><?= $row['SiteId']; ?></td>
                                <td><?= $row['SiteName']; ?></td>
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

        <!-- Add Site -->
        <div class="col-md-5">
            <div class="card card-custom p-4">
                <h5 class="mb-3">Add New Site</h5>

                <form action="Save_Site" method="POST">

                <?php
                $SiteId = 1;

                $host='localhost';
                $db='proddata';
                $user='root';
                $passwd='';
                $port=3307;

                $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);
                $query = "SELECT max(SiteId) as SiteId from SiteMaster";
                $statement = $gconn->prepare($query);
                $statement->execute();
                $results = $statement->fetch(PDO::FETCH_ASSOC);

                if ($results && $results['SiteId'] != 0) {
                    $SiteId = $results['SiteId'] + 1;
                }
                ?>

                    <div class="form-group">
                        <label>Site ID</label>
                        <input type="text" name="SiteId" class="form-control" readonly value="<?= $SiteId; ?>">
                    </div>

                    <div class="form-group">
                        <label>Site Name</label>
                        <input type="text" name="SiteName" class="form-control" required placeholder="Enter site name">
                    </div>

                    <button type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block">
                        Save Site
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
