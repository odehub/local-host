
<!DOCTYPE html>
<html>
<body>
<div class="login-container">
	<h2>ADD CONTACT</h2>
	<form action="" method="POST">
		<div>
	 		<div class="input-box">
            <label><strong>ID :</strong></label>
            <i class="fa-solid fa-id-card-clip"></i>
            <input type="text" name="id">
			</div>

            <div class="input-box">
			<strong><label>NAME:</label></strong>
            <i class="fa-solid fa-signature"></i>
			<input type="text" name="Name">
		     <br>
            </div>

            <div class="input-box">
			<strong><label>EMAIL:</label></strong>
            <i class="fa-regular fa-envelope"></i>
			<input type="text" name="email">
            </div>

			<div class="input-box">
			<strong><label>PHONE:</label></strong>
            <i class="fa-solid fa-phone"></i>
			<input type="text" name="phone">
            </div>

            <div class="input-box">
			<label><strong>TITLE:</strong></label>
            <i class="fa-solid fa-thumbtack"></i>
			<input type="text" name="title">

			<div class="input-box">
			<label><strong>Created:</strong></label>
            <i class="fa-solid fa-thumbtack"></i>
			<input type="text" name="created">

			<br>
			<input type="submit" name="submit" value="Submit"> 
	        
			</div>
		</div>

	</form>

	<style>
		body {
    font-family: Arial, sans-serif;
	display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
	background: url(https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg);
	background-repeat: no-repeat;

background-size: cover;


-webkit-animation: AnimateBG 20s ease infinite;
		animation: AnimateBG 20s ease infinite;
}

.login-container {
	border-radius: 50px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 100px;
	height: 580px;
    width: 600px;
    text-align: center;
	background-color: rgba(252, 252, 252, 0.8);
	
}

label{
    width: 100px;
    display: inline-block;
}
form.login-container .inputbox{
    width: calc(30% / 2 - 10px);
}

.login-container .input-box input{
    height: 25px;
    width: 50%;
}
input[type="text"] {
    margin: 10px;
}

label{
	color: black;
}

input[type="submit"] {
	padding: 20px 20px;
  font-size: 16px;
  background-color: red;
  color: white;
  border: none;
  margin: 10px;
  border-radius: 5px;
  cursor: pointer; /* Add a pointer cursor on hover */
}

/* Add a hover effect */
input[type="submit"]:hover {
  background-color: #45a049;
}



	</style>

    <script src="https://kit.fontawesome.com/78e8bf16a1.js" crossorigin="anonymous"></script>

</body>
</html>

<?php
	include "configure.php";

	// Create
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$Name = $_POST['Name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$title = $_POST['title'];
		$created = $_POST['created'];


		$sql = "INSERT INTO contact (id, Name, email, phone, title, created) VALUES ('$id', '$Name', '$email', '$phone', '$title', '$created')";

		$result = $conn->query($sql);

		if($result == TRUE){
			echo "NEW CONTACT ADDED!";
		}
		else{
			echo "ERROR!".$sql."<br>". $conn->error;
		}
	}

	// Read
	$sql = "SELECT * FROM contact";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<h2>CONTACTS</h2>";
		echo "<table border='1'>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Title</th>
					<th>created</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>";

		while($row = $result->fetch_assoc()) {
			echo "<tr>
					<td>".$row["id"]."</td>
					<td>".$row["Name"]."</td>
					<td>".$row["email"]."</td>
					<td>".$row["phone"]."</td>
					<td>".$row["title"]."</td>
					<td>".$row["created"]."</td>
					<td><a href='edit.php?id=".$row["id"]."'>Edit</a></td>
					<td><a href='delete.php?id=".$row["id"]."'>Delete</a></td>
				  </tr>";
		}

		echo "</table>";
	} else {
		echo "0 results";
	}

	// Close the database connection
	$conn->close();
?>

