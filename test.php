<?php
    include('connection.php');
    if(isset($_POST['x'])||isset($_POST['y'])){
        $per=json_decode($_POST['x'],true);
        if($per!=null){
            $mx="INSERT INTO events(data) VALUES ('$per')";
            $mx=mysqli_query($con,$mx);
        }
        $per1=json_decode($_POST['y'],true);
        if($per1!=null){
            $mx="INSERT INTO events(data) VALUES ('$per1')";
            $mx=mysqli_query($con,$mx);
        }
    }
    if(isset($_GET['x'])||isset($_GET['y'])){
        $mx="SELECT * FROM events";
        $mx=mysqli_query($con,$mx);
        if($mx->num_rows>0){
            $storedData="";
            while($row=$mx->fetch_assoc()){
                if($row['data']!=null)
                    $storedData.=$row['data']."<br><br><br>";
            }
            echo json_encode($storedData);
        }
        else
            echo "No data to retgrieve";
    }
?>
