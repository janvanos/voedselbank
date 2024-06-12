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

            if (isset($_GET['action']) && ($_GET['action'] == "delete")) {

                $sql = "DELETE FROM inschrijving WHERE id=:deleteid";
                $data = [
                    'deleteid' => $_GET['id']
                ];
                $statement = $conn->prepare($sql);
                try {
                    $statement->execute($data);
                    echo "<p class='success'>Record is verwijderd</p>";
                } catch (PDOException $e) {
                }
            }
            if (isset($_POST["opslaan"])) {

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


            $stmt = $conn->prepare("SELECT * FROM inschrijving");
            $stmt->execute();
            $result = $stmt->fetchAll();
            echo "<table border='1'>";
            foreach ($result as $row) {
                echo "<tr><td style='width: 50px'>" . $row['id'] . "</td><td style='width: 100px'>" . $row['voornaam'] . "</td><td style='width: 200px'>" . $row['achternaam'] . " </td><td><a href='admin_inschrijving_edit.php?action=edit&id=" . $row['id'] . "'>Edit</a></td><td><a href='admin_inschrijvingen.php?action=delete&id=" . $row['id'] . "'>Delete</a></td></tr>";
            }
            echo "</table>";



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