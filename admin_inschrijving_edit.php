<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselbank Admin Inschrijvingen</title>
    <link rel="stylesheet" href="assets/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div id="container">
        <header>
            <figure>
                <a href="admin.php"><img src="assets/img/logo.png" alt="Voedselbank Logo"></a>
            </figure>
            <a id="menu">
                <i class="fa fa-bars"></i>
            </a>
        </header>
        <div id="content">
            <?php
            include("conn.php");

            if (isset($_POST["opslaan"])) {

                $voornaam = $_POST['voornaam'];
                $achternaam = $_POST['achternaam'];
                $achternaam = $_POST['achternaam'];
                $huisnummer = $_POST['huisnummer'];
                $postcode = $_POST['postcode'];
                $plaats = $_POST['plaats'];
                $emailadres = $_POST['emailadres'];


                $data = [
                    'voornaam' => $voornaam,
                    'achternaam' => $achternaam,
                    'achternaam' => $achternaam,
                    'huisnummer' => $huisnummer,
                    'postcode' => $postcode,
                    'plaats' => $plaats,
                    'emailadres' => $emailadres,
                    'id' => $_GET['id']
                ];
                $sql = "UPDATE inschrijving SET voornaam=:voornaam, achternaam=:achternaam, achternaam=:achternaam, huisnummer=:huisnummer, postcode=:postcode, plaats=:plaats, emailadres=:emailadres WHERE id=:id";
                $statement = $conn->prepare($sql);


                try {
                    $statement->execute($data);
                    echo "<p class='success'>Gegevens zijn succesvol opgeslagen</p>";
                } catch (PDOException $e) {
                    var_dump($data);
                }
            }

            if (isset($_GET['action']) && ($_GET['action'] == "edit") && isset($_GET['id'])) {
                $id = $_GET['id'];

                $stmt = $conn->prepare("SELECT * FROM inschrijving WHERE id=:id");
                $stmt->execute(['id' => $id]);
                $result = $stmt->fetch();
                $conn = null;

            ?>

                <form action="" method="post">
                    <label for="voornaam">Voornaam</label><br>
                    <input type="text" name="voornaam" value="<?php echo $result["voornaam"]; ?>"><br>

                    <label for="achternaam">Achternaam</label><br>
                    <input type="text" name="achternaam" value="<?php echo $result["achternaam"]; ?>"><br>

                    <label for="straat">Straat</label><br>
                    <input type="text" name="straat" value="<?php echo $result["straat"]; ?>"><br>

                    <label for="huisnummer">Huisnummer</label><br>
                    <input type="number" name="huisnummer" value="<?php echo $result["huisnummer"]; ?>"><br>

                    <label for="postcode">Postcode</label><br>
                    <input type="text" name="postcode" value="<?php echo $result["postcode"]; ?>"><br>

                    <label for="plaats">Plaats</label><br>
                    <input type="text" name="plaats" value="<?php echo $result["plaats"]; ?>"><br>

                    <label for="emailadres">emailadres</label><br>
                    <input type="email" name="emailadres" value="<?php echo $result["emailadres"]; ?>"><br><br>

                    <input type="submit" name="opslaan" value="Opslaan">
                </form>

            <?php


            }





            $conn = null;
            ?>

        </div>



    </div>
    <footer>
        <img src="assets/img/voedselbank.png" alt="Voedselbank">
    </footer>
    <div id="bottom">© 2021 Voedselbank Nederland – KvK 67822037 – ANBI – RSIN 857187016</div>

</body>

</html>