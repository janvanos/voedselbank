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
        <h1>Voedselbank</h1>
        <?php
        include("conn.php");
        $stmt = $conn->prepare("SELECT * FROM homepage");
        $stmt->execute();
        $result = $stmt->fetch();
        $conn = null;
        ?>
        <h3>Welkom op de homepagina van Voedselbank Nederland</h3>
        <p><?php echo $result["heading1"]; ?></p>
        <article><?php echo $result["content1"]; ?></article>
        <p><?php echo $result["heading2"]; ?></p>
        <article><?php echo $result["content2"]; ?></article>
        <a href="rekenhulp.php">Kom ik in aanmerking?</a>
    </div>
    <footer>
        <img src="assets/img/voedselbank.png" alt="Voedselbank">
    </footer>
    <div id="bottom">© 2021 Voedselbank Nederland - KvK 67822037 - ANBI - RSIN 857187016</div>

</body>

</html>