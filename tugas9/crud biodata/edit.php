<?php
	include_once("koneksi.php");
	if(isset($_POST['update']))
	{   
		$id = $_POST['id'];

		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];

		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',mobile='$mobile' WHERE id=$id");

		header("Location: index.php");
	}
?>

<?php
	$id = $_GET['id'];

	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

	while($user_data = mysqli_fetch_array($result))
	{
		$name = $user_data['name'];
		$email = $user_data['email'];
		$mobile = $user_data['mobile'];
	}
?>

<html>
	<head>  
		<title>1708561004_I Dewa Gede Rama Satya</title>
	</head>

	<body style="background-color:powderblue;">
		<a href="index.php">Halaman Utama</a>
		<br/><br/>

		<form name="update_user" method="post" action="edit.php">
			<table border="0">
				<tr> 
					<td>Nama</td>
					<td><input type="text" name="name" value=<?php echo $name;?>></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td><input type="text" name="email" value=<?php echo $email;?>></td>
				</tr>
				<tr> 
					<td>No. HP</td>
					<td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
					<td><input type="submit" name="update" value="Ubah"></td>
				</tr>
			</table>
		</form>
	</body>
</html>