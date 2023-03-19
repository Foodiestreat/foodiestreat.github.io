
 <!DOCTYPE html>
 <html lang="en" title="Coding design">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Foodiestreat</title>
     <link rel="stylesheet" href="css/feedback_srver.css">
     <link rel="icon" type="image/x-icon" href="images/restauranticon.jpg">
     
 </head>
 
 <body>
     <main class="table">
         <section class="table__header">
             <h1>Customer's Feedback</h1>
             <a href="index.html" class="button">Home</a>
             <div class="input-group">
                 <input type="search" placeholder="Search Data...">
                 <img src="images/search.jpeg" alt="">
             </div>
             <div class="export__file">
                 <label for="export-file" class="export__file-btn" title="Export File"></label>
                 <input type="checkbox" id="export-file">
                 
             </div>
         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                         <th>Fristname</th>
                         <th> Lastname </th>
                         <th> Email id </th>
                         <th> Food Quality </th>
                         <th> Service Quality </th>
                         <th> Cleanliness </th>
                         <th> Overall Experience </th>
                         <th> Comments </th>
                     </tr>
                 </thead>
        
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
         </section>
     </main>
 </body>
 
 </html>