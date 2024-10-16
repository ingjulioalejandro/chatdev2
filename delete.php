<?php

    session_start();
    $info = (object)[];

    require_once("classes/autoload.php");
    require_once("index.php");
    $DB = new Database();

    $Error = "";

    if(!empty($_GET['del'])){
        $fileName  = basename($_GET['del']);
        $filePath  = "uploads/".$fileName;
        $arr['name'] = $fileName;
        $query = "DELETE FROM `upload` WHERE `name` = '$fileName'";
        $result = $DB->write($query,$arr);
        
        echo '<script type="text/javascript">',
        'get_data({},"filessharing");',
        '</script>'
   ;
    }
?>