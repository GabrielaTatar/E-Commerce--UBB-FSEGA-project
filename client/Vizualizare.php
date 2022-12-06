<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Vizualizare produse</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>Inregistrarile din tabela produse</h1>
    
    <?php
    //Se connecteaza la baza de date
    include("Conectare.php");

    //Se preiau inregistrarile din baza de date
    if ($result = $mysqli->query("SELECT * FROM produse ORDER BY id ")) 
    {
        // Afisare inregistrari pe ecran
        if ($result->num_rows > 0) 
        {
            // Afisarea inregistrarilor intr-o table
            echo "<table border='1' cellpadding='10'>";
            // Antetul tabelului
            echo "<tr><th>Id</th><th>Nume</th><th>Pret</th><th>Imagine</th><th>Categorie</th><th>Descriere</th><th>Stare</th><th>AngajatiID</th><th></th><th></th></tr>";
            while ($row = $result->fetch_object()) 
            {
                // Definirea unei linii pt fiecare inregistrare
                echo "<tr>";
                echo "<td>" . $row->id . "</td>";
                echo "<td>" . $row->nume . "</td>";
                echo "<td>" . $row->pret . "</td>";
                echo "<td>" . "<img src='$row->imagine' width='100px'>" . "</td>";
                echo "<td>" . $row->categorie . "</td>";
                echo "<td>" . $row->descriere . "</td>";
                echo "<td>" . $row->stare . "</td>";
                echo "<td>" . $row->angajatiID . "</td>";
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
    else {
        echo "Error: " . $mysqli->error;
    }

    $mysqli->close();
    ?>

    <a href="Inserare.php">Se adauga un nou produs</a>
</body>

</html>