<?php
session_start();

//Se redirectioneaza user-ul spre pagina de login
if (!isset($_SESSION['loggedin'])) 
{
    header('Location: Index.html');
    exit;
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Vizualizare produse</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>Inregistrarile din Tabela Produse </h1>

    <?php
    // Se conecteaza la baza de date
    include("Conectare.php");

    // Se preiau inregistrarile din baza de date
    if ($result = $mysqli->query("SELECT * FROM produse ORDER BY id ")) 
    { // Afisare inregistrari pe ecran
        if ($result->num_rows > 0) 
        {
            // Afisarea inregistrarilor intr-o table
            echo "<table border='1' cellpadding='10'>";
            // Antetul tabelului
            echo "<tr><th>ID</th><th>Nume produs</th><th>Pret produs</th><th>Imagine</th><th>Categorie</th><th>Descriere</th><th>Stare</th><th></th><th></th></tr>";

            // Definirea unei linii pt fiecare inregistrare
            while ($row = $result->fetch_object()) 
            {
                echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td>" . $row->nume . "</td>";
                        echo "<td>" . $row->pret . "</td>";
                        echo "<td>" . "<img src='$row->imagine' width='100px'>" . "</td>";
                        echo "<td>" . $row->categorie . "</td>";
                        echo "<td>" . $row->descriere . "</td>";
                        echo "<td>" . $row->stare . "</td>";
                        echo "<td><a href='Modificare.php?id=" . $row->id . "'>Modificare</a></td>";
                        echo "<td><a href='Stergere.php?id=" . $row->id . "'>Stergere</a></td>";
                        echo "</tr>";
            }
            echo "</table>";
        }
        // Daca nu sunt inregistrari se afiseaza un rezultat de eroare
        else 
        {
            echo "Nu sunt inregistrari in tabela!";
        }
    }
    // Eroare in caz de insucces in interogare
    else 
    {
        echo "Error: " . $mysqli->error;
    }
    $mysqli->close();
    ?>

    <a href="Inserare.php">Adaugarea unui nou produs</a></br>
    <a href="Logout.php"><i class="fas fa-sign-outalt"></i>Logout</a>

</body>

</html>