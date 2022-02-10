<?PHP 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    $_SESSION['verify'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<title>Panel Login</title>
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

<script>
        function wrongpass() {
            document.getElementById("wrongpass1").style.visibility = "visible";           
        }
</script>

<body>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-blue-grey w3-collapse w3-top w3-large w3-padding"
        style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft"
            style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64" style="margin-top: 20px;"><b>Panel Menu</b></h3>
        </div>
        <div class="w3-bar-block" style="margin-top: 50px;">

            <a href="#showcase" onclick="w3_close()"
                class="w3-bar-item w3-text-orange w3-button w3-hover-white">Login</a>

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
    <div class="w3-main  w3-light-grey w3-half"
        style="margin-left:340px;margin-right:40px;">

        <!-- Header -->
        <div class="w3-container" style="margin-top:40px" id="showcase">
            <h1 class="w3-xxxlarge"><b>Welcome to Panel</b></h1>

            <!-- Contact -->

            <h1 class=" w3-xxlarge w3-text-teal"><b>Please Login</b></h1>



            <form class="w3-half" method="POST" action="" >

                <div class="w3-section">
                    <label>User Name</label>
                    <input class="w3-input w3-border" type="text" name="user" required>
                </div>

                <div class="w3-section">
                    <label>Password</label>
                    <input class="w3-input w3-border" type="password" name="pass" required>
                </div>

                <button type="submit" name="submit" class="w3-button w3-block w3-padding-large w3-blue-grey w3-margin-bottom"
                    style="margin-top: 30px;">Submit</button>
            </form>

            
        </div>

        <h3 class="w3-text-red" id="wrongpass1" style="visibility: collapse;">Wrong Username or Password</h3>
    
        
        <!-- End page content -->
    </div>



        <!-- End page content -->
    




    <!-- W3.CSS Container -->
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:55px;padding-right:58px">
        <p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS"
                target="_blank" class="w3-hover-opacity">w3.css</a></p>
    </div>

    
    <!-- PHP Components -->
    <?PHP            
            if(array_key_exists('submit', $_POST)){
                sign_in();
            }
    ?>



    <?PHP 
        function sign_in() {
            $user_name = $_POST['user'];
            $pass = $_POST['pass'];

            $_SESSION['user_name'] = $user_name;

            include "connect.php";
            
            $sql = "SELECT user_id, user_pass FROM p_account";

            $result = mysqli_query($conn, $sql);

            $result_fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);


            foreach($result_fetch as $view) {

                if(($user_name == $view['user_id']) AND ($pass == $view['user_pass'])) {
                    $_SESSION['verify'] = 1;
                }

            }

            if ($_SESSION['verify'] == 1) {
                Header('Location: entry.php');
            } else {
                echo "<script>wrongpass()</script>";     
            }

        }
    
    
    ?>    
    


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