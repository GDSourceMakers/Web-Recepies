<?php
// regisztrált felhasználók adatainak beolvasása
$accounts = [];
$file = fopen("../database/accounts.txt", "r");
while (($line = fgets($file)) !== false) {
    $accounts[] = unserialize($line);
}
fclose($file);
// bejelentkezés sikerességének ellenőrzése
if (isset($_POST["login-btn"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $msg = "Sikertelen bejelentkezés <br/>";
    foreach ($accounts as $acc) {
        if ($acc["username"] == $username && $acc["password"] == $password) {
                header("Location: index.html");
            break;
        }
    }
}
echo $msg;
?>
