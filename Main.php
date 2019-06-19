<?php
require_once __DIR__.'/vendor/autoload.php';
$my_DB_Editor = new DataBaseEditor;
$monolog = new monolog;
if (isset($_POST['createUser'])){
    $my_DB_Editor->insertUsers();
    $monolog->insertUserLog();
    header('Location:index.php', true,303);
    exit();
}
if (isset($_POST['deleteUser'])){
    $my_DB_Editor->deleteUsers();
    $monolog->deleteUserLog();
    header('Location:index.php', true,303);
    exit();
}
if (isset($_POST['editUser'])){
    $my_DB_Editor->updateUsers();
    $monolog->editUserLog();
    header('Location:index.php', true,303);
    exit();
}
if (isset($_POST['createCountry'])){
    $my_DB_Editor->insertCountries();
    $monolog->insertCountryLog();
    header('Location:index.php', true,303);
    exit();
}
if (isset($_POST['deleteCountry'])){
    $my_DB_Editor->deleteCountries();
    $monolog->deleteCountryLog();
    header('Location:index.php', true,303);
    exit();
}
if (isset($_POST['editCountry'])){
    $my_DB_Editor->updateCountries();
    $monolog->editCountryLog();
    header('Location:index.php', true,303);
    exit();
}