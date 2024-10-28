<?php
include("dbconnection/connection.php");
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_REQUEST['submit'])) {

	// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $empname = $_REQUEST['empname'];
    $uname = $_REQUEST['user'];
    $menu = $_REQUEST['menu'];

    $result = mysqli_query($link, "SELECT * FROM admin_login WHERE empname='$empname'") or die(mysqli_error($link));
    $rows = mysqli_num_rows($result);

    $r = mysqli_fetch_array($result);
    $y = mysqli_query($link, "SELECT * FROM employee WHERE empid='$empname'") or die(mysqli_error($link));
    $r = mysqli_fetch_array($y);
    if($r['username'] == '') {
        $y = mysqli_query($link, "SELECT username, password, employeeid AS empid FROM emp WHERE employeeid='$empname'") or die(mysqli_error($link));
        $r = mysqli_fetch_array($y);
    }
    $userid = $r['username'];
    $password1 = $r['password'];
    $password = md5($password1);
    $empname1 = $r['empid'];

    if($rows > 0) {
        $query1 = "UPDATE admin_login SET empname='$uname', pwd='$pwd' WHERE empname='$ename'";
    } else {
        $query1 = "INSERT INTO admin_login(user, pwd, empname) VALUES ('$userid', '$password', '$empname1')";
    }

    $query = mysqli_query($link, $query1) or die(mysqli_error($link));

    $sql = mysqli_query($link, "DELETE FROM admin_user WHERE emp_id=$empname1");

    // Store all menus in a single column separated by commas
    $admin_menus = implode(',', $menu);

    $insert_admin_menus_query = "INSERT INTO admin_user (emp_id, menus, currentdate, auth_by) VALUES ('$empname1', '$admin_menus', NOW(), '$uname')";

    $insert_admin_menus_result = mysqli_query($link, $insert_admin_menus_query) or die(mysqli_error($link));

    if($query && $insert_admin_menus_result) {
        print "<script>";
        print "alert('Successfully added');";
        // print "self.location='usermanagement.php';";
        print "</script>";
    } else {
        print "<script>";
        print "alert('Unable to add');";
        // print "self.location='usermanagement.php';";
        print "</script>";
    }
} else {
    print "<script>";
    print "alert('Username or password already exists');";
    // print "self.location='user.php';";
    print "</script>";
}
?>





