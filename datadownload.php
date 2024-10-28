<table>
    
    <tr>
        <td>id</td>
        <td>Description</td>
    </tr>

<?php
include_once('dbconnection/connection.php'); 
$y="SELECT * FROM add_klqot1    ORDER BY id asc limit 1000";
$k=mysqli_query($link,$y) or die(mysqli_error($link));
while($k1=mysqli_fetch_array($k)){ ?>
    
    <tr>
       <td><?php echo $k1['id']; ?></td>
       <td><?php echo $k1['desc1']; ?></td>
    </tr>
    
    <?php 
}

?></table>