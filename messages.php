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

include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<title>Messages</title>
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

            <a href="entry.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Select</a>

            <a href="messages.php" onclick="w3_close()"
                class="w3-bar-item w3-button w3-text-orange w3-hover-white">Recount</a>

            <a href="sign_out.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Sign Out</a>
        </div>

        <div class="w3-bar-block" style="margin-top: 60px;">
            <p class="w3-bar-item ">User: <span class="w3-text-orange"><em><?PHP echo($_SESSION['user_name'])?></em></span></p>
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

    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-light-grey w3-twothird" style="margin-left:340px;margin-right:40px;">

        <div class="w3-container" style="margin-top:40px" id="showcase">
            <h1 class="w3-xxxlarge"><b>Select Data</b></h1>
            <h1 class=" w3-xxlarge w3-text-teal"><b>to be processed</b></h1>
        </div>

        <!-- End page content -->
    </div>

    <form method="POST" action="confirm.php">
    <div id="confirm-collapse3" class=" w3-main" style="margin-top: 100px; margin-left:340px;margin-right:40px;">
        
        <div class="" style="margin-top: 100px;">
            <div class="w3-twothird w3-margin-bottom" style="margin-top: 20px; margin-left: 15px;">

                <button class="w3-button w3-red w3-padding-large w3-hover-black"
                    style="width: 250px; margin-left: 5px; margin-right:10px; margin-bottom: 10px;"
                    onclick="">CONFIRM select</button>

            </div>

        </div>

    </div>    

    <!-- PHP Viewer Function to fetch the messages from database -->

    <?PHP
        viewer();

        function viewer() {
        
            include 'connect.php';

            $sql = 'SELECT id,name,email,message,created_at FROM heimir_data ORDER BY created_at';
            
            $result = mysqli_query($conn, $sql);

            $result_ex = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);
            
            
            // $id_array = array();
            // $selected = array();
         
    ?>


    <!-- PHP/html section displays the components  -->

            

    <div class="w3-main w3-light-grey w3-half" style="margin-left:340px;margin-right:40px; margin-top: 40px;">

        <div class="w3-row-padding ">

        <?PHP 
            foreach ($result_ex as $view) {
                $selected_name = $view['id']
        ?>    
            
            <div class="w3-col m10 s10 l10">
                <div class="w3-grey w3-hover-blue-grey" style="margin-bottom: 40px;">

                    <div class="w3-container">
                        <?PHP echo "<span class='w3-bar-item w3-button w3-xlarge w3-right'><input class='w3-check' type='checkbox' name='selected[]'
                                checked='checked' value='".$selected_name."'></span>"; ?>
        
                        <h3><?PHP echo $view['name']; ?></h3>
                        <p class="w3-opacity"><?PHP echo $view['email']; ?></p>
                        <p><?PHP echo $view['message']; ?></p>
                        <p><?PHP echo (date($view['created_at']));?></p>
                        
                    </div>
                </div>
            </div>
        
        <?PHP } ?>    
                 
        </div>
    </div>

    </form>

    <?PHP } ?>

    

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

    