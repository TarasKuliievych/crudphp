<?php


class DataBaseEditor
{

    public function createDB(){
        $database = new SQLite3('myDatabase.sqlite');
        $qwasde = 1;
    }
    public function chekDB(){
        if(file_exists('myDatabase.sqlite')){
            return true;
        }else{
            return false;
        }
    }
    public function createTable(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $data_base->query('CREATE TABLE IF NOT EXISTS "users"(
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "name" TEXT,
            "email" TEXT,
            "country_id" INTEGER 
        )');
        $data_base->query('CREATE TABLE IF NOT EXISTS "countries"(
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "country" TEXT              
        )');
    }
    public function loadUsers(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $data_Array = $data_base->query('SELECT * FROM users');
        while ($row = $data_Array->fetchArray()) {
            echo("<tr>");
            echo("<th>");
            echo($row['id']);
            echo("</th>");
            echo("<th><input name='name{$row['id']}' value=");
            echo($row['name']);
            echo("></th>");
            echo("<th><input name='email{$row['id']}' value=");
            echo($row['email']);
            echo("></th>");
            echo("<th><input name='country_id{$row['id']}' value=");
            echo($row['country_id']);
            echo("></th>");
            echo("<th>");
            echo("<button name='editUser' value=");
            echo ($row['id']);
            echo (">edit</button>");
            echo("</th>");
            echo("<th>");
            echo("<button type='submit' name='deleteUser' value=");
            echo $row['id'];
            echo (">delete</button>");
            echo("</th>");
            echo("</tr>");
        }
    }
    public function loadCountry(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $data_Array = $data_base->query('SELECT * FROM countries');
        while ($row = $data_Array->fetchArray()) {
            echo("<tr>");
            echo("<th>");
            echo($row['id']);
            echo("</th>");
            echo("<th><input name='country{$row['id']}' value=");
            echo($row['country']);
            echo("></th>");
            echo("<th>");
            echo("<button type='submit' name='editCountry' value=");
            echo ($row['id']);
            echo (">edit</button>");
            echo("</th>");
            echo("<th>");
            echo("<button type='submit' name='deleteCountry' value=");
            echo $row['id'];
            echo (">delete</button>");
            echo("</th>");
            echo("</tr>");
        }
    }


    //need edit!!!
    public function insertUsers(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $name = ($_POST['name']);
        $email = ($_POST['email']);
        $country_id = ($_POST['country_id']);
        if($name !="" and $email != "" and $country_id != ""){
            $data_base->query("INSERT INTO users(name,email,country_id)"."VALUES('$name','$email','$country_id')");
        }
    }
    //need edit!!!
    public function insertCountries(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $country = ($_POST{'country'});
        if ($country!=""){
            $data_base->query("INSERT INTO countries(country)"."VALUES('$country')");
        }
    }
    //need edit!!!
    public function updateUsers(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $id= ($_POST['editUser']);
        $name = ($_POST['name'.$id]);
        $email = ($_POST['email'.$id]);
        $country_id = ($_POST['country_id'.$id]);
        if($name !="" and $email != "" and $country_id != ""){
            $data_base->query("UPDATE users SET name='$name', email='$email', country_id='$country_id' WHERE id=$id");
        }
    }
    public function updateCountries(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $id= ($_POST['editCountry']);
        $country = ($_POST['country'.$id]);
        if ($country!=""){
            $data_base->query("UPDATE countries  SET country='$country' WHERE id='$id'");
        }
    }
    public function deleteUsers(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $id=($_POST['deleteUser']);
        $data_base->query("DELETE FROM users   WHERE id='$id'");
    }
    public function deleteCountries(){
        $data_base = new SQLite3('myDatabase.sqlite');
        $id=($_POST['deleteCountry']);
        $data_base->query("DELETE FROM countries   WHERE id='$id'");

    }



}

