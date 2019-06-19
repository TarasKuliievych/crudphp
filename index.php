<?php
require_once __DIR__.'/vendor/autoload.php';
readfile('header.html');
$Data_Base_Editor=new DataBaseEditor();
$Data_Base_Editor->loadUsers();
readfile('table2.html');
$Data_Base_Editor->loadCountry();
readfile('footer.html');