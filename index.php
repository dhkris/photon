<?php

/* The current configuration */
include_once 'config.php';

/* i18n for error/warning messages */
include_once 'languages/english.lang.php';

/* Backend */
include_once 'dbi/DBI.php';
include_once 'models/MODELS.php';
include_once 'views/VIEWS.php';

/* Required backend */
$db = Photon_helper_GetDefaultDBConnection();
$model = new Page($db);
$vu = new PageView($model, 1);

/* Generate template path */
$template_path = 'UX/' .PHOTON_TEMPLATE .".php";

/* Activate template! */
include_once $template_path;

?>