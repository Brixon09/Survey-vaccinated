<?php
	
	if(isset($_POST["name"])){
		
		$name = $_POST["name"];
		$address = $_POST["address"];
		$sex = $_POST["sex"];
		$vaccine = $_POST["vaccine"];
		$date = $_POST["date"];
		
		$sql = "INSERT INTO tblsurvey(
										name,
										address,
										sex,
										vaccine,
										date
									) VALUES(
										:name,
										:address,
										:sex,
										:vaccine,
										:date
									)";
		$values = array(
					":name" => $name,
					":address" => $address,
					":sex" => $sex,
					":vaccine" => $vaccine,
					":date" => $date,
		);
		
		include("db_connect.php");
		
		$result = $conn->prepare($sql);
		$result->execute($values);
		
		if($result->rowCount()>0){
			echo "<h3 style= 'display: flex; justify-content: center; align-items: center; font-size: 25px;'>Record has been saved on tblsurvey</h3>";
			?>
            <img src="RedHorse.png"><?php
		} else {
			echo "No record has been saved!";?>
            <img src="bearbrand.png"><?php
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Record</title>

		<style>
			img{
				display: block;
				margin: 0 auto 10px auto;				
				
			}
:root{
  --white-color: #fff;
  --dark-color: #222;
  --body-bg-color: #fff;
  --section-bg-color: black;
  --navigation-item-hover-color: #3b5378;

  --text-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
  --box-shadow: 0 5px 25px rgb(0 0 0 / 20%);

  --scroll-bar-color: #fff;
  --scroll-thumb-color: rgba(0, 0, 0, 0.678);
  --scroll-thumb-hover-color: #454f6b;
}

/*======= Scroll bar =======*/
::-webkit-scrollbar{
  width: 11px;
  background: var(--scroll-bar-color);
}

::-webkit-scrollbar-thumb{
  width: 100%;
  background: var(--scroll-thumb-color);
  border-radius: 2em;
}

::-webkit-scrollbar-thumb:hover{
  background: var(--scroll-thumb-hover-color);
}
			body{
				width: 100%;
				margin: 100px 0;
				background: #F7ECDE;
				font-family: arial, sans-serif;
				
			}
			form{
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			table{
				width: 25%;
				padding: 10px;
				border: 1px solid;
				background: #54BAB9;
				border-radius: 5px;
				height: 230px;
			}
			label{
				padding: 10px 0;
				margin: 5px;
				
			}
			select{
				width: 100px;
			}
			select , option{
				border-radius: 5px;
				height: 23px;
			}
			.submit{
				padding: 4px 10px;
				
			}
		</style>
	</head>
	<body>
		<form action = "add_record.php" method = "post">
			<table>
				<tr>
					<td><label>Name:</label></td>
					<td><input type = "text" name = "name"></td>
				</tr>
				<tr>
					<td><label>Address:</label></td>
					<td><input type = "text" name = "address"></td>
				</tr>
				<tr>
					<td><label>Sex:</label></td>
					<td>
						<select name = "sex">
							<option type="radio" value = "">Select</option>
							<option type="radio" value = "Male">Male</option>
							<option type="radio" value = "Female">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Vaccine:</label></td>
					<td>
						<select name = "vaccine">
							<option value = "">Select</option>
							<option type="radio" value = "Pfizer">Pfizer</option>
							<option type="radio" value = "Aztrazenica">Astra</option>
							<option type="radio" value = "Sinovac">Sinovac</option>
							<option type="radio" value = "Moderna">Moderna</option>
							<option type="radio" value = "Sputnik">Sputnik</option>
							<option type="radio" value = "Johnson">Johnson</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Date:</label></td>
					<td><input type = "text" name = "date" placeholder= "YY-MM-DD"></td>
				</tr>
				<tr>
					<td  colspan = "2" align = "right">
						<input class="submit" name= "submit" type = "submit" value = "Save">
						
					</td>
				</tr>
			</table>
		</form>
		

	</body>
</html>