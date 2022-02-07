<html>

<head>
  <link rel="stylesheet" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
</head>

<body>

  <?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'kaves');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $Fp = mysqli_real_escape_string($db, $_POST['F_place']);
  $Tp = mysqli_real_escape_string($db, $_POST['T_place']);
  $rawdate = htmlentities($_POST['date']);
$date = date('Y-m-d', strtotime($rawdate));
printf($Fp);
printf($Tp);
printf($date);

 // $date = mysqli_real_escape_string($db, $_POST['date']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Fp)) { array_push($errors, "From place is required"); }
  if (empty($Tp)) { array_push($errors, "To Place  is required"); }
  if (empty($date)) { array_push($errors, "Date is required"); }

 
  if (count($errors) == 0) {
  	$query = "INSERT INTO tickets (from, to, date) VALUES('$Fp', '$Tp', '$date')";
    echo"$Fp ";
  	mysqli_query($db, $query);
  	$_SESSION['F_place'] = $Fp;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
 
}
?>
  
  <div class="header">
    <div class="header">
      <a href="#default" class="logo"><img src="logo(1).png"></a>
      <div class="header-right">
        <a href="home.html">Home</a>
        <a class="active" href="Buy.html">Book Now</a>
        <a href="#about">Game</a>
      </div>
    </div>

    <div class="main-block">
      <h1>Book Tickets</h1>
      <form name="f1" action = "" method = "POST">
        <div class="info">

          <select name="F_place" id="F_place">
            <option value=''>Select From Place</option>
            <option value='Ambur'>Ambur</option>
            <option value='Anthiyur'>Anthiyur</option>
            <option value='Bangalore'>Bangalore</option>
            <option value='Bhavani'>Bhavani</option>
            <option value='Chennai'>Chennai</option>
            <option value='Coimbatore'>Coimbatore</option>
            <option value='Coonoor'>Coonoor</option>
            <option value='Cuddalore'>Cuddalore</option>
            <option value='Dharapuram'>Dharapuram</option>
            <option value='Dharmapuri'>Dharmapuri</option>
            <option value='Dindigul'>Dindigul</option>
            <option value='Erode'>Erode</option>
            <option value='Gobi'>Gobi</option>
            <option value='Karur'>Karur</option>
            <option value='Komarapalayam'>Komarapalayam</option>
            <option value='Krishnagiri'>Krishnagiri</option>
            <option value='Madurai'>Madurai</option>
            <option value='Mettupalayam'>Mettupalayam</option>
            <option value='Mettur'>Mettur</option>
            <option value='Ooty'>Ooty</option>
            <option value='Perumanallur'>Perumanallur</option>
            <option value='Perundurai'>Perundurai</option>
            <option value='Pollachi'>Pollachi</option>
            <option value='Pondicherry'>Pondicherry</option>
            <option value='Salem'>Salem</option>
            <option value='Sathyamangalam'>Sathyamangalam</option>
            <option value='Sattur'>Sattur</option>
            <option value='Tiruchengodu'>Tiruchengodu</option>
            <option value='Tirumangalam'>Tirumangalam</option>
            <option value='Tirunelveli'>Tirunelveli</option>
            <option value='Tirupur'>Tirupur</option>
            <option value='Trichy'>Trichy</option>
            <option value='Udumalpet'>Udumalpet</option>

          </select>
          <select name="T_place" id="T_place">
            <option value=''>Select To Place</option>
            <option value='Ambur'>Ambur</option>
            <option value='Anthiyur'>Anthiyur</option>
            <option value='Bangalore'>Bangalore</option>
            <option value='Bhavani'>Bhavani</option>
            <option value='Chennai'>Chennai</option>
            <option value='Coimbatore'>Coimbatore</option>
            <option value='Coonoor'>Coonoor</option>
            <option value='Cuddalore'>Cuddalore</option>
            <option value='Dharapuram'>Dharapuram</option>
            <option value='Dharmapuri'>Dharmapuri</option>
            <option value='Dindigul'>Dindigul</option>
            <option value='Erode'>Erode</option>
            <option value='Gobi'>Gobi</option>
            <option value='Karur'>Karur</option>
            <option value='Komarapalayam'>Komarapalayam</option>
            <option value='Krishnagiri'>Krishnagiri</option>
            <option value='Madurai'>Madurai</option>
            <option value='Mettupalayam'>Mettupalayam</option>
            <option value='Mettur'>Mettur</option>
            <option value='Ooty'>Ooty</option>
            <option value='Perumanallur'>Perumanallur</option>
            <option value='Perundurai'>Perundurai</option>
            <option value='Pollachi'>Pollachi</option>
            <option value='Pondicherry'>Pondicherry</option>
            <option value='Salem'>Salem</option>
            <option value='Sathyamangalam'>Sathyamangalam</option>
            <option value='Sattur'>Sattur</option>
            <option value='Tiruchengodu'>Tiruchengodu</option>
            <option value='Tirumangalam'>Tirumangalam</option>
            <option value='Tirunelveli'>Tirunelveli</option>
            <option value='Tirupur'>Tirupur</option>
            <option value='Trichy'>Trichy</option>
            <option value='Udumalpet'>Udumalpet</option>
          </select>

          <h4>Date:
            <input name="date" id="date" type="datetime-local">
          </h4>
          <div class="booking-check-box"><br>
            <span>Bus Type</span><br>
            <label><input type="radio" name="Bus type" value="Non Ac"> Non AC </label>
            <label><input type="radio" name="Bus type" value="Ac"> AC </label>
            <label><input type="radio" name="Bus type" value="Sleeper with Ac"> Sleeper with AC </label>
          </div>
          <input type="submit" value="Check Availability" name="submit">

          
      </form>
     
    </div>
    

    
</body>

</html>