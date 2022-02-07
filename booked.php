
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kaves";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select *from `tickets` ORDER BY `from` DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
         $From=$row["from"];
         $To=$row["to"];
        $date=$row["date"];
        echo"<center><table>
        <tr>
          <td><h3> Ticket Booked</h3></td>
        </tr>
        <tr>
          <td>Tobias</td>
          <td>Linus</td>
        </tr>
      </table>
        </center>";
        
    }
} 

$conn->close();
?>

</body>
</html>