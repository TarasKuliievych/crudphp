<?php
require_once __DIR__.'/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Monolog{
    public function insertUserLog(){
        $log = new Logger('DEBUG LOGGER');
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/log', Logger::DEBUG));
        $log->debug("Change_Info", array("Users_table_change",  "kind" => 'Create', "name" => ($_POST['name']), "email" => ($_POST['name']), "country_id" => ($_POST['country_id'])));
    }
    public function editUserLog()
    {
        $log = new Logger('DEBUG LOGGER');
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/log', Logger::DEBUG));
        $id= ($_POST['editUser']);
        $log->debug("Change_Info", array("Users_table_change", "id" =>$id, "kind" => "edit", "name" => ($_POST['name'.$id]), "email" => ($_POST['email'.$id]), "country_id" => ($_POST['country_id'.$id])));
    }
    public function deleteUserLog()
    {
        $log = new Logger('DEBUG LOGGER');
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/log', Logger::DEBUG));
        $id=($_POST['deleteUser']);

        $log->debug("Change_Info", array("Users_table_change", "id" =>$id, "kind" => "delete"));
    }
    public function insertCountryLog()
    {
        $log = new Logger('DEBUG LOGGER');
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/log', Logger::DEBUG));
        $log->debug("Change_Info", array("country_tables_change", "kind" => 'Create', "country" => ($_POST{'country'})));
    }
    public function editCountryLog()
    {
        $log = new Logger('DEBUG LOGGER');
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/log', Logger::DEBUG));
        $id= ($_POST['editCountry']);
        $log->debug("Change_Info", array("country_tables_change", "kind" => "edit", "id" =>$id, "country" => ($_POST['country'.$id])));
    }
    public function deleteCountryLog()
    {
        $log = new Logger('DEBUG LOGGER');
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/log', Logger::DEBUG));
        $id=($_POST['deleteCountry']);
        $log->debug("Change_Info", array("country_tables_change", "id" =>$id,  "kind" => "delete"));
    }
}