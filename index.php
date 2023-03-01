<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    
        <?php
    $connection = new mysqli("localhost", "root","", "rejstracja");

    if($connection->connect_error) {
        die("Połączenie nieudane: " . $connection->connect_error);
    }
    
    ?>
    <div class="formularz">
        <div class="box">
                <div class="box-form">

                <h2>Utwórz konto</h2>
                <form action="index.php" method="post">
                    Wprowadź swoje imie <br>
                    <input type="text" name="name" id="" placeholder="Jan" required> <br>
                    Wprowadź swoje nazwisko <br>
                    <input type="text" name="surname" id="" placeholder="Kowlaski" required><br>
                    Wprowadź e-mail <br>
                    <input type="email" name="email" id="" placeholder="jankowalski@gmail.com" required><br>
                    Wprowadź swoje hasło <br>
                    <input type="password" name="password" id="" placeholder="" required>
                    <br>
                    <input type="submit" value="Utwórz konto">
                </form>
            </div>
                
            <div class="img">
                </div>
        </div>
            
    </div>
    <?php 
    if(isset($_POST['name']) && isset($_POST['surname'])&& isset($_POST['email']) && isset($_POST['password'])){

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sqlInput = "INSERT INTO `logingpage`(`email`, `password`, `name`, `surname`) VALUES ('$email','$password','$name','$surname')";
        
        
        if ($connection->query($sqlInput) === TRUE) {
            echo "Rekord dodany poprawnie";
        } else {
            echo "Błąd: " . $sqlInput . "<br>" . $connection->error;
        }
    }
    $connection -> close();
    ?>


</body>
</html>