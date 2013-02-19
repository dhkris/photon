<?php

include_once 'sys/version.inc';
include_once 'dbi/type.inc';
include_once 'dbi/port.inc';

define("PHOTON_SITENAME", "Photon Demo Site");
define("PHOTON_BACKEND_USER", "david");
define("PHOTON_BACKEND_PWD", "Da-110689");
define("PHOTON_WEBMASTER_MAIL", "dhk@surftown.com");
define("PHOTON_WEBMASTER_NAME", "David Kristensen");
define("PHOTON_ROOTURL", "/");
define("PHOTON_SUBFOLDER", "");

/* DATABASE CONFIGURATION */
define("PHOTON_DBTYPE", PhotonDBType::$SQLite);
define("PHOTON_DBPORT", PhotonDBPort::$SQLite3);
define("PHOTON_DBPATH", "data/demo.db");

define("PHOTON_TEMPLATE", "template_default");

/* Database user/password configuration
 * Required for MySQL and PgSQL; unneeded for SQLite
define("PHOTON_DBUSER", "root");
define("PHOTON_DBPASS", "Da-110689");
 * */
?>