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
                <a href="index.php"><img src="assets/img/logo.png" alt="Voedselbank Logo"></a>
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


        if (isset($_POST['bereken'])) {
            $leden = $_POST['leden'];
            $inkomsten = $_POST['inkomsten'];
            $inkomsten2 = $_POST['inkomsten2'];
            $uitgaven = $_POST['uitgaven'];
            $uitgaven2 = $_POST['uitgaven2'];
            $voorwaarden = $_POST['voorwaarden'];
            $normbedrag = 0;
            $voedselbankhulp = false;

            include("conn.php");
            $stmt = $conn->prepare("SELECT aantal_leden, normbedrag FROM normbedragen WHERE aantal_leden = :leden");
            $stmt->bindParam('leden', $leden, PDO::PARAM_INT);
            // execute the query  
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {
                $normbedrag = round($value['normbedrag'], 0);
            }
            $totaalinkomsten = $inkomsten + $inkomsten2;
            $totaaluitgaven = $uitgaven + $uitgaven2;
            $totaalbudget = round($totaalinkomsten - $totaaluitgaven, 0);
            if ($totaalbudget < $normbedrag) {
                $voedselbankhulp = true;
            }
            if ($voedselbankhulp == true) {
                echo "<p class='advies'>U komt <span class='nadruk'>WELLICHT</span> in aanmerking voor een voedselpakket.<br>
    Vul onderstaand formulier in om in aanmerking te komen. <br>
    Na invulling van het formulier wordt contact met u opgenomen.
    </p>";

        ?>
                <form action="inschrijven.php" method="post" id="inschrijven">
                    <input type="text" name="voornaam" required placeholder="Voornaam">
                    <input type="text" name="achternaam" required placeholder="Achternaam">
                    <input type="text" name="straat" required placeholder="Straat">
                    <input type="number" name="huisnummer" required placeholder="Huisnummer">
                    <input type="text" name="postcode" required placeholder="Postcode">
                    <input type="text" name="plaats" required placeholder="Plaats">
                    <input type="email" name="email" required placeholder="E-mailadres">
                    <input type="submit" name="inschrijven" value="Aanmelden">
                </form>

            <?php

            } else {
                echo "<p class='advies'>U komt <span class='nadruk red'>NAAR ALLE WAARSCHIJNLIJKHEID NIET</span> in aanmerking voor een voedselpakket. Klik <a href='https://www.voedselbankutrecht.nl/' targer='_blank'>hier</a> om te kijken welke voedselbank bij u in de buurt is om nader te bepalen of we u van dienst kunnen zijn.";
            }
            $conn = null;
        } else {
            ?>
            <h3 class="align_left">Vul de 6 vragen in die hieronder staan.<br>
                Klik daarna op de button "Kom ik in aanmerking?".<br>
                De berekening en de conclusie komen te voorschijn.</h3>
            <form action="" method="POST">
                <p>1. Uit hoeveel leden (volwassenen en kinderen) bestaat uw huishouden? (verplicht)</p>
                <input type="number" name="leden" required min="1" placeholder="Vul hier het aantal in"><br>

                <p>2: Hoeveel netto inkomsten (Loon/salaris/uitkering/AOW) heeft u in uw huishouden? (verplicht)</p>
                <input type="number" name="inkomsten" required placeholder="Vul hier het aantal in"><br>

                <p>3: Hoeveel overige inkomsten (bijvoorbeeld huurtoeslag, zorgtoeslag, alimentatie, partnertoeslag, overige toeslagen, Kind Gebonden Budget, etc, maar geen kindertoeslag meetellen) ontvangt uw huishouden per maand? (verplicht)</p>
                <input type="number" name="inkomsten2" required placeholder="Vul hier het aantal in"><br>

                <p>4: Hoeveel uitgaven (vaste lasten, bijvoorbeeld huur/hypotheek, energie (Gas/Licht) en water, zorgverzekering incl. eigen risico, overige noodzakelijke verzekeringen (bijvoorbeeld WA, opstal), gemeentelijke- en waterschapsbelastingen, schuldenaflossing (NIET die aan de familie) heeft uw huishouden per maand? (verplicht)</p>
                <input type="number" name="uitgaven" required placeholder="Vul hier het aantal in"><br>

                <p>5: Hoeveel overige uitgaven (bijvoorbeeld persoonlijke verzorging, TV/telefoon/internet, openbaar vervoer) heeft uw huishouden per maand? (verplicht)</p>
                <input type="number" name="uitgaven2" required placeholder="Vul hier het aantal in"><br>

                <p>6: Bent u het eens met de volgende voorwaarden (verplicht)?:</p>
                <input type="checkbox" name="voorwaarden" required>Ja mee eens
                <br><br>
                <input type="submit" name="bereken" value="Kom ik in aanmerking?">
            </form>
        <?php
        }
        ?>
    </div>
    <footer>
        <img src="assets/img/voedselbank.png" alt="Voedselbank">
    </footer>
    <div id="bottom">© 2021 Voedselbank Nederland – KvK 67822037 – ANBI – RSIN 857187016</div>
</body>

</html>