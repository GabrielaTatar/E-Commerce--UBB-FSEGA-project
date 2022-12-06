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
if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['nume'])) 
{
    // Nu s-au putut obține datele care ar fi trebuit trimise
    exit('Nu s-a putut desfasura conexiunea!');
}

// Se asigura că valorile înregistrării trimise nu sunt goale
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'] || empty($_POST['nume']) )) 
{
    exit('Completare registration form!');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
{
    exit('Email nu este valid!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) 
{
    exit('Username nu este valid!');
}

if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 5) 
{
    exit('Password trebuie sa fie intre 5 si 30 charactere!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['nume']) == 0) 
{
    exit('Numele nu este valid!');
}

//Verificam daca contul user-ului exista
if ($stmt = $con->prepare('SELECT id, password, nume FROM angajati WHERE username = ?')) 
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
        if ($stmt = $con->prepare('INSERT INTO angajati (username, password, email, nume) VALUES (?,?, ?, ?)')) 
        {
            //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $_POST['username'], $_POST['password'], $_POST['email'], $_POST['nume']);
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