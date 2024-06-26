<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){



  $meat_id = $_POST["meat_id"];
  $transaction_type = $_POST["transaction_type"];
  $quantity = $_POST["quantity"];
  $transaction_date = $_POST["transaction_date"];




  // SQL query to insert data into the database
  $sql = "INSERT INTO inventory_transactions(product_id,transaction_type,quantity,transaction_date) VALUES ('$meat_id', '$transaction_type', '$quantity', '$transaction_date')";

  if ( $connection->query($sql) === TRUE) {
     echo "<script>alert('Registered Successfully')</script>";

  } else {
      echo "Error: " . $sql . "<br>" .  $connection->error;
  }
};



?>


<?php
    include("include/header.php");
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'ims_sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                                include("include/topbar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Inventory</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
                            </div>
                            <form method="post" class="user">

                            <div class="form-group">
                                    <label>Meat Id</label>
                                    <select class="form-control" id="meat_id" name="meat_id" required>
                                        <?php
                                       include("connection.php");

                                              $mysqli_query_supplier =  mysqli_query($connection,"SELECT * FROM products");
                                                          echo "<option>Select Meat</option></option>";
                                                    while ($row = mysqli_fetch_assoc($mysqli_query_supplier)) {

                                                      echo "<option value='" . $row['id'] . "'>Meat Details: " . $row['id'] . ' ' . $row['name']. ' ' .$row['category']. ' - Price: ' .$row['price']. "</option>";
                                                              }
                                       ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Transaction Type</label>

                                            <select class="form-control" name="transaction_type" >
                                                    <option value="In" selected>In</option>
                                                    <option value="Out">Out</option>

                                            </select>
                                        </div>

                                    <div class="form-group">
                                        <label>Quantity (kg.)</label>
                                        <input type="text" name="quantity" class="form-control form-control-user" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Transaction Date</label>
                                        <input type="date" name="transaction_date" class="form-control form-control-user" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Inventory</button>
                                </form>


                        </div>
                    </div>
                </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
    include("include/footer.php");
?>