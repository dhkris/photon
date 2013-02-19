<?php

    include_once 'db_sqlite.php';

    function Photon_helper_GetDefaultDBConnection() {
        if( PHOTON_DBTYPE == PhotonDBType::$SQLite ):
            $ptr = new Photon_SQLiteDB(PHOTON_DBPATH);
        endif;
        $ptr->connect();
        return $ptr;
    }

?>