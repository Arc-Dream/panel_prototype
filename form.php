<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$verify = $_SESSION['verify'];

if (!$verify == 1) {
    echo "Unauthorized access";
    exit();
}

?>

<script>
    function verify() {
        document.getElementById('form').style.visibility = 'collapse';
        document.getElementById('form').style.height = '0px';
        document.getElementById('form').style.width = '0px';
        document.getElementById('form').style.margin = '0px';

        document.getElementById('form_after').style.visibility = 'visible';            
        }

</script>

<!DOCTYPE html>
<html lang="en">
<title>Panel Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Poppins", sans-serif
    }

    body {
        font-size: 16px;
    }

    .w3-half img {
        margin-bottom: -6px;
        margin-top: 16px;
        opacity: 0.8;
        cursor: pointer
    }

    .w3-half img:hover {
        opacity: 1
    }
</style>

<body>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-blue-grey w3-collapse w3-top w3-large w3-padding"
        style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft"
            style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64" style="margin-top: 20px;"><b>Panel Menu</b></h3>
        </div>

        <div class="w3-bar-block">

            <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Select</a>

            <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-text-orange w3-hover-white">Form</a>

            <a href="sign_out.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Sign Out</a>
        </div>

        <div class="w3-bar-block" style="margin-top: 60px;">
            <p class="w3-bar-item">User: <span class="w3-text-orange"><em><?PHP echo($_SESSION['user_name'])?></em></span></p>
        </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-blue-grey w3-xlarge w3-padding">
        <a href="javascript:void(0)" class="w3-button w3-blue-grey w3-margin-right" onclick="w3_open()">☰</a>
        <span>Panel</span>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
        id="myOverlay"></div>



    <!-- !SECTION CONTENT! -->
    <div class="w3-main w3-light-grey w3-half" style="margin-left:340px;margin-right:40px;">

        <div class="w3-container" style="margin-top:40px" id="showcase">
            <h1 class="w3-xxxlarge"><b>Welcome to Panel</b></h1>

            <h1 class=" w3-xxlarge w3-text-teal"><b>Please Enter Information</b></h1>

        </div>
       
    </div>

    <!-- End section content -->




    <!-- !SECTION CONTENT! -->
    
    <div  class="w3-main" style="margin-top: 100px; margin-left:340px;margin-right:40px;">

        <div class="w3-container w3-half" style="margin-top:25px">
                        
            <form id="form" method="POST">
                <div class="w3-section">
                    <label>Name</label>
                    <input class="w3-input w3-border" type="text" name="name" required>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                    <input class="w3-input w3-border" type="text" name="email" required>
                </div>
                <div class="w3-section">
                    <label>Message</label>
                    <!-- <input class="w3-input w3-border" type="text" name="message" required> -->
                    <textarea class="w3-border" wrap="hard" maxlength="2000" rows="3" cols="45"  required name="message" required></textarea>
                </div>
                <button type="submit" name="submit" class="w3-button w3-block w3-padding-large w3-blue-grey w3-margin-bottom">Record Entry</button>
            </form>

            <div id="form_after" style="visibility: collapse;">
                
                <h3>Information Recorded</h3>
                
                
                <button name="proceed" onclick="location.href = 'entry.php';" class="w3-button w3-red w3-padding-large w3-hover-black" style="width: 200px;">Return Menu</button>
                
            </div>

        </div>

    </div>
    

    <?PHP 
        if(isset($_POST['submit'])) {
            record();
        }

    ?>    
    
      
    <?PHP    
        function record() {
                    
            // $server = "localhost";
            // $user = "root";
            // $password = "123";
            // $db = "data_try";
            // $table = "heimir_data";

            // $conn = new mysqli($server, $user, $password, $db);

            // if($conn -> connect_error) {
            //     die("<br>Connection Failed".$conn -> connect_error);
            // }

            include "connect.php";

            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $message = mysqli_real_escape_string($conn,$_POST['message']);

            $sql = "INSERT INTO $table(name,email,message) VALUES('$name','$email','$message')";

            
            mysqli_query($conn, $sql);

            echo"<script>verify()</script>";

        }
    ?>

    <!-- End section content -->

    


    
    
    

    
    <!-- W3.CSS Container -->
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
        <p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS"
                target="_blank" class="w3-hover-opacity">w3.css</a></p>
    </div>





    <script>
        // Script to open and close sidebar
        

        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function changeClass() {
            var x = document.getElementById('showcase');
            var width = window.screen.width;
            console.log(width);

            if (width <= 640) {
                x.className = 'w3-container w3-center';
            } else {
                x.className = "w3-container";
            }

        }

        windows.addEventListener('resize', changeClass(event), true);
    </script>

</body>

</html>