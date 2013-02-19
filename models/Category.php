<?php 

class Category {
    private $db;    /* Database handle */
    private $id, $name, $alias; /* fields */
    function __construct($database) {
        $this->db = $database;
        
        /* Just execute the fucker... */
        
    }
    
    
    
    function get_fields_of_all_pages($fields) {
        $sql = "SELECT ";
        foreach($fields as $field) {
            $sql .= $field.",";
        }
        $sql = rtrim($sql,",");
        $sql .= "FROM PAGES WHERE category=" .$this->id;
        $this->db->raw_query( $sql );
        $results = $this->db->as_array();
    }
    
    function get_id() { return $this->id; }
    function get_name() { return $this->name; }
    function get_alias() { return $this->alias; }
    
    function set_id($value) { $this->id = $value; }
    function set_name($value) { $this->name = $value; }
    function set_alias($value) { $this->alias = $value; }
}

?>