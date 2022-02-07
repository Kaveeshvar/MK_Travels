<?php      
    include('db.php');  
    $Fp = $_POST['F_place'];  
    $Tp = $_POST['T_place'];  
      
        //to prevent from mysqli injection  
        $Fp = stripcslashes($Fp);  
        $Tp = stripcslashes($Tp);  
        $Fp = mysqli_real_escape_string($con, $Fp);  
        $Tp = mysqli_real_escape_string($con, $Tp);  
      
        $sql = "select *from login where username = '$Fp' and password = '$Tp'";  
        $result = mysqli_query($con, $sql); 
        if (!$result) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
      } 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  