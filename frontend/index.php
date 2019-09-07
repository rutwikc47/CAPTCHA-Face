<!DOCTYPE html>
<html>
<head>
<title>Payment Portal</title>
<nav class="navbar navbar-dark bg-dark">
  <center><span class="navbar-brand mb-0 h2">Payment Portal</span></center>
</nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<style>
.b1{
	width:20%;
}

.fillz{
	background-color:beige;
}	

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #252528;
   color: white;
   text-align: center;
}
</style>
<body>
<br>
<h5><b font="Serif">&nbsp;&nbsp;Welcome to the payment portal! Please fill the required fields to proceed with your payment.</b><h5><br><br><br><br><br><br>
<center><div class="fillz">
    <form method="POST" action="storeImage.php">
          <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
          <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
<p>Amount:&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Amount" name="Amount"></p><br>

<p>Number:&nbsp;&nbsp;&nbsp;<input type="number" placeholder="XXXX-XXXX-XXXX" name="CNO"></p><br>

<div class="b1"><div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="CVV">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Expiry">
    </div>
  </div>
  </div><br>
 <p><input type="text" placeholder="Cardholder's Name" name="Name" size="31"></p><br>
<button class="btn btn-success">Submit</button>
    </form>
</div>
<!--
<div class="footer">
  <p>Copyright &#169; Payment Portal 2019</p>
</div>
-->
    <!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            var myImg = document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>
