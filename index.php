<?php

include_once 'dbi/DBI.php';
include_once 'languages/english.lang.php';
include_once 'config.php';
include_once 'models/MODELS.php';

echo "Connecting to database";

$my = new Photon_SQLiteDB("data/demo.db");
$state = $my->connect();

$test = "SELECT * FROM PAGES";

$res = $my->raw_query($test);
$results = $my->as_array();

$kv_pairs = array();
$kv_pairs['title'] = 'poopah_test';

$page = new Page($my);
$page->set_id(1);
$page->read();

$my->set_table("test_pages");
$my->insert($kv_pairs);
?>
