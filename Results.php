<?php
    
   include('connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Survey Data</title>
      <link rel="stylesheet" href="all.css">
    </head>
    <header>
    <a href="Survey.php"><button id="add">Complete A Survey?</button></a>
    </header>
    <body>
        <div class="contain">
       
           <center>
           <?php
              
              //SQL Queries
              $sum = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(user_id) AS total FROM responses"));
              $AVG = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND(AVG(age),0) AS avg FROM responses"));
              $oldest = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(age) AS maxAge FROM responses"));
              $youngest = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MIN(age) AS minAge FROM responses"));
              
              //Display after the queries
             
              echo'<table><tr><td>Total number of surveys: </td>';
              echo'<td>'. $sum['total'].'</td></tr>';
              echo'<tr><td>Average age:</td>';
              echo'<td>'.$AVG['avg'].'</td></tr>';
              echo'<tr><td>Oldest person who participated in survey: </td>';
              echo'<td>'.$oldest['maxAge'].'</td></tr>';
              echo'<tr><td>Youngest person who participated in survey: </td>';
              echo'<td>'.$youngest['minAge'].'</td></tr></table><br><br>';

            
              $pasta = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND((COUNT(food_choice)/ (SELECT COUNT(*) FROM responses)) * 100) AS pastaPercent FROM responses WHERE LOWER(food_choice) LIKE('%pizza%')"));
              $pizza = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND((COUNT(food_choice)/ (SELECT COUNT(*) FROM responses)) * 100) AS pizzaPercent FROM responses WHERE LOWER(food_choice) LIKE('%pasta%')"));
              $pap_wors = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND((COUNT(food_choice)/ (SELECT COUNT(*) FROM responses)) * 100) AS papPercent FROM responses WHERE LOWER(food_choice) LIKE('%pap and wors%')"));
              $chicken = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND((COUNT(food_choice)/ (SELECT COUNT(*) FROM responses)) * 100) AS chickenPercent FROM responses WHERE LOWER(food_choice) LIKE('%chicken stir fry%')"));
              $beef = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND((COUNT(food_choice)/ (SELECT COUNT(*) FROM responses)) * 100) AS beefPercent FROM responses WHERE LOWER(food_choice) LIKE('%beef stir fry%')"));
              $other = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ROUND((COUNT(food_choice)/ (SELECT COUNT(*) FROM responses)) * 100) AS otherPercent FROM responses WHERE LOWER(food_choice) LIKE('%other%')"));
              
              echo'<table><tr><td>Percentage of people who like Pizza: </td>';
              echo'<td>' .$pizza['pizzaPercent'].'% </td></tr>';
              echo'<tr><td>Percentage of people who like Pasta: </td>';
              echo'<td>'.$pasta['pastaPercent'].'% </td></tr>';
              echo'<tr><td>Percentage of people who like Pap and Wors: </td>';
              echo'<td>'.$pap_wors['papPercent'].'% </td></tr>';
              echo'<tr><td>Percentage of people who like Chicken stir fry: </td>';
              echo'<td>'.$chicken['chickenPercent'].'% </td></tr>';
              echo'<tr><td>Percentage of people who like Beef stir fry: </td>';
              echo'<td>'.$beef['beefPercent'].'% </td></tr>';
              echo'<tr><td>Percentage of people who like other foods: </td>';
              echo'<td>'.$other['otherPercent'].'% </td></tr></table><br><br>';


              $eatOut = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(eat_out) AS EatOut FROM responses WHERE eat_out BETWEEN 1 AND 2"));
              $watchMovies = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(watch_movies)AS watchMovie FROM responses WHERE watch_movies BETWEEN 1 AND 2"));
              $watchtv = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(watch_tv) AS watchTv FROM responses WHERE watch_tv BETWEEN 1 AND 2"));
              $listenRadio = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(listen_radio) AS listenRadio FROM responses WHERE listen_radio BETWEEN 1 AND 2"));
              echo'<table><tr><td>People like to eat out: </td>';
              echo'<td>'.$eatOut['EatOut'].'</td></tr>';
              echo'<tr><td>People like to watch movies: </td>';
              echo'<td>'.$watchMovies['watchMovie'].'</td></tr>';
              echo'<tr><td>People like to watch TV: </td>';
              echo'<td>'.$watchtv['watchTv'].'</td></tr>';
              echo'<tr><td>People like to listen to the radio:</td>';
              echo'<td>'.$listenRadio['listenRadio'].'</td></tr></table><br><br>';
          
            mysqli_close($conn);
        ?>
          
          <a href="Main.html"><button id="add">OK</button></a>
       
           </center>
        </div>
        
    </body>
</html>