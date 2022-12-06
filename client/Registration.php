<?php
//Informațiile despre conexiune
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = "";
$DATABASE_NAME = 'store';
$DATABASE_PORT = '3306';

//Conectare la baza de informatii de mai sus
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME, $DATABASE_PORT);

if (mysqli_connect_errno()) 
{
    // Dacă există o eroare la conexiune, opriți scriptul și afișați eroarea
    exit('Nu se poate conecta la MySQL: ' . mysqli_connect_error());
}

//Verifica daca variabilele au fost memorate in tablou
if (!isset($_POST['username'], $_POST['password'],  $_POST['email'])) 
{
    // Nu s-au putut obține datele care ar fi trebuit trimise.
    exit('Nu s-a putut desfasura conexiunea!');
}

// Se asigura că valorile înregistrării trimise nu sunt goale
if (empty($_POST['username'] || $_POST['password'] || $_POST['email'] )) 
{
    exit('Completare registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
{
    exit('Email nu este valid!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) 
{
    exit('Username nu este valid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) 
{
    exit('Password trebuie sa fie intre 5 si 20 charactere!');
}

// Verificam daca contul userului exista.
if ($stmt = $con->prepare('SELECT id, password FROM clienti WHERE username = ?')) 
{
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    // Se memoreaza rezultatul, astfel încât să se poata verifica dacă contul există în baza de date
    if ($stmt->num_rows > 0) 
    {
        echo 'Username exists, alegeti altul!';
    } 
    else 
    {
        if ($stmt = $con->prepare('INSERT INTO clienti (username, password, email) VALUES (?, ?, ?)')) 
        {
            //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $_POST['password'], $_POST['email']);
            //$stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt->execute();
            echo 'Success inregistrat!';
            header('Location: Index.html');
        } 
        else 
        {
            // Ceva nu este în regulă cu declarația sql
            echo 'Nu se poate face prepare statement!';
        }
    }
    $stmt->close();
} 
else 
{
    // Ceva nu este în regulă cu declarația sql
    echo 'Nu se poate face prepare statement!';
}
$con->close();
?>
