<?
    
    // INFORMATION FOR TEMPLATE
    define('PHOTON_TEMPLATE_REQUIREDFILES',"default.css;;template_default.php");  
    
    // PREDEFINED VARIABLES FOR TEMPLATE USE:
    // $vu : Active main view, autogenerated from the page ID in query string.
    

?>
<!doctype html>
<html>
    <head>
        <title><?=$vu->document_title();?></title>
        <meta name="author" content="<?=PHOTON_AUTHOR;?>">
        <meta name="generator" content="Photon CMS by Proponent">
        <link rel="stylesheet" href="UX/default.css">
    </head>
    <body>
        
        <?=$vu->content_field();?>
        
        <br>
        
        Category: <?=$vu->get_model()->get_category(); ?>
        
    </body>
    
</html>