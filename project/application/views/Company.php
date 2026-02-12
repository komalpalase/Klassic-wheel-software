<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Company Master</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f6f9;
}

.container {
    display: flex;
    gap: 20px;
    padding: 30px;
}

.card {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.left {
    width: 60%;
}

.right {
    width: 40%;
}

h3 {
    margin-top: 0;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 8px;
}

/* Scrollable Table */
.table-container {
    max-height: 350px;
    overflow-y: auto;
    margin-top: 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

/* Sticky Header */
thead th {
    position: sticky;
    top: 0;
    background: #007bff;
    color: white;
    padding: 10px;
    text-align: left;
    z-index: 2;
}

tbody td {
    padding: 10px;
    border-bottom: 1px solid #e0e0e0;
}

/* Form Styling */
input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

button {
    padding: 8px 15px;
    background: #007bff;
    border: none;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

.back-btn {
    display: inline-block;
    margin-bottom: 15px;
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.back-btn:hover {
    text-decoration: underline;
}
</style>
</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="container">

    <!-- Left Side - Company List -->
    <div class="card left">
        <h3>Company List</h3>

        <?php
        $query = "SELECT * FROM CompanyMaster ORDER BY CompanyId";
        $db_handle = new DBController();
        $result = $db_handle->runQuery($query);
        ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Company ID</th>
                        <th>Company Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($result){
                        foreach ($result as $row){
                    ?>
                    <tr>
                        <td><?= $row['CompanyId']; ?></td>
                        <td><?= $row['CompanyName']; ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Side - Add Company -->
    <div class="card right">
        <a href="Master" class="back-btn">← Back</a>
        <h3>Add New Company</h3>

        <form action="Save_Company" method="POST">

            <?php
            $Companyid = 101;

            $host='localhost';
            $db='proddata';
            $user='root';
            $passwd='';
            $port=3307;

            $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);

            $query = "SELECT max(Companyid) as Companyid from CompanyMaster";
            $statement = $gconn->prepare($query);
            $statement->execute();
            $results = $statement->fetch(PDO::FETCH_ASSOC);

            if ($results && $results['Companyid'] != 0) {
                $Companyid = $results['Companyid'] + 1;
            }
            ?>

            <label>Company ID</label>
            <input type="text" name="CompanyId" readonly value="<?= $Companyid; ?>">

            <label>Company Name</label>
            <input type="text" name="CompanyName" required placeholder="Enter company name">

            <button type="submit" name="Submit" value="Submit">Save</button>

        </form>
    </div>

</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
