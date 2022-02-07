<?php



session_start();
$_SESSION['superhero'] = "batman";

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','kaves');

// get the post records

if (isset($_REQUEST['F_place'])) {
    // removes backslashes
    $name = stripslashes($_REQUEST['F_place']);
    //escapes special characters in a string

    $password = stripslashes($_REQUEST['T_place']);
    $date = stripslashes($_REQUEST['date']);
$_SESSION['superhero'] = "batman";
}
$_SESSION['name'] = $name;
$_SESSION['password'] = $password;
$_SESSION['date'] = $date;
// database insert SQL code
$sql = "INSERT INTO tickets( `From`,`To`,`date`) VALUES ('$name','$password','$date')";

// insert in database 
$sql = mysqli_query($con, $sql);

$sql1 = "SELECT * FROM suggestions where  Place = '$password'";
$result = $con->query($sql1);


if($sql)
{
    echo "<center><br><br><h1 >Ticket Booked <h1>";
    echo "<table >
  <tr>
    <th>From:</th>
    <td>".$name." </td>
  </tr>
  <tr>
    <th>To:</th>
    <td>".$password."</td>
  </tr>
  <tr>
    <th>Date:</th>
    <td>".$date."</td>
  </tr>
</table></center>";

}
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<center><br><h2><b> Places To Visit in ". $row["Place"]. " - :</b></h2> <br>". $row["Tourist_spot1"]. " :-:" . $row["Tourist_spot2"] . ":-: " . $row["Tourist_spot3"]. ":-: " . $row["Tourist_spot4"] .  ":-: " . $row["Tourist_spot5"] ."<br></center>";
  }
} else {
  echo "0 results";
}


?>