<?php 
if ($name == "admin") {
    ?>
    <ul class="nav nav-list">
        <li class="">
            <a href="dashboard.php">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cog"></i>
                <span class="menu-text"> Settings </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=""><a href="organization.php"><i class="menu-icon fa fa-caret-right"></i> Update Organization</a></li>
                <li class=""><a href="addemployee.php"><i class="menu-icon fa fa-caret-right"></i> Add Employee</a></li>
                <li class=""><a href="superwiser.php"><i class="menu-icon fa fa-caret-right"></i> Add Supervisor Name</a></li>
                <li class=""><a href="company.php"><i class="menu-icon fa fa-caret-right"></i> Add Company Name</a></li>
                <li class=""><a href="afm.php"><i class="menu-icon fa fa-caret-right"></i> Add AFM</a></li>
                <li class=""><a href="coordination.php"><i class="menu-icon fa fa-caret-right"></i> Add Co-Ordinator</a></li>
                <li class=""><a href="ac_det.php"><i class="menu-icon fa fa-caret-right"></i> Add Account Details</a></li>
                <li class=""><a href="store_list.php"><i class="menu-icon fa fa-caret-right"></i> Store List</a></li>
                <li class=""><a href="emp_list.php"><i class="menu-icon fa fa-caret-right"></i> Employee List</a></li>
                <li class=""><a href="uploaditems_list.php"><i class="menu-icon fa fa-caret-right"></i> Items List</a></li>
                <li class=""><a href="form.php"><i class="menu-icon fa fa-caret-right"></i> Change Status</a></li>
            </ul>
        </li>
        
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-upload"></i>
                <span class="menu-text"> Upload Formats </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=""><a href="productsformat.php"><i class="menu-icon fa fa-caret-right"></i> Update Products Format</a></li>
                <li class=""><a href="billingformat.php"><i class="menu-icon fa fa-caret-right"></i> Upload Add Billing Format</a></li>
                <li class=""><a href="empsalaryformat.php"><i class="menu-icon fa fa-caret-right"></i> Update Employees Salary Format</a></li>
                <li class=""><a href="uploadempsalary.php"><i class="menu-icon fa fa-caret-right"></i> Upload Employees Salary</a></li>
            </ul>
        </li>
        
        <li class="">
            <a href="#" class="dropdown-toggle">
                <img src="images/ts.png">
                <span class="menu-text"> TG Tracker </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=""><a href="tgqot_list.php"><i class="menu-icon fa fa-caret-right"></i> TG Quotations</a></li>
                <li class=""><a href="roqot_list.php?state=TG"><i class="menu-icon fa fa-caret-right"></i> RO Required</a></li>
                <li class=""><a href="tgwtsqot_list.php"><i class="menu-icon fa fa-caret-right"></i> Work To Be Started</a></li>
                <li class=""><a href="tgreq_list.php"><i class="menu-icon fa fa-caret-right"></i> Requested Amount List</a></li>
                <li class=""><a href="tgreq_list1.php"><i class="menu-icon fa fa-caret-right"></i> Amount Approved List</a></li>
                <li class=""><a href="tgbill_list.php"><i class="menu-icon fa fa-caret-right"></i> Document Required List</a></li>
                <li class=""><a href="tgbill_list2.php"><i class="menu-icon fa fa-caret-right"></i> To Be Raise Invoice</a></li>
                <li class=""><a href="tgbill_list31.php"><i class="menu-icon fa fa-caret-right"></i> Raised Invoice List</a></li>
                <li class=""><a href="tgbill_list3.php"><i class="menu-icon fa fa-caret-right"></i> Payment Pending Invoice</a></li>
                <li class=""><a href="tgbill_list4.php"><i class="menu-icon fa fa-caret-right"></i> Payment Received</a></li>
                <li class=""><a href="tgwork1.php"><i class="menu-icon fa fa-caret-right"></i> Mark Not Required</a></li>
                <li class=""><a href="tgwork2.php"><i class="menu-icon fa fa-caret-right"></i> GST Bills Pending</a></li>
                <li class=""><a href="tgaaexcel.php"><i class="menu-icon fa fa-caret-right"></i> Amount Approved Excel</a></li>
                <li class=""><a href="tgraexcel.php"><i class="menu-icon fa fa-caret-right"></i> Requested Amount Excel</a></li>
                <li class=""><a href="tgtrack.php"><i class="menu-icon fa fa-caret-right"></i> Tracker</a></li>
                <li class=""><a href="qutdetails_tg_excel.php?user=<?php echo $name; ?>"><i class="menu-icon fa fa-caret-right"></i> Quotation Details</a></li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <img src="images/kn.png">
                <span class="menu-text"> KN Tracker </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=""><a href="knqot_list.php"><i class="menu-icon fa fa-caret-right"></i> KN Quotations</a></li>
                <li class=""><a href="roqot_list.php?state=KN"><i class="menu-icon fa fa-caret-right"></i> RO Required</a></li>
                <li class=""><a href="knwtsqot_list.php"><i class="menu-icon fa fa-caret-right"></i> Work To Be Started</a></li>
                <li class=""><a href="knreq_list.php"><i class="menu-icon fa fa-caret-right"></i> Requested Amount List</a></li>
                <li class=""><a href="knreq_list1.php"><i class="menu-icon fa fa-caret-right"></i> Amount Approved List</a></li>
                <li class=""><a href="knbill_list.php"><i class="menu-icon fa fa-caret-right"></i> Document Required List</a></li>
                <li class=""><a href="knbill_list2.php"><i class="menu-icon fa fa-caret-right"></i> To Be Raise Invoice</a></li>
                <li class=""><a href="knbill_list31.php"><i class="menu-icon fa fa-caret-right"></i> Raised Invoice List</a></li>
                <li class=""><a href="knbill_list3.php"><i class="menu-icon fa fa-caret-right"></i> Payment Pending Invoice</a></li>
                <li class=""><a href="knbill_list4.php"><i class="menu-icon fa fa-caret-right"></i> Payment Received</a></li>
                <li class=""><a href="knwork1.php"><i class="menu-icon fa fa-caret-right"></i> Mark Not Required</a></li>
                <li class=""><a href="knwork2.php"><i class="menu-icon fa fa-caret-right"></i> GST Bills Pending</a></li>
                <li class=""><a href="knaaexcel.php"><i class="menu-icon fa fa-caret-right"></i> Amount Approved Excel</a></li>
                <li class=""><a href="knraexcel.php"><i class="menu-icon fa fa-caret-right"></i> Requested Amount Excel</a></li>
                <li class=""><a href="kntrack.php"><i class="menu-icon fa fa-caret-right"></i> Tracker</a></li>
                <li class=""><a href="qutdetails_kn_excel.php?user=<?php echo $name; ?>"><i class="menu-icon fa fa-caret-right"></i> Quotation Details</a></li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-inr"></i>
                <span class="menu-text"> Expenses </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=""><a href="addexpenses.php"><i class="menu-icon fa fa-caret-right"></i> Add Expenses</a></li>
                <li class=""><a href="apexpenseslist.php"><i class="menu-icon fa fa-caret-right"></i> AP Expenses List</a></li>
                <li class=""><a href="tgexpenseslist.php"><i class="menu-icon fa fa-caret-right"></i> TS Expenses List</a></li>
                <li class=""><a href="knexpenseslist.php"><i class="menu-icon fa fa-caret-right"></i> KN Expenses List</a></li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-text-o"></i>
                <span class="menu-text"> Reports </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class=""><a href="finalemp1.php"><i class="menu-icon fa fa-caret-right"></i> Employee Activity Report</a></li>
                <li class=""><a href="date_excel.php"><i class="menu-icon fa fa-caret-right"></i> Activity Report - Excel Download</a></li>
                <li class=""><a href="timetracker.php"><i class="menu-icon fa fa-caret-right"></i> Working Hours Report</a></li>
                <li class=""><a href="https://jtechnoassociates.in/jtechnoapp/attdance.php"><i class="menu-icon fa fa-caret-right"></i> Attendance Report</a></li>
            </ul>
        </li>

        <li class="">
            <a href="usermanagement.php">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> User Management </span>
            </a>
        </li>		
    </ul>
<?php 
} else {
    include('sidemenu1.php');
}
?>
