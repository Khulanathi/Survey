<?php
    
   include('connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Survey</title>
        <meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="all.css">
      <script src="https://kit.fontawesome.com/ccec6b3bca.js" crossorigin="anonymous"></script>

    </head>
    <header>
    <a href="Main.html"><button id="add"><i class="fa-sharp fa-regular fa-house"></i> Back To Main</button></a>
    </header>
    <body>
        <form action="Survey.php" method="post" id="mysurvey">
            
            <div class="inputBarier">
                <h3>1. Personal Details</h3>
            </div>

            <div class="inputBarier">
                <div class="inputContainer">
                    <input type="text" name="name" class="inputs"  autocomplete= "off" placeholder= " " required />
                    <label for="name" class="labels"> First Name</label>
                </div>
            </div>

            <div class="inputBarier">
                <div class="inputContainer">
                    <input type="text" name="surname" class="inputs"  autocomplete= "off" placeholder= " " required />
                    <label for="surname" class="labels"> Surname</label>
                </div>
            </div>

            <div class="inputBarier">
                <div class="inputContainer">
                    <input type="tel" name="contact" class="inputs"  autocomplete= "off" placeholder= " " pattern="[0-9]{10}" required />
                    <label for="contact" class="labels"> Contact Number</label>
                </div>
            </div>

            <div class="inputBarier">
                <div class="inputContainer">
                    <input type="date" name="date" class="inputs"  autocomplete= "off" placeholder= " "  required />
                    <label for="date" class="labels">Date</label>
                </div>
            </div>

            <div class="inputBarier">
                <div class="inputContainer">
                    <input type="number" step = 1 name="age" class="inputs"  autocomplete= "off" placeholder= " " required />
                    <label for="age" class="labels"> Age</label>
                </div>
            </div>

            <div class="inputBarier">
                2. What is your favourite food? (You can choose more than 1 answer)
                <div class="list">
                    <label for="Pizza"><input type="checkbox"  name="foods[]" value="Pizza"> Pizza</label><br>
                    <label for="Pasta"><input type="checkbox"  name="foods[]" value="Pasta"> Pasta</label><br>
                    <label for="p&p"><input type="checkbox"  name="foods[]" value="Pap and Wors"> Pap and Wors</label><br>
                    <label for="chickenStir"><input type="checkbox"  name="foods[]" value="Chicken stir fry"> Chicken stir fry</label><br>

                    <label for="BeefStir"><input type="checkbox"  name="foods[]" value="Beef stir fry"> Beef stir fry</label><br>
                    <label for="Other"><input type="checkbox"  name="foods[]" value="Other"> Other</label><br>
                </div>
            </div>

            <div class="inputBarier">
                3. On a scale of 1 to 5 indicate whether you strongly agree to strongly disagree
                <table>
                    <thead>
                        <tr>
                            <th> </th>
                            <th>Strongly Agree <br>(1)</th>
                            <th>Agree <br>(2)</th>
                            <th>Neutral <br>(3)</th>
                            <th>Disagree <br>(4)</th>
                            <th>Strongly disagree <br>(5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>I like to eat out</td>
                            <td><input type="radio" name="option" value=1 required></td>
                            <td><input type="radio" name="option" value=2 required></td>
                            <td><input type="radio" name="option" value=3 required></td>
                            <td><input type="radio" name="option" value=4 required></td>
                            <td><input type="radio" name="option" value=5 required></td>
                        </tr>

                        <tr>
                            <td>I like to watch movies</td>
                            <td><input type="radio" name="option1" value=1 required></td>
                            <td><input type="radio" name="option1" value=2 required></td>
                            <td><input type="radio" name="option1" value=3 required></td>
                            <td><input type="radio" name="option1" value=4 required></td>
                            <td><input type="radio" name="option1" value=5 required></td>
                        </tr>

                        <tr>
                            <td>I like to watch TV</td>
                            <td><input type="radio" name="option2" value=1 required></td>
                            <td><input type="radio" name="option2" value=2 required></td>
                            <td><input type="radio" name="option2" value=3 required></td>
                            <td><input type="radio" name="option2" value=4 required></td>
                            <td><input type="radio" name="option2" value=5 required></td>
                        </tr>

                        <tr>
                            <td>I like to listen to the radio</td>
                            <td><input type="radio" name="option3" value=1 required></td>
                            <td><input type="radio" name="option3" value=2 required></td>
                            <td><input type="radio" name="option3" value=3 required></td>
                            <td><input type="radio" name="option3" value=4 required></td>
                            <td><input type="radio" name="option3" value=5 required></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="inputBarier">
                <input type="submit" name="add" id="add"/>
            </div>
        </form>
        <?php
            if(isset($_POST['add'])){

                
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $age = $_POST['age'];
                $contact = $_POST['contact'];
                $date = $_POST['date'];
                $foods = $_POST['foods'];
                $EatOut = $_POST['option'];
                $watchMovies = $_POST['option1'];
                $watchTV = $_POST['option2'];
                $radio = $_POST['option3'];

                
                if (!empty($name) && !empty($surname) && !empty($age) && !empty($foods) && !empty($contact) && !empty($date) && !empty($EatOut) && !empty($watchMovies) && !empty($watchTV) && !empty($radio)){
                    $foodChoices = implode(', ', $foods);
                    $sql ="INSERT INTO responses (name,surname,age,contact_nbr,date,food_choice,eat_out,watch_movies,watch_tv,listen_radio ) VALUES ('$name','$surname','$age','$contact', '$date', '$foodChoices', '$EatOut', '$watchMovies','$watchTV','$radio')";
                    $result = mysqli_query($conn, $sql);

                    if($result){
                        echo "<script>alert('Survey Successfully submited. THANK YOU!');</script>";
                        mysqli_close($conn);
                    }else{
                        
                        echo "<script>alert('Error: Something went wrong please try again.');</script>";
                    }

                }else{
                    echo "<script>alert('Error: Favourite food NOT SELECTED.');</script>";
                
                }

            }
            mysqli_close($conn);
        ?>
        <!-- <script>
            document.getElementById('mysurvey').addEventListener('input', function () {
                var inputs = document.querySelectorAll('#mysurvey input');
                var submitButton = document.getElementById('add');
                var hasValue = false;

                for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value) {
                    hasValue = true;
                    break;
                }
                }

                submitButton.disabled = !hasValue;
            });
        </script> -->
    </body>
</html>