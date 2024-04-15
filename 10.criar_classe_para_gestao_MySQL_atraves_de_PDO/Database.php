<?php

namespace sys4soft;

use PDO;
use PDOException;
use stdClass;

class Database
{
    // properties
    private $_host;
    private $_database;
    private $_username;
    private $_password;
    private $_return_type;

    public function __construct($cfg_options, $_return_type = 'object') 
    {
        // set connection configurations
        $this->_host = $cfg_options['host'];
        $this->_database = $cfg_options['database'];
        $this->_username = $cfg_options['username'];
        $this->_password = $cfg_options['password'];

        // sets the return type
        if(!empty($return_type) && $return_type == 'object') 
        {
            $this->_return_type = PDO::FETCH_OBJ;
        } 
        else 
        {
            $this->_return_type = PDO::FETCH_ASSOC;
        }
    }

    public function exectue_query($sql, $parameters = null) 
    {
        // executes a query with results

        // connection
        $connection = new PDO(
            'mysql:host=' . $this->_host . ';dbname=' .$this->_database . ';charset=utf8',
            $this->_username,
            $this->_password,
            array(PDO::ATTR_PERSISTENT => true)
        );

        $results = null;

        try {
            $db = $connection->prepare($sql);
            if(!empty($parameters)) {
                $db->execute($parameters);
            } else {
                $db->execute();
            }
        } catch (PDOException $err) {
            // close connection
            $connection = null;

            // return error
            return $this->_result('error', $err->getMessage(), $sql, null, 0, null);

        }
    }

    private function _result($status, $message, $sql, $results, $affected_rows, $last_id) {

    }
}