<?php   
    include("../connection/config.php"); 

    if(isset($_POST['ipaddress']))
    {
        $date = date('Y-m-d H:i:s');

        echo $ipaddress = $_POST['ipaddress'];
        
        if(mysqli_query($conn, "INSERT INTO `ip_address` (`ip_address`,`created_at`,`status`) VALUES ('$ipaddress','$date',1)"))
        {
            
        }
    }
?>