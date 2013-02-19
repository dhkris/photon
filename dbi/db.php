<?php

include_once 'type.inc';
include_once 'port.inc';

DEFINE("PHOTON_DBDEBUG", 1);

abstract class Photon_Database {
    protected $path;
    protected $port;
    function __construct($path, $port) {

    }

    protected $_table;

    function _prepare_insert($kvpairs, $table) {
        $fields = array();
        $values = array();
        $sql = "INSERT INTO " . $table . " (";
        foreach ($kvpairs as $field => $value) {
            $fields[] = $field;
            $values[] = sqlite_escape_string($value);
            /* Safety first! */
        }
        foreach ($fields as $field) {/* Add fields */
            $sql .= $field . ",";
        }
        $sql = rtrim($sql, ',');
        /* Remove extraneous , from the end of the SQL string */
        $sql .= ") VALUES(";
        foreach ($values as $value) {/* Add values */
            $sql .= "'" . $value . "',";
        }
        $sql = rtrim($sql, ",");
        /* Remove extraneous , from the end of the SQL string */
        $sql .= ");";
        echo $sql . "\n";
        return $sql;
    }

    abstract function connect();
    abstract function raw_query($query);
    abstract function create_table($name, $fields);

    /* Set the active table */
    function set_table($name) {
        $this -> _table = $name;
    }

    function get_table() {
        return $this -> _table;
    }

    abstract function insert($values);
    abstract function select($what);
    abstract function update($where, $values);
    abstract function close();

}
?>