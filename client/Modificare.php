<?php 
// connectare baza de date
include("Conectare.php");

// se preia id din pagina vizualizare
$error = '';

if (!empty($_POST['id'])) 
{
    if (isset($_POST['submit'])) 
    { // verificam daca id-ul din URL este unul valid
        if (is_numeric($_POST['id'])) 
        { // preluam variabilele din URL/form
            $id = $_POST['id'];
            $nume = htmlentities($_POST['nume'], ENT_QUOTES);
            $pret = htmlentities($_POST['pret'], ENT_QUOTES);
            $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
            $categorie = htmlentities($_POST['categorie'], ENT_QUOTES);
            $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
            $stare = htmlentities($_POST['stare'], ENT_QUOTES);
            $angajatiID = htmlentities($_POST['angajatiID'], ENT_QUOTES);

            // verificam daca numele, prenumele, an si grupa nu sunt goale
            if ($nume == '' || $pret == '' || $imagine == '' || $categorie == '' || $descriere == '' || $stare == '' || $angajatiID == '') 
            { // daca sunt goale afisam mesaj de eroare
                echo "<div> ERROR: Completati campurile obligatorii!</div>";
            } 
            else 
            { // daca nu sunt erori se face update la toate variabilele
                if ($stmt = $mysqli->prepare("UPDATE produse SET nume=?,pret=?,imagine=?,categorie=?,descriere=?,stare=?,angajatiID=? WHERE id='" . $id . "'")) 
                {
                    $stmt->bind_param(
                        "sdssssi",
                        $nume,
                        $pret,
                        $imagine,
                        $categorie,
                        $descriere,
                        $stare,
                        $angajatiID
                    );
                    $stmt->execute();
                    $stmt->close();
                } 
                // mesaj de eroare in caz ca nu se poate face update
                else 
                {
                    echo "ERROR: nu se poate executa update.";
                }
            }
        }
        else 
        {
            echo "id incorect!";
        }
    }
} 
?>


<html>

<head>
    <title> <?php 
    
        if ($_GET['id'] != '') 
        {
           echo "Modificare produs";
        } 
            ?> 
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>

<body>
    <h1><?php 
    
    if ($_GET['id'] != '') 
    {
       echo "Modificare produs";
    } 
        ?>
    </h1>
    <?php 
    if ($error != '') 
    {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
    } 
    ?>
    <form action="" method="post">
        <div>
            <?php if ($_GET['id'] != '') 
            { 
                ?>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <p>ID: <?php echo $_GET['id'];
                        if ($result = $mysqli->query("SELECT * FROM produse where id='" . $_GET['id'] . "'")) 
                        {
                            if ($result->num_rows > 0) 
                            {
                                $row = $result->fetch_object(); ?></p>
                <strong>Nume: </strong> <input type="text" name="nume" value="<?php echo $row->nume;?>" /><br />
                <strong>Pret: </strong> <input type="text" name="pret" value="<?php echo $row->pret;?>" /><br />
                <strong>Imagine: </strong> <input type="text" name="imagine" value="<?php echo $row->imagine;?>" /><br />
                <strong>Categorie: </strong> <input type="text" name="categorie" value="<?php echo $row->categorie; ?>" /><br />
                <strong>Descriere: </strong> <input type="text" name="descriere" value="<?php echo $row->descriere; ?>" /><br />
                <strong>Stare: </strong> <input type="text" name="stare" value="<?php echo $row->stare; ?>" /><br />
                <strong>AngajatiID: </strong> <input type="text" name="angajatiID" value="<?php echo $row->angajatiID;
                                                                                    }
                                                                                }
                                                                            } ?>" /><br />
                <br />
                <input type="submit" name="submit" value="Submit" />
                <a href="Vizualizare.php">Index</a>
        </div>
    </form>
</body>

</html>