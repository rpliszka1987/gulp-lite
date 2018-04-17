<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<body>
    <?php
        var_dump($_POST);
    ?>


    <div>
        <form action="#" method="post">
            <label for=""> First Name</label>
            <input type="text" name="first_name">
            <br>
            <label for=""> Last Name</label>
            <input type="text" name="last_name">
            <br>
            <label for=""> Email</label>
            <input type="email" name="email" id="email">
            <br>
            <label for=""> Apple</label>
            <input type="radio" name="fruit" value="Apple">
            <br>
            <label for=""> Orange</label>
            <input type="radio" name="fruit" value="Orange">
            <br>
            <label for=""> Pear</label>
            <input type="radio" name="fruit" vaule="Pear">
            <br>
            <label for=""> Basketball</label>
            <input type="checkbox" name="sport" value="Basketball">
            <br>
            <label for=""> Baseball</label>
            <input type="checkbox" name="sport" value="Baseball">
            <br>
            <label for=""> Soccer</label>
            <input type="checkbox" name="sport" vaule="Soccer">
            <br>
            <textarea name="Description" id="description" cols="30" rows="10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sed animi laborum esse magnam quas aspernatur vel quis velit cumque! Totam maxime in voluptatum praesentium eveniet corrupti quam labore et?</textarea>
            <br>
            <br>

            <input type="submit" value="send">
        </form>
    </div>

    <script> 
    
        

        jQuery( "#email" ).change(function() {
            var email = jQuery("#email").val(); //gets value of email value
            console.log("email", email);
        });

    </script>
</body>
</html>