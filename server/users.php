<?php
//test, not useable, not in use
$accounts = [
    ["username" => "admin", "password" => "Meow123"],
    ["username" => "guest", "password" => "Guest01"]
];
// kiíratás fájlba (serialize)
$file = fopen("accounts.txt", "w");
foreach ($accounts as $account)
    fwrite($file, serialize($account) . "\n");
fclose($file);
// beolvasás fájlból (unserialize)
$file = fopen("accounts.txt", "r");
$accounts2 = [];
while (($line = fgets($file)) !== false)
    $accounts2[] = unserialize($line);
fclose($file);
?>
