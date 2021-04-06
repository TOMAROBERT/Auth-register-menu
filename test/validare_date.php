         <?php
            $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error($myConnection));
            mysqli_select_db($conn, "rotodb");
       
            $sql_create = "CREATE TABLE administrator
            (
            ID int NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(ID),
            username varchar(20),
            password varchar(20)
            )";
            $retval = mysqli_query($conn, $sql_create);
            if(! $retval )
            {
              die("Eroare in creearea tabelului 'administrator' : " . mysqli_error());
            }
            echo "Tabelul 'administrator' a fost creeat cu succes !\n";
            echo "<br>";
            
            $sql_insert="INSERT INTO administrator (username, password) 
            VALUES 
            ('test1', 'parola1'),
            ('test2', 'parola2')
            ";

            $retval = mysqli_query($conn, $sql_insert);
            if(! $retval )
            {
              die("Nu se pot introduce date in tabelul 'administrator' : " . mysqli_error());
            }
            echo "Date introduse cu succes in tabelul 'administrator' \n";
            echo "<br>";
       
            $sql_read = "SELECT * FROM administrator";
            $result = mysqli_query($conn, $sql_read);
            if(! $result )
            {
              die("Nu se pot citi date din tabelul 'administrator' " . mysqli_error());
            }

            while($row = $result->fetch_assoc()){
                $user = $row['username'];
                $pass = $row['password'];
                echo $user;
                echo $pass;
            }     
         ?>