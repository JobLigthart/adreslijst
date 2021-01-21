<?php $title="Adres Opdracht"?>
<?php include "includes/header.php"?>
<body>
        <form class="adreslijst-form" action="" method="post"> 
            <input type="text" name="voornaam" id="voornaam" placeholder="Enter first name..." required><br>
            <input type="text" name="achternaam" id="achternaam" placeholder="Enter last name..." required><br>
            <input type="text" name="adress" id="adress" placeholder="Enter adress..." required><br>
            <input type="text" name="huisnummer" id="huisnummer" placeholder="Enter house number..." required><br>
            <input type="text" name="woonplaats" id="woonplaats" placeholder="Enter residence..." required><br>
            <input type="text" name="postcode" id="postcode" placeholder="Enter postcode..." required><br>

            <input type="submit" name="submit" value="Opslaan">
        </form>

        <div class="adres-display">
            <form class="adreslijst-form" action="" method="post">
                <input type="submit" name="ophalen" value="Ophalen">
            </form>
        </div>
        <?php 

            //Database Connection//
            $host = "localhost";
            $dbname = "adreslijst";
            $username = "root";
            $password = "";

            $connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
            $db = new PDO($connectStr, $username, $password);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            //Confirms if button has been pressed and submits to database//
            if(isset($_POST["submit"])) {
                $voornaam = $_POST["voornaam"];
                echo $voornaam;
                $achternaam = $_POST["achternaam"];
                echo $achternaam;
                $adress = $_POST["adress"];
                echo $adress;
                $huisnummer = $_POST["huisnummer"];
                echo $huisnummer;
                $woonplaats = $_POST["woonplaats"];
                echo $woonplaats;
                $postcode = $_POST["postcode"];
                echo $postcode;
                $sql = "INSERT INTO adres (voornaam, achternaam, adress, huisnummer, woonplaats, postcode) 
                VALUES (:voornaam, :achternaam, :adress, :huisnummer, :woonplaats, :postcode)";
                $params = array(":voornaam" => $voornaam, ":achternaam" => $achternaam, ":adress" => $adress, ":huisnummer" => $huisnummer, ":woonplaats" => $woonplaats, ":postcode" => $postcode);
            
                $sth = $db->prepare($sql);
                $sth->execute($params);
            
            }

            
            if(isset($_POST["ophalen"])) {

                $sql = "SELECT * FROM adres";
                $sth = $db->prepare($sql);
                $sth->execute();

                while($row = $sth->fetch()) {
                    $dbvoornaam = $row["voornaam"];
                    $dbachternaam = $row["achternaam"];
                    $dbadress = $row["adress"];
                    $dbhuisnummer = $row["huisnummer"];
                    $dbwoonplaats = $row["woonplaats"];
                    $dbpostcode = $row["postcode"];
                    echo "U heet $dbvoornaam $dbachternaam en u woont op $dbadress $dbhuisnummer in $dbwoonplaats en uw postcode is $dbpostcode.";
                }
            }


            
        

        ?>
</body>
</html>