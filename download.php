<?php
require 'navigation.php';
require 'sql/dbConnector.php';

if (isset($_GET['filename']))
{

    $sql= "select * from filedirectory where fileNameS='".$_GET['filename']."'";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $origFilename = $row['fileName'];
        $expDate = strtotime($row['expireDate']);
        $dateTodayss=$expDate-strtotime('now');
        $leftDays= round($dateTodayss/86400);
        //echo $origFilename;
        setcookie("File", $_GET['filename'],time()+60*20,"/download/");
        setcookie("TestCookie", $origFilename,time()+60*10,"/download/");
    }


  $urlFileName = '../download/'.$_GET['filename'];
  $filename='randomFile/'.$_GET['filename'];
  if (file_exists($filename)){
    $fileSize= number_format(filesize($filename)/1024,2);
    if ($fileSize <= '1000'){
      //Detect whether MB or KB
      $fSize = " KB";
    }else{
      $fileSize=number_format(filesize($filename)/1048576,2);
      $fSize = " MB";
    }

    echo"<title>".$origFilename."-efilemb.com</title>
          <meta name='description' content='Download now!'>
          <head></head>
          <div class='container'>
            <div class='col-md-5 border mx-auto p-4'>
            
              <div class='form-group'>
                <p id='countdown' class='text-center  display-1'><strong>5</strong></p>
                <h2><p class='text-center'>seconds</p></h2>
              </div>
              <label>File Name: <strong>".$origFilename."</strong></label><br>
              <label>Expire Date: <strong>".$leftDays." days</strong></label><br>
              <label>Total Downloads: <strong>Coming soon!</strong></label>
              <div class='form-group'>
              <input type='text' name='name' hidden value='".$_GET['filename']."''>
                <button id='btn1' class='button1 btn btn-block btn-dark text-white' onclick='myFunction()' disabled><i class='fa fa-fw fa-download'></i> Download (".$fileSize.$fSize.")</button>
              </div>
              <div class='form-group'>
                <button id='btn2' data-toggle='modal' data-target='#exampleModalCenter' class='button2 btn btn-block btn-danger'><i class='fa fa-fw fa-exclamation-triangle'></i> Report this file</button>
              </div>
            
            </div>
          </div>
          <div id='uploadStatus'>&nbsp</div>
          <div style='padding-bottom:30px';></div>";
  }else{
    echo "<div class='container'>
            <div class='row'>
            FILE NOT FOUND
            </div>
        </div>";
        exit;
  }
}
else
{

}



?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark text-white">
    <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Report this file (Coming soon)</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleFormControlInput1">Title of your report</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Tell us why you want to report this file?</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-dark border" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div style='padding-bottom:0px';></div>"

<script>
var timeleft = 4;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "<b>0</b>";
    document.getElementById("btn1").disabled = false;
  } else {
    $('#countdown').html('<b>'+timeleft+'</b>');
  }
  timeleft -= 1;
}, 1000);

function myFunction() {
  //alert('<?php echo $urlFileName; ?>');
    location.href='<?php echo $urlFileName; ?>';
    document.getElementById("btn1").disabled = true;
    document.getElementById("btn1").innerHTML = '<i class="fa fa-fw fa-redo-alt"></i> Didn&apos;t get file? Reload!';
    //alert("Hello! I am an alert box!!");
  }



</script>

<?php
    require 'footer.php';
?>