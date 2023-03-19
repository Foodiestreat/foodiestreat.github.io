<!DOCTYPE html>
<html lang="en">
<head>
    <title>Foodiestreat</title>
    <link rel="stylesheet" href="css/feedback20s.css">
    <link rel="icon" type="image/x-icon" href="images/restauranticon.jpg">
</head>
<body>
<header>
		
		<nav>
			<ul>
				<li><a href="admindashbord.html">Back</a></li>
				
			</ul>
		</nav>
	</header>
    <center><h1>Customer Feedback</h1></center>
    <div class="container">
    <table>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email id</th>
            <th>Food Quality</th>
            <th>Service Quality</th>
            <th>Cleanliness</th>
            <th>Overall Experience</th>
            <th>Comments</th>
        </tr>
        <?php 
          $conn = mysqli_connect("localhost","root","","Feedback");
          if($conn -> connect_error){
            die("Connection failed:".$conn-> connect_error);
          }

          $sql = "SELECT firstname,lastname,mailid,f_quality,service_q,cleanliness,experience,comments from feedback";
          $result = $conn-> query($sql);

          if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo "<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["mailid"]."</td><td>"
                .$row["f_quality"]."</td><td>".$row["service_q"]."</td><td>".$row["cleanliness"]."</td><td>".$row["experience"]."</td><td>"
                .$row["comments"]."</td></tr>";
            }
            echo "</table>";
          }
          else{
            echo "No data found!";
          }
          $conn-> close();
        ?>
    </table>
    </div>
</body>
</html>

