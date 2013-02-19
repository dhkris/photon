<?

include_once 'db.php';

class Photon_SQLiteDB extends Photon_Database {

    private $db_ptr;
    private $opened;
    private $qc;
    private $buffer;
    protected $_table;

    function __construct($path, $port = -1) {
        $this -> path = $path;
        $this -> port = -1;
        $this -> qc = 0;
        $this -> opened = FALSE;
    }

    function connect() {
        if ($this -> opened == FALSE) {
            try {
                $this -> db_ptr = new SQLite3($this -> path);
                $this -> opened = TRUE;
                return 0;
            } catch (Exception $e) {
                echo PERR_DB_CONNECTFAIL;
                $this -> opened = FALSE;
                return ERRCODE_DB_CONN;
            }
        } else {
            echo PERR_DB_ALREADYOPEN;
            return ERRCODE_DB_ODDBEHAV;
        }
    }

    function raw_query($query) {
        if ($this -> opened == FALSE) {
            echo PERR_DB_NOTOPENONQUERY;
            return ERRCODE_DB_WRONGSTATE;
        }
        $res = $this -> db_ptr -> query($query);
        $this -> qc++;
        $this -> buffer = $res;
        return $res;
    }

    function as_array() {
        if ($this -> qc <= 0) {
            echo PERR_DB_NOQUERIESYET;
            return ERRCODE_DB_WRONGSTATE;
        } else {
            $rows = array();
            while ($row = $this -> buffer -> fetchArray(SQLITE3_ASSOC)) {
                $rows[] = $row;
            }
            return $rows;
        }

    }

    function create_table($name, $fields) {
        return 0;
    }

    function insert($kvpairs) {

        $sql = $this -> _prepare_insert($kvpairs, $this -> _table);

        if ($this -> opened == TRUE) {
            $this -> db_ptr -> exec($sql);
            /* Perform write! */
            return 0;
        } else {
            echo PERR_DB_NOTOPENONQUERY;
            return ERRCODE_DB_WRONGSTATE;
        }

    }

    function select($what) {
        return 0;
    }

    function update($where, $values) {
        return 0;
    }

    function close() {
        if ($this -> opened == FALSE) {
            echo PERR_DB_NOTOPENONQUERY;
            return ERRCODE_DB_WRONGSTATE;
        }
        $db_ptr -> close();
    }

}
?>