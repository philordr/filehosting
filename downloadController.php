<?php

    
    //echo $fileNameS;
        
    if (isset($_COOKIE['File']) && isset($_COOKIE['TestCookie'])){   
        
        $fileName='randomFile/'.$_COOKIE['File'];
    
        $fileNameS=$_COOKIE['TestCookie'];
        header('Content-Description: File Transfer');
        header('Content-Type: application/jpg');
        header('Content-Disposition: attachment; filename="'.basename($fileNameS).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        readfile($fileName);
        exit;
    }
    else{
        $filename = $_GET['filename'];
        header("Location: ../file/".$filename);
        
    }
?>