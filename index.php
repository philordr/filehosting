<?php
  require 'navigation.php';
  require 'sql/dbConnector.php';
  require 'function.php';

  
  $formaction="uploadController1.php";
?>
<script>
$(document).ready(function(){
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e){
      const button = document.getElementById('btn');
      button.disabled = true;
      $('#btn').text('Please wait');
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(Math.ceil(percentComplete)+'%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: 'uploadController1.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#uploadStatus').html();
            },
            error:function(){
                $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
            success: function(resp){
              $('#uploadStatus').html("Generating Link");
              //window.location.replace("http://www.w3schools.com");
              $('#uploadStatus').html(resp);
              //$("#fileInputs").text("Choose File");
              $('#uploadForm').html('');
              $('#adss').html('');
              //const button = document.getElementById('btn');
              //button.disabled = false;
              $('#btn').text('Upload');
                
            }
        });
    });
	
    
});
</script>

    <title>eFileMB.com Free File Hosting</title>
    <meta name="description" content="File Uploader. Select file and upload for free.">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

<div class="container">
<div id="ads" class="col-sm-8 mx-auto border round-0 p-4" style="background-color:white;border-radius: 10px;color:black;">

<form id="uploadForm" enctype="multipart/form-data">
    <div class="form-group">
      <h1><strong class="text-dark">Efilemb.com Free File Hosting</h1></strong>
      <label>(Maximum FileSize is 99 MB, up to 120 days)</label>
      <div class="custom-file">
        <input type="file" name="file[]" class="custom-file-input" id="fileInput" multiple required>
        <label id="fileInputs" class="custom-file-label" for="fileInput">Choose File</label>
      </div>
    </div>
    <div class="checkbox">
      <label><a data-toggle="modal" data-target="#exampleModalCenter" style="color:blue;"><i class="fa fa-fw fa-info-circle"></i>Terms and conditions applied.</a></label>
    </div>
    <div class="form-group">
      <button id="btn" type="submit" name="submit" class="btn btn-block btn-dark"><i class="fa fa-fw fa-upload"></i> Upload</button>
    </div>

    <div class="progress">
    <div class="progress-bar text-light bg-dark"></div>
    </div>    
    
  </form>
  <div id="uploadStatus"></div>
  
</div>

</div>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
        <h2><i class="fas fa-coins"></i> Up to 99 MB</h2>
        <p>You can upload up to <strong>99 mb</strong>. Multiple files is supported at once.</p>
      </div>
      <div class="col-sm-4">
        <h2><i class="fas fa-link"></i> Copy Paste Link</h2>
        <p>You can share your file to your love once by copying the link or you can keep it as back up storage.</p>
      </div>
      <div class="col-sm-4">
        <h2><i class="fas fa-calendar-alt"></i> 120 Days</h2>
        <p>Your file will be keep up to 120 days and we will surely secure our server for data privacy.</p>
    </div>
  </div>
</div>

<div class="hide showads">
   &nbsp;
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions (Coming soon)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Created by: Master Philord Rubis
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div style='padding-bottom:0px';></div>"
<script>

$(document).ready(function() {
  setTimeout(function() {
  var a = document.querySelector('.showads'),
  b = a ? (a.offsetHeight ? false : true) : true;
  if(b == true){
    alert("Please disable your adsblock to continue using our service.");
    window.location.replace("adblock.php");
  }
}, 200);

$("input[type='file']").on("change", function () {
     if(this.files[0].size > (98*1000000)) {
        alert("Maximum File Size is 99MB. Thanks!!");
        $(this).val('');
        $("#fileInputs").text("Choose File");
        $('#uploadForm').reset[0];
      }
    });

});

$(document).ready(function() {
  $('input[type="file"]').on("change", function() {
    let filenames = [];
    let files = document.getElementById("fileInput").files;
    if (files.length > 1) {
      filenames.push("Total Files (" + files.length + ")");
    } else {
      for (let i in files) {
        if (files.hasOwnProperty(i)) {
          filenames.push(files[i].name);
        }
      }
    }
    $(this)
      .next(".custom-file-label")
      .html(filenames.join(","));
  });
});

</script>


  <?php

require 'sql/dbConnector.php';

$pageName = basename($_SERVER['PHP_SELF']);
$user_ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

$sql= "SELECT * from pageviewer WHERE pageName='".$pageName."' order by pageName asc";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);
if ($queryResult <= 0) {
    $insertview = mysqli_query($conn,"insert into pageviewer(pageName,totalVisit,lastUserIP) values('$pageName','1','$user_ip')");
}

$sql = "select * from pageviewer where pageName='$pageName' and lastUserIP='$user_ip' order by pageName asc";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);
if ($queryResult <= 0) {
  $updateview = mysqli_query($conn,"UPDATE pageviewer set lastUserIP='$user_ip', totalvisit = totalVisit+1 where pageName='$pageName' ");
}

    require 'footer.php';
  ?>



