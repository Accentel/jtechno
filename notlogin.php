<!DOCTYPE html>
<html lang="en">
    <?php include 'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
    <script>
        function ConfirmDialog() {
            var x=confirm("Are you sure to delete record?")
            if (x) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <body class="no-skin">
        <?php include 'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <!-- Sidebar -->
            <?php include 'template/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <div class="main-content-inner">
                    <!-- Breadcrumbs -->
                    <?php include 'template/breadcrumbs.php'; ?>

                    <!-- Page Content -->
                    <div class="page-content">
                        <!-- Date Range Form -->
                        <div class="row">
                            <div class="col-xs-12">
                                <form method="post" action="" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">From Date:</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="fromDate">
                                        </div>
                                        <label class="col-sm-2 control-label">To Date:</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="toDate">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Employee List Table -->
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="sample-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Employee Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Contact No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include('dbconnection/connection1.php');
                                        
                                        // Check if form is submitted
                                        if(isset($_POST['fromDate']) && isset($_POST['toDate'])){
                                            // Retrieve form data
                                            $fromDate = $_POST['fromDate'];
                                            $toDate = $_POST['toDate'];
                                            
                                            // Query to fetch employee data based on date range
                                            $query = "SELECT * FROM employee WHERE empid IN (SELECT DISTINCT empid FROM request WHERE request_date BETWEEN '$fromDate' AND '$toDate')";
                                        } else {
                                            // Default query to fetch all employee data
                                            $query = "SELECT * FROM employee ORDER BY empid DESC";
                                        }
                                        
                                        $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                        $i = 1;
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$row['emp_name']."</td>";
                                            echo "<td>".$row['username']."</td>";
                                            echo "<td>".$row['password']."</td>";
                                            echo "<td>".$row['contactno']."</td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include('template/footer.php'); ?>

        <!-- Basic scripts -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- Ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
    </body>
</html>
