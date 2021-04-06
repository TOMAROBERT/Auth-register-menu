<html>
   
   <head>
      <title>Login</title> 
      <link rel="stylesheet" href="login.css">  
   </head>
   <style>
    .register-msg{
        font-family:cursive;
        text-align: center;
        margin: 10px 0;
        padding: 10px;
        border-radius: 3px 3px 3px 3px;   
        color: #068d5e;
        background-color: #06fe5e;
        margin-bottom:32px;    
    }
   </style>
   <body>

       
<div class="login-box">
    
<div style="display:flex;">
  <a style="width:100%;" href="login.php"><button style="background-color:lightseagreen;margin:2px;" class="button buttonTop">Acceseaza contul !</button></a>
</div>
    
  <h2>Cont nou !</h2>
    <?php 
    session_start();
    $conn=mysqli_connect("localhost", "root", "","rotodb") or die(mysqli_error($myConnection));   
    $errors = array(); 
    if (isset($_POST['register'])){
        $username = $_POST['username'];  
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
            
        $username = mysqli_real_escape_string($conn, $username);  
        $password_1 = mysqli_real_escape_string($conn, $password1); 
        $password_2 = mysqli_real_escape_string($conn, $password2);
     
        $sql = "select * from administrator where username = '$username' and password = '$password1'";
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        if ($row) { // if user exists
            if ($row['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }
        
        if (count($errors) == 0) {
  	         $query = "INSERT INTO administrator (username,password) VALUES('$username','$password_1')";
  	         mysqli_query($conn, $query);
//  	         $_SESSION['username'] = $username;
//  	         $_SESSION['success'] = "You are now logged in";
             echo "<div class='register-msg'>".'Cont inregistrat cu succes !'."</div>";        
//  	         header('location: index.php');
        }else{
            echo "<div class='warning-msg'>".'Datele introduse sunt invalide/existente !'."</div>";
        }
   
    }
    ?>
         <form  method = "post">
            <div class="user-box"> 
                <input type ="text" name ="username" placeholder="Nume utilizator" required>
            </div>   
            <div class="user-box"> 
                <input type ="password" name ="password1" placeholder="Parola" required>
            </div>  
            <div class="user-box"> 
                <input type ="password" name ="password2" placeholder="Confirmare parola" required>
            </div>  
             
                <button class="button button2" type = "submit" name="register">Inregistrare</button>
         </form>
         
</div> 
      
   </body>
</html>
       