<?php
    session_start();	
    if(isset($_SESSION["login"]))
	{
        header("Location: index.php");
        exit;
    }
    $conn = mysqli_connect("localhost","root","","tugas12_prakpbo");
    if(isset($_POST["login"]))
	{
        $username=$_POST["username"];
        $password=$_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username= '$username' AND password= '$password' ");
        if(mysqli_num_rows($result) === 1)
		{
            $row=mysqli_fetch_assoc($result);
            if($row["username"]=="admin")
			{
                $_SESSION["user"]="admin";
            }
			else
			{
                $_SESSION["user"]="user";
            }
            $_SESSION["login"]=true;
            header("Location: index.php");
            exit;
        }
        $error=true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
	<head>
		<title>1708561004_I Dewa Gede Rama Satya</title>
		<style>
			#frame
			{
				position: relative;
				width: 400px;
				border: 2px solid blue;
				border-radius: 27px;
				background-color: #AED6F1;
				margin: 0px auto;
				padding: 20px 20px 40px 20px;  
			}
		
			#batas
			{
				margin: 0 auto;
				width: 1000px;
				height: auto;
			}
			#atas
			{
				width: 700px;
				height: 250px;
				float: right;
				position: relative;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
			}
			#atas p
			{
				position: absolute;
				color: white;
				
				font-size: 20px;
				top: 8px;
				right: 16px;
			}
			#sidebar
			{
				float: left;
				width: 300px;
				height:auto;
			}
			#sidebar img
			{
				width: 300px;
			}
			#menu
			{
				margin-top: 7px;
				width: 700px;
				height:43px;
				float: right;
				box-shadow: 1px 2px 10px rgba(0, 0, 0, .5);
			}
			#menu ul
			{
				border-radius: 3px;
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #5AC8FF;
			}
			#menu li
			{
				float: left;
			}
			#menu li a:hover
			{
				background-color: #5AC8FF;
			}
			#menu li a
			{
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}
			#isi
			{
				margin-top: 8px;
				margin-bottom: 8px;
				width: 700px;
				height: 550px;
				float: right;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
				background: white;
				border-radius: 8px;
			}
			#isi h1
			{
				margin-left: 10px;
			}
			#isi p
			{
				margin-left: 25px;
				margin-right: 10px;
			}
			.populer p
			{
				color: white;
				padding: 10px;
				text-align: center;
			}
			#sidebar ul
			{
				border-radius: 8px;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
				list-style-type: none;
				margin: 0;
				padding: 0;
				width: 250px;
				background-color: #ffffff;
				margin-left: 30px;
			}
			#sidebar li a
			{
				display: block;
				color: #000;
				padding: 8px 16px;
				border-bottom-style: dotted;
				text-decoration: none;
				border-bottom-color: #5AC8FF;
				border-bottom-width: thin;				
			}
			#sidebar li a:hover
			{
				background-color: #5AC8FF;
				color: white;
			}
			.galeri
			{
				position: relative;
				margin-left: 25px;
				display: inline-block;
			}
			.galeri p a
			{
				color: black;
				text-decoration: none;
			 
			}
			.galeri img
			{
				margin-right: 7px;
				margin-left: 10px;
				height: 220px;
				width: 170px;
			}
			
			input[type = text] 
			{
				position: relative;
				display: block;
				width: 90%;
				margin: 5px auto;
				font-size: 14px;
				padding: 10px;
				box-shadow: 4px 0px 12px white outset;
			}
			
			input[type = password] 
			{
				position: relative;
				display: block;
				width: 90%;
				margin: 5px auto;
				font-size: 14px;
				padding: 10px;
				box-shadow: 4px 0px 12px white outset;
			}

			input[type=button]
			{
				background: white;
				width: 20%;
				font-size: 20px;
				border-radius: 7px;
				margin-left: 12px;
				margin-top: 7px;
			}
			input[type=button]:active
			{
				background-color: #00A2F8;
				box-shadow: 0 2px #6291AA;
				transform: translateY(2px);
			}
			input[type=button]:hover
			{
				background-color: #3E8CB6;
				color: white;
			}
			
			#footer{
				width: auto;
				height: 70px;
				background-color: #5AC8FF;
				border-radius: 8px;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
			}
			#footer p {
				color:white;
				padding: 30px ;
				text-align: center;
			}
			#clear{
				clear: both;
			}
			.populer{
				background-color: #5AC8FF;
				width: 250px;
				margin-left: 30px;
				border-radius: 8px;
				box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
			}  
		</style>
	</head>

    <body>
        <h1><center><b>LOGIN</center></b></h1>	
		<br>
		<div id='frame'>	  
			<form action="" method="post">
				<input type="text" name="username" id="username" placeholder="Masukkan Username Anda">
				<input type="password" name="password" id="password" placeholder="Masukkan Password Anda">
				<br>
				<?php if(isset($error)): ?>
					<center><p style="color: red; font-style: bold;">TERJADI KESALAHAN!</p></center>
				<?php endif; ?>	
				<center><button type="submit" name="login">Masuk</button></center>
			</form>
		</div>
        <div class="footer">
			<div id="clear"></div>
			<div id="footer">
				<p align="center"><font size="2"><b>©Copyright 2020. All Right Reserved <br> I Dewa Gede Rama Satya</b></font></p>
		</div>	
    </body>
</html>