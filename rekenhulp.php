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
        <h3 class="align_left">Vul de 6 vragen in die hieronder staan.<br>
            Klik daarna op de button "Kom ik in aanmerking?".<br>
            De berekening en de conclusie komen te voorschijn.</h3>
            <form action="">
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
                <input type="submit" value="Kom ik in aanmerking?">
            </form>
        <footer>
            <img src="assets/img/voedselbank.png" alt="Voedselbank">
        </footer>
        <div id="bottom">© 2021 Voedselbank Nederland – KvK 67822037 – ANBI – RSIN 857187016</div>
    </div>
</body>

</html>