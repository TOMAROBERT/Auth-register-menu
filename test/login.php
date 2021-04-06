<?php
   session_id("mainID");
   session_start();
?>

<html>
   <head>
      <title>Login</title> 
      <link rel="stylesheet" href="login.css">  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
	
   <body>

<div class="login-box">
<div style="display:flex;" id="toggleLogSiRegister">
  <a style="width:100%;" href="register.php"><button style="background-color: forestgreen;" class="button buttonTop">Creeaza un cont !</button></a>
</div>
<div> 
  <h2>Bine ai venit !</h2>      
  <?php 
    $conn=mysqli_connect("localhost", "root", "","rotodb") or die(mysqli_error($myConnection));
    
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];  
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password); 
     
        $sql = "select * from administrator where username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        if($count == 1){  
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'user';
            echo "<div class='register-msg'>".'Date introduse corect'."</div>";        

            header('Location: acasa.php');
//            echo "Username :".$username;
//            echo "<br>";
//            echo "Parola: ".$password;
//            echo "<br>";  
        }  
        else{  
            echo "<div class='warning-msg'>".'Nume sau parola gresita'."</div>";        
        } 
    }
    ?>
         <form  method = "post">
            <div class="user-box"> 
                <input type ="text" name ="username" placeholder="Nume utilizator" required>
            </div>   
            
            <div class="user-box"> 
                <input type ="password" name ="password" placeholder="Parola" required>
            </div>    
                <button class="button button2" type = "submit" name ="login">Logare</button>
         </form>
</div>
</div>  
   </body>
<!--
    <script>
    $('#toggleLogSiRegister > button').click(function() {
        var ix = $(this).index();
    
        $('#logare').toggle( ix === 0 );
        $('#inregistrare').toggle( ix === 1 );
    });  
  </script>
-->
</html>
       