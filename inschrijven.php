<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselbank</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>
    <div id="container">
        <header>
            <figure>
                <img src="assets/img/logo.png" alt="Voedselbank Logo">
            </figure>
            <a id="menu">
                <i class="fa fa-bars"></i>
            </a>
        </header>
        <figure>
            <img src="https://placehold.co/375x154" alt="Voedselbank">
        </figure>
        <h1>Rekenhulp</h1>
        <?php


        if (isset($_POST['inschrijven'])) {

            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $straat = $_POST['straat'];
            $huisnummer = $_POST['huisnummer'];
            $postcode = $_POST['postcode'];
            $plaats = $_POST['plaats'];
            $email = $_POST['email'];


            include("conn.php");
            $data = [
                'voornaam' => $voornaam,
                'achternaam' => $achternaam,
                'straat' => $straat,
                'huisnummer' => $huisnummer,
                'postcode' => $postcode,
                'plaats' => $plaats,
                'email' => $email
            ];
            $sql = "INSERT INTO inschrijving (voornaam, achternaam, straat, huisnummer, postcode, plaats, emailadres, inschrijfdatum) VALUES (:voornaam, :achternaam, :straat, :huisnummer, :postcode, :plaats, :email, NOW())";
            $statement = $conn->prepare($sql);


            try {
                $statement->execute($data);
                echo "<p class='advies'>U bent succesvol ingeschreven voor Voedselbankhulp.</p>";
            } catch (PDOException $e) {
                if ($statement->errorCode() === "23000") {
                    echo "<p class='advies'>U bent al ingeschreven, <a href='rekenhulp.php'>klik hier</a> om het opnieuw te proberen, of neem <a href='https://voedselbankennederland.nl/contact/'>contact</a> op voor hulp.</p>";
                };
            }
        }
        ?>
    </div>
    <footer>
            <img src="assets/img/voedselbank.png" alt="Voedselbank">
        </footer>
        <div id="bottom">© 2021 Voedselbank Nederland – KvK 67822037 – ANBI – RSIN 857187016</div>
</body>

</html>