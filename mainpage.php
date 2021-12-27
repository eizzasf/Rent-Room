<?php 

session_start();
if (!isset($_SESSION['sessionid'])) {
    echo"<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('../login.php')</script>";
}

include_once("./dbconn.php");
$sqlrooms = "SELECT * FROM newroom ORDER BY `date` DESC";
$stmt = $conn->prepare($sqlrooms);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="design.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
    <script src="script.js"></script>

    <title>Mainpage</title>
</head>
<body>
<div class="w3-container w3-white w3-padding-62 w3-center">
    <img src="pic/logo.png" alt="logo" style="width: 20%">
    <h1 style="font-size: calc(2px + 1vw);">Your comfortable is our responsibility</h1>
</div>

    <div class=" w3-bar w3-black">
        <a href="#logout" class="w3-grey w3-bar-item w3-button w3-right">Hello, Admin</a>
        <a href="newroom.php" class="w3-bar-item w3-button w3-left">New Reservation</a>
    </div>

    <div class="w3-container w3-light-grey" style="height: fit-content;">
    <h2>Rental room list</h2>
        <div class="w3-grid-template">
            <?php 
            foreach ($row as $rooms) {
                $roomid = $rooms['roomid'];
                $contact = $rooms['contact'];
                $title = $rooms['title'];
                $description = $rooms['description'];
                $price = $rooms['price'];
                $deposit = $rooms['deposit'];
                $state = $rooms['state'];
                $area = $rooms['area'];
                $date = $rooms['date'];
                $latitude = $rooms['latitude'];
                $logitude = $rooms['logitude'];

                echo "<div class='w3-center w3-padding'>";
                echo "<div class='w3-card-4 w3-highway-red'>";
                echo "<header class='w3-container w3-whitesmoke'";

                echo "</header>";
                echo "<div class='w3-padding'><img class='w3-image' src=./pic/$roomid.png" .
                " onerror=this.onerror=null;this.src='./pic/logo.png'"
                . " '></div>";

                echo "$title<br>";
                echo "<div class='w3-container w3-left-align'><hr>";
                echo "<p> <h5 class='w3-center'>ROOM ID: $roomid</h5>
                         Description: $description<br> 
                         Contact: $contact<br>
                         Price: $price<br> 
                         Deposit: $deposit<br> 
                         State: $state<br> 
                         Area: $area<br>
                         Date: $date<br> 
                         Latitude: $latitude<br> 
                         Logitude: $logitude<br>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                
            }

?>
</div>

</div>

<footer class="w3-footer w3-center w3-black w3-padding-16">
    <p>Norizzati Sofi @ Room Reservation</p>
</footer>
</body>
</html>