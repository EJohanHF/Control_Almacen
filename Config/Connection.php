<?php
require dirname(__DIR__, 1) . '/Config/config.php';

class DataBaseMethod 
{

    function Connection()
{
    try {
        $conexion = new PDO(
            "mysql:host=" . configDatabase::Host . ";dbname=" . configDatabase::BDname,
            configDatabase::User,
            configDatabase::Password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {

        return false;
    }
}

    function BDList($query)
    {
        try {

            $statement = $this->Connection()->prepare($query);

            $statement->execute();

            return  $statement->fetchAll();
        } catch (PDOException  $e) {

            return null;
        }
    }

    function BDCreate($query)
    {
        try {

            $statement = $this->Connection()->prepare($query);
            $statement->execute();
            return configDatabase::success;
        } catch (PDOException  $e) {

            return configDatabase::error . $e->getMessage();
        }
    }
    function BDUpdate($query)
    {
        try {

            $statement = $this->Connection()->prepare($query);
            $statement->execute();

            return configDatabase::success;
        } catch (PDOException  $e) {

            return configDatabase::error . $e->getMessage();
        }
    }
    function BDDelete($query)
    {
        try {

            $statement = $this->Connection()->prepare($query);
            $statement->execute();
            return configDatabase::success;
        } catch (PDOException  $e) {

            return configDatabase::error . $e->getMessage();
        }
    }
}
