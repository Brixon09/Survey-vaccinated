<?php
	include("db_connect.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>List of Vaccinated Students</title>
<style>
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
	margin: 100px 0;
	background: #F7ECDE;
	font-family: arial, sans-serif;
	width: 100%;
}
			
/*======= Header =======*/
header{
  z-index: 999;
  position: fixed;
  width: 100%;
  height: calc(5rem + 1rem);
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  transition: 0.5s ease;
  transition-property: height, background;
}

header.sticky{
  height: calc(2.5rem + 1rem);
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

header .nav-bar{
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 100px;
  transition: 0.3s ease;
}


.nav-bar .logo{
  color: black;
  font-size: 2em;
  font-weight: 700;
  letter-spacing: 2px;
  text-decoration: none;
  text-shadow: var(--text-shadow);
}

.navigation .nav-items a{
  color: black;
  font-size: 1.2em;
  text-decoration: none;
  text-shadow: var(--text-shadow);
  padding: 10px;
  background: #7DCE13;
  backdrop-filter: blur(10px);
  border-radius: 3px;
  font-weight: 700;
}
.nav-items a:hover{
  background: #5BB318;
  backdrop-filter: blur(10px);
  transition: .3s;
  color: crimson;
}

.navigation .nav-items a span{
  padding: 7px;

}
.navigation .nav-items a i{
  display: none;
}

.navigation .nav-items a:not(:last-child){
  margin-right: 45px;
}
			a{
				margin: -300px 0;
				text-decoration: none;
				color: black;
				background: #59CE8F;
				padding: 10px;
				border-radius: 2px;
				transition: 0.3s;
				
			}
			.id{
				width: 50px;
			}
			.address{
				width: 200px;
			}
			.sex{
				width: 50px;
			}
			a:hover{
				text-decoration: underline;
				transition: 0.3s;
				background: #7DCE13;
			}
			thead{
				background: #7DCE13;
				
			}
			thead th{
				padding: 8px;
				width: 120px;
			}
			tbody{
				background: #B2A4FF;
			}
		</style>
		
	</head>
	<body>
	<header>
    <div class="nav-bar">
      <b href="#" class="logo" target="">Students Vaccinated</b>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="add_record.php"><i class="uil uil-home"></i> <span>Add Records</span> </a>
        </div>
      </div>
    </div>
  </header>
		
		<table align = "center" border = "1" cellpadding = "5px">
			<thead>
				<tr>
					<th class="id" >ID</th>
					<th>Name</th>
					<th class="address">Address</th>
					<th class= "sex">Sex</th>
					<th>Vaccine</th>
					<th>Date</th>
				</tr>
		</thead>
			<tbody>
				
				<?php
					
					$sql = "SELECT * FROM tblsurvey";
					
					try {
						
						$result = $conn->prepare($sql);
						$result->execute();
						
						if($result->rowCount()>0){
							$i = 1;
							while($row = $result->fetch(PDO::FETCH_ASSOC)){
								echo "<tr>
									<td style='text-align: center;'>" . $i . "</td>
									<td style='text-align: center;'>" . $row["name"] . "</td>
									<td style='text-align: center;'>" . $row["address"] . "</td>
									<td style='text-align: center;'>" . $row["sex"] . "</td>
									<td style='text-align: center;'>" . $row["vaccine"] . "</td>
									<td style='text-align: center;'>" . $row["date"] . "</td>
								</tr>";
								$i++;
							}
							echo "<tr>
									<td colspan = '6'>Nothing Follows.</td>
								</tr>";
							
						} else {
							echo "<tr>
									<td colspan = '6'>No records found.</td>
								</tr>";
						}
					
					} catch(Exception $e){
						echo "Unexpected error has been occurred!" . $e->getMessage();
					}
				?>
				
			</tbody>
		</table>
	</body>
</html>