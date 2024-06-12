<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselbank Admin Homepage Teksten</title>
    <link rel="stylesheet" href="assets/css/style_admin.css">
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
        <div id="content">
        <?php
include("conn.php");
if(isset($_POST["opslaan"])){

    $heading1 = $_POST['heading1'];
    $content1 = $_POST['content1'];
    $heading2 = $_POST['heading2'];
    $content2 = $_POST['content2'];


    include("conn.php");
    $data = [
        'heading1' => $heading1,
        'content1' => $content1,
        'heading2' => $heading2,
        'content2' => $content2,
        'id' => 1
    ];
    $sql = "UPDATE homepage SET heading1=:heading1, content1=:content1, heading2=:heading2, content2=:content2 WHERE id=:id";
    $statement = $conn->prepare($sql);


    try {
        $statement->execute($data);
        echo "<p class='success'>Gegevens zijn succesvol opgeslagen</p>";
    } catch (PDOException $e) {
       var_dump($data);
    }
}


$stmt = $conn->prepare("SELECT * FROM homepage");
$stmt->execute();
$result = $stmt->fetch();
$conn = null;
        ?>
<form action="" method="post">
    <label for="heading1">Heading1</label><br>
    <textarea name="heading1"><?php echo $result["heading1"];?></textarea><br>

    <label for="content1">Content 1</label><br>
    <textarea name="content1"><?php echo $result["content1"];?></textarea><br>

    <label for="heading2">Heading2</label><br>
    <textarea name="heading2"><?php echo $result["heading2"];?></textarea><br>

    <label for="content2">Content 2</label><br>
    <textarea name="content2"><?php echo $result["content2"];?></textarea><br>
    <input type="submit" name="opslaan" value="Opslaan">
</form>
        </div>
        


    </div>
    <footer>
            <img src="assets/img/voedselbank.png" alt="Voedselbank">
        </footer>
        <div id="bottom">© 2021 Voedselbank Nederland – KvK 67822037 – ANBI – RSIN 857187016</div>

</body>

</html>