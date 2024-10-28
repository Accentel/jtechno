<?php 
//include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
    $name=$_SESSION['user'];
    //include('org1.php');
    include'dbfiles/org.php';
    //include'dbfiles/iqry_acyear.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Alert message variables
    $update_success_msg = $update_error_msg = '';

    // If form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $count = $_POST['count'];

        // Update count in the database
        $sql = "UPDATE qutcount SET count = $count WHERE id = $id";

        if ($link->query($sql) === TRUE) {
            $update_success_msg = "Counter updated successfully";
        } else {
            $update_error_msg = "Error updating counter: " . $link->error;
        }
    }

    // Retrieve data from the database
    $sql_select = "SELECT id, state, count FROM qutcount WHERE state = 'TS' OR state = 'KN'";
    $result = $link->query($sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Count</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 8px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #ffffff;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .logout-link {
            font-size: 16px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 3s;
        }
        .logout-link:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div style="position: absolute; top: 10px; right: 10px;">
        <a href="index.php">Logout</a>
    </div>
 
    <?php
    // Display update success message
    if ($update_success_msg) {
        echo "<script>alert('$update_success_msg');</script>";
    }
    // Display update error message
    if ($update_error_msg) {
        echo "<script>alert('$update_error_msg');</script>";
    }
    ?>
    <table>
        <tr>
            <!-- <th>S.No</th> -->
            <th>state</th>
            <th>Count</th>
            <th>Action</th>
        </tr>
        <?php
        // Loop through each row in the result set
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <!-- <td><?php echo $row['id']; ?></td> -->
                <td><?php echo $row['state']; ?></td>
                <td><?php echo $row['count']; ?></td>
                <td>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="number" name="count" value="<?php echo $row['count']; ?>" min="0">
                        <input type="submit" value="Update">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>

<?php 
} else {
    session_destroy();
    session_unset();
    header('Location:index.php?authentication failed');
}
?>
