<?php
// conectare la baza de date 
include("Conectare.php");

// se verifica daca id a fost primit
if (isset($_GET['id']) && is_numeric($_GET['id'])) 
{
    // se verifica daca id a fost primit din URL
    $id = $_GET['id'];

    // stergem inregistrarea cu ib=$id
    if ($stmt = $mysqli->prepare("DELETE FROM produse WHERE id = ? LIMIT 1")) 
    {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    } 
    else 
    {
        echo "ERROR: Nu se poate executa stergerea.";
    }

    $mysqli->close();
    echo "<div>Inregistrarea a fost stearsa!</div>";
}

echo "<p><a href=\"Vizualizare.php\">Index</a></p>";
?>