<?php 

if (isset($_POST["submit"])) {
    include_once("../RentARoom/dbconn.php");
    $roomid = $_POST["roomid"];
    $contact = $_POST["contact"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $deposit = $_POST["deposit"];
    $state = $_POST["state"];
    $area = $_POST["area"];
    $date = $_POST["date"];
    $latitude = $_POST["latitude"];
    $logitude = $_POST["logitude"];
    $sqlregister = "INSERT INTO `newroom`(`roomid`, `contact`, `title`, `description`, `price`, `deposit`, `state`, `area`, `date`, `latitude`, `logitude`) 
    VALUES ('$roomid', '$contact', '$title', '$description', '$price', '$deposit', '$state', '$area', '$date', '$latitude', '$logitude')";
    try {
        $conn->exec($sqlregister);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
            uploadImage($roomid);
        }
        echo "<script>alert('Registration successful')</script>";
        echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Registration failed')</script>";
        echo "<script>window.location.replace('newroom.php')</script>";
    }
}

function uploadImage($id)
{
    $target_dir = "./pic/";
    $target_file = $target_dir . $id . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
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


    <title>Add New Room</title>
</head>
<body>
<div class="w3-container w3-white w3-padding-62 w3-center">
    <img src="pic/logo.png" alt="logo" style="width: 20%">
    <h1 style="font-size: calc(2px + 1vw);">Your comfortable is our responsibility</h1>
</div>

    <div class=" w3-bar w3-black">
        <a href="#logout" class="w3-bar-item w3-button w3-right"></a>
        <a href="mainpage.php" class="w3-bar-item w3-button w3-left"><<</a>
    </div>

    <div class="w3-container w3-center w3-highway-red">
                <p>ROOM DETAILS</p>
            </div>
    <div class="w3-container w3-light-grey">
        <div class="w3-container w3-margin form-container-reg">
            <div class="w3-card"></div>    
        </div>
            <form class="w3-container w3-padding formco" name="reserveForm" action="newroom.php" method="post" enctype="multipart/form-data">
                <form class="w3-container w3-padding" name="newRoom" action="newroom.php" method="post" onsubmit="return confirmDialog()" enctype="multipart/form-data">
            <div class="w3-container w3-border w3-center w3-padding">
                    <img class="w3-image w3-round w3-margin" src="../res/images/profile.png" style="width:100%; max-width:600px"><br>
                    <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
                </div>

                <p>
                    <label>ID:</label>
                    <input class="w3-input w3-border w3-round" name="roomid" id="roomid" type="text" required>
                </p>
                <p>
                    <label>Contact:</label>
                    <input class="w3-input w3-border w3-round" name="contact" id="contact" type="text" required>
                </p>

                <p>
                    <label>Title:</label>
                    <input class="w3-input w3-border w3-round" name="title" id="title" type="text" required>
                </p>
                <p>
                    <label>Description:</label>
                    <input class="w3-input w3-border w3-round" name="description" id="description" type="text" required>
                </p>
                <p>
                    <label>Price:</label>
                    <input class="w3-input w3-border w3-round" name="price" id="price" type="text" required>
                </p>
                <p>
                    <label>Deposit:</label>
                    <input class="w3-input w3-border w3-round" name="deposit" id="deposit" type="text" required>
                </p>
                <label>State</label>
                    <select class="w3-input w3-border w3-round" name="state" id="state">
                        <option value="Penang">Penang</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Perak">Perak</Kedah>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Johor">Johor</option>
                    </select>
                </p>
                <p>
                    <label>Area:</label>
                    <input class="w3-input w3-border w3-round" name="area" id="area" type="text" required>
                </p>
                <p>
                    <label>Date:</label>
                    <input class="w3-input w3-border w3-round" name="date" id="date" type="date" required>
                </p>
                <p>
                    <label>Latitude:</label>
                    <input class="w3-input w3-border w3-round form-control" name="latitude" id="latitude" type="text" placeholder="lat" required>
                </p>
                <p>
                    <label>Logitude:</label>
                    <input class="w3-input w3-border w3-round form-control" name="logitude" id="logitude" type="text" placeholder="log" required>
                </p>
                <p>
                <div class="row">
                    <input class="w3-input w3-border w3-block w3-black w3-round" type="submit" name="submit" value="Submit">
                </div><br>
            </form>
            </div>
        </div>
</div>

<footer class="w3-footer w3-center w3-highway-red w3-padding-16">
    <p>Norizzati Sofi @ Rent@Room</p>
</footer>
</body>
</html>