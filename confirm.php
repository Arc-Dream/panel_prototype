<?php

if(!isset($_SESSION)) { 
    session_start(); 
    } 

$verify = $_SESSION['verify'];

if (!$verify == 1) {
    echo "Unauthorized access";
    exit();
    }

include 'connect.php';

if ($_SESSION['menu_action'] == 'delete') {$menu_message = 'will be deleted';}
if ($_SESSION['menu_action'] == 'enter') {$menu_message = 'will be entered';}
if ($_SESSION['menu_action'] == 'make_list') {$menu_message = 'will be listed';}
if ($_SESSION['menu_action'] == 'email_list') {$menu_message = 'will be listed as email';}

?>


<!DOCTYPE html>
<html lang="en">
<title>Confirm</title>
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

            <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button  w3-hover-white">Select</a>

            <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Recount</a>

            <a href="#showcase" onclick="w3_close()"
                class="w3-bar-item  w3-text-orange w3-button w3-hover-white">Confirm</a>

            <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Sign Out</a>
        </div>

        <div class="w3-bar-block" style="margin-top: 60px;">
            <p class="w3-bar-item ">User: <span class="w3-text-orange"><em>Gazelle</em></span></p>
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
    <div id="confirm-collapse2" class="w3-main w3-light-grey w3-twothird" style="margin-left:340px;margin-right:40px;">

        <div class="w3-container" style="margin-top:40px" id="showcase">
            <h1 class="w3-xxxlarge"><b>Listed Elements</b></h1>

            <h1 class=" w3-xxlarge w3-text-teal"><b><?PHP echo $menu_message;?></b></h1>

        </div>

        <!-- End page content -->
    </div>




    <div id="confirm-collapse3" class=" w3-main" style="margin-top: 100px; margin-left:340px;margin-right:40px;">
        
        <div class="" style="margin-top: 100px;">
            <div class="w3-twothird w3-margin-bottom" style="margin-top: 20px; margin-left: 15px;">

                <button class="w3-button w3-red w3-padding-large w3-hover-black"
                    style="width: 250px; margin-left: 5px; margin-right:10px; margin-bottom: 10px;"
                    onclick="ConfirmCollapse()">CONFIRM</button>

                <button class="w3-button w3-red w3-padding-large w3-hover-black"
                    style="width: 250px; margin-left: 5px; margin-right:10px; margin-bottom: 10px;">RETURN
                    MESSAGES</button>

            </div>

        </div>

    </div>

    <div id="confirm-collapse1" class="w3-main w3-light-grey w3-half"
        style="margin-left:340px;margin-right:40px; margin-top: 40px; visibility: visible;">

        <div class="w3-row-padding ">


            <div class="w3-col m10 s10 l10">
                <div class="w3-grey w3-hover-blue-grey" style="margin-bottom: 40px;">

                    <div class="w3-container">
                        <h3>Ahmet Koral</h3>
                        <p class="w3-opacity">ahmet@a.net</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque
                            elementum.</p>
                        <p>21-01-2022</p>
                    </div>
                </div>
            </div>


            <div class="w3-col m10 s10 l10">
                <div class="w3-grey w3-hover-blue-grey" style="margin-bottom: 40px;">

                    <div class="w3-container">
                        <h3>Heimir Hedinsson</h3>
                        <p class="w3-opacity">heimir@h.net</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque
                            elementum.</p>
                        <p>22-02-2022</p>
                    </div>
                </div>
            </div>


            <div class="w3-col m10 s10 l10">
                <div class="w3-grey w3-hover-blue-grey" style="margin-bottom: 40px;">

                    <div class="w3-container">
                        <h3>Oznur Simmen</h3>
                        <p class="w3-opacity">Oznur@o.net</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque
                            elementum.</p>
                        <p>23-02-2022</p>
                    </div>
                </div>
            </div>

            <?PHP echo $_SESSION['menu_action']; ?>
        </div>
    </div>


    <!-- After Confirm Message -->
    <div id="confirm-visible1" class="w3-main w3-light-grey w3-twothird"
        style="margin-left:340px;margin-right:40px; visibility: collapse;">

        <div class="w3-container" style="margin-top:40px" id="showcase">
            <h1 class="w3-xxxlarge"><b>Operation Done</b></h1>

            <!-- Contact -->

            <h1 class=" w3-xxlarge w3-text-teal"><b>You will be redirected</b></h1>

        </div>

        <!-- End page content -->
    </div>

    <div id="confirm-visible2" class=" w3-main"
        style="margin-top: 0px; margin-left:340px;margin-right:40px; visibility: collapse;">

        <div style="margin-top: 100px;">
            <div class="w3-twothird w3-margin-bottom" style="margin-top: 20px; margin-left: 15px;">

                <button class="w3-button w3-red w3-padding-large w3-hover-black"
                    style="width: 250px; margin-left: 5px; margin-right:10px; margin-bottom: 10px;"
                    onclick="">RETURN</button>

                <button class="w3-button w3-red w3-padding-large w3-hover-black"
                    style="width: 250px; margin-left: 5px; margin-right:10px; margin-bottom: 10px;" onclick="">SIGN
                    OUT</button>



            </div>

        </div>

    </div>



    <!-- W3.CSS Container -->
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
        <p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS"
                target="_blank" class="w3-hover-opacity">w3.css</a></p>
    </div>


    <script>
        function ConfirmCollapse() {
            document.getElementById('confirm-collapse1').style.visibility = 'collapse';
            document.getElementById('confirm-collapse1').style.height = '0px';
            document.getElementById('confirm-collapse1').style.margin = '0px';
            document.getElementById('confirm-collapse2').style.visibility = 'collapse';
            document.getElementById('confirm-collapse2').style.height = '0px';
            document.getElementById('confirm-collapse2').style.margin = '0px';
            document.getElementById('confirm-collapse3').style.visibility = 'collapse';
            document.getElementById('confirm-collapse3').style.height = '0px';
            document.getElementById('confirm-collapse3').style.margin = '0px';
            document.getElementById('confirm-visible1').style.visibility = 'visible';
            document.getElementById('confirm-visible2').style.visibility = 'visible';
            document.getElementById('confirm-visible2').style.margin = '100px 40px 0 340px';
        }

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