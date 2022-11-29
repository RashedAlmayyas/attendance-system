<?php
    
    session_start();
    error_reporting(0);
    include('admin/includes/config.php');

if(isset($_POST['ronel'])){

    $image = $_POST['image'];
   
    $imgsrc = "upload/";
  
    $image_parts = explode(";base64,", $image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.jpg';
  
    $file = $imgsrc . $fileName;
    file_put_contents($file, $image_base64);
  

   

    $id=$_POST['id'];
    $sql ="UPDATE user
    SET image = :image
    WHERE id = :id;";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':image', $image, PDO::PARAM_STR);
    $query-> bindParam(':id', $id, PDO::PARAM_STR);

    $query->execute();
    $msg="  Successfully";


/*
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['success']="Not Inserted successfully!";
        header('Location:');
    }else{
        echo "<script>alert('Data not inserted! Kindly contact ITSUPPORT OTPC');</script>";
    }
   */
  }
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<body>
  
<div class="container">
   
    <form method="POST"  name="ronel" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
               
                <input type="hidden" name="image" class="image-tag">
                
            </div>
            <div class="col-md-6">
            <input type="text" name="id" class="form-control" required>
            <div class="col-md-6 text-center">
                <br/>
                <button class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()" name="ronel">Submit</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 140,
        height: 150,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
</body>