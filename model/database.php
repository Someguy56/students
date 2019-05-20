<?php
/**
 * Database class
 * User: laptop
 * Date: 5/20/2019
 *
 */

require '/home/mleegree/config-student.php';

class Database
{
    private $_dbh;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            //Instantiate a db project
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected!!!";
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    function getStudents()
    {
        $sql = "SELECT * FROM student ORDER BY last, first";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }
}