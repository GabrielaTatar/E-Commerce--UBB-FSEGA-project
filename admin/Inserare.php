<?php
include("Conectare.php");
$error = '';

if (isset($_POST['submit'])) 
{
    // preluam datele de pe formular
    $nume = htmlentities($_POST['nume'], ENT_QUOTES);
    $pret = htmlentities($_POST['pret'], ENT_QUOTES);
    $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
    $categorie = htmlentities($_POST['categorie'], ENT_QUOTES);
    $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
    $stare = htmlentities($_POST['stare'], ENT_QUOTES);
    $angajatiID = htmlentities($_POST['angajatiID'], ENT_QUOTES);

    // verificam daca sunt completate
    if ($nume == '' || $pret == '' || $imagine == '' || $categorie == '' || $descriere == '' || $stare == '' || $angajatiID == '') 
    {
        // daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } 
    else 
    {
        // insert
        if ($stmt = $mysqli->prepare("INSERT into produse (nume, pret, imagine, categorie, descriere, stare, angajatiID) VALUES (?, ?, ?, ?, ?, ?, ?)")) 
        {
            $stmt->bind_param("sdssssi", $nume, $pret, $imagine, $categorie, $descriere, $stare, $angajatiID);
            $stmt->execute();
            $stmt->close();
        }
        // eroare le inserare
        else 
        {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}
// se inchide conexiune mysqli
$mysqli->close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>
        <?php echo "Inserare produs nou"; ?>
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>
        <?php echo "Inserare produs nou"; ?>
    </h1>

    <?php if ($error != '') {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
    }
    ?>

    <form action="" method="post">
        <div>
            <strong>Nume: </strong> <input type="text" name="nume" value="" /><br />
            <strong>Pret: </strong> <input type="text" name="pret" value="" /><br />
            <strong>Imagine: </strong> <input type="text" name="imagine" value="" /><br />
            <strong>Categorie: </strong> <input type="text" name="categorie" value="" /><br />
            <strong>Descriere: </strong> <input type="text" name="descriere" value="" /><br />
            <strong>Stare: </strong> <input type="text" name="stare" value="" /><br />
            <strong>AngajatiID: </strong> <input type="text" name="angajatiID" value="" /><br />
            <br />

            <input type="submit" name="submit" value="Submit" />
            <a href="Vizualizare.php">Vizualizare tabela</a>
        </div>
    </form>
</body>

</html>