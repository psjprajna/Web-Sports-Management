<!--< ?php

	$username = $_POST['u'];
	$password = $_POST['p'];
	$error = "";
	$success = "";

	if(isset($_POST['submit']))
	{
		if($username == 'admin')
		{
			if ($password == 'password')
			{
				$error = "";
				$success = "Welcome Admin";
			}
			else
			{
				$error = "Invalid Password";
				$success = "";
			}
		}
		else
		{
			$error = "Invalid Username";
			$success = "";
		}
	}
?>-->


<?php
$myusername = $_POST['u'];
$mypassword = $_POST['p'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jaff";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword'";
$result =$conn->query($sql);
$num_rows = mysqli_num_rows($result);
if($num_rows==1)
{

 echo'<script> window.location="Add Events.html"; </script> ';
//echo $num_rows;
}

else
{
	
echo '<script type="text/javascript">'; 
echo 'alert("Invalid username or password");'; 
echo 'window.location.href = "index.php";';
echo '</script>';  
	
}

$conn->close();
?>