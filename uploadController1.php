<?php
require 'function.php';


    $file=$_FILES['file'];
    $fileTmp = $file['tmp_name'];    
    $fileCount=count($_FILES['file']['name']);

    function generateRandomString($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    echo "<div><h1><b>Your file is ready for download.</b></h1></div>";
    for($i=0;$i<$fileCount;$i++)
    {
        //echo $i;
        $fileName= $file['name'][$i];
        $randomName = generateRandomString();
        
        
        //Upload file to the server
        if(move_uploaded_file($fileTmp[$i],'randomFile/'.$randomName)){
        echo "<h5><strong>Filename: </strong>".$fileName."</h5>";
        $linkGen= $_SERVER['SERVER_NAME']."/file/".$randomName;
        echo "<div class='input-group mb-3'>
                <input type='text' id='".$i."' class='form-control' value='".$linkGen."' aria-label='Recipient's username' aria-describedby='basic-addon2'>
                <div class='input-group-append'>
                <button class='btn btn-outline-secondary' type='button' onclick='myFunction".$i."()'>Copy Link</button>
                </div>
                
            </div>
            
            
            <script>
                function myFunction".$i."() {
                var copyText = document.getElementById('".$i."');
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand('copy');
                //alert('Copied the text: ' + copyText.value);
            }
            </script>
            ";

            //Add 120 days to the current date
            $date=date_create(date('Y-m-d'));
            date_add($date,date_interval_create_from_date_string("120 days"));
            $expDate= date_format($date,"Y-m-d");
            $currentDate=date('Y-m-d');

            //save to database
            $sql = "INSERT INTO filedirectory (fileName, fileNameS, fileLocation, uploadDate, expireDate) VALUES(?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $fileName, $randomName, $linkGen,$currentDate, $expDate);
                mysqli_stmt_execute($stmt);                
            }
        }else{
            echo "failed";
            
        }
    }
    echo "<div class='input-group mb-3'>
    <a href='/' class='btn btn-dark btn-md btn-block' style='color:white'><i class='fa fa-fw fa-upload'></i> Upload Again</a>
    </div>";





    /*if ($ok == 0) {
        echo $mess;
    // if everything is ok, try to upload file
    }
    else
    {
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $fileNameS = generateRandomString();

        $fileName = str_replace(' ', '_', $fileName);
        $try = $fileNameS;
        $target_file = $target_dir . basename($try);
        while (move_uploaded_file($fileTmpName, $target_file)) {
            //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
            


            $uploadToday = date("Y-m-d");
            $expireDate = date("Y-m-d",strtotime("$uploadToday +120 day"));
            
            
            $sql = "INSERT INTO filedirectory (fileName, fileNameS, fileLocation, uploadDate, expireDate) VALUES(?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                //header("Location: ../index.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $fileName, $try, $target_file, $uploadToday, $expireDate);
                mysqli_stmt_execute($stmt);
                
                echo "download.php/download.php?filename='".$try."'";
                //header("Location: /upload.php?success=".$try);
                //exit();
            }

            echo "download.php/download.php?filename=".$try."<br>";




            
        }
    }*/
//}

?>


