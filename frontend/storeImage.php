<?php
session_start();
    $img = $_POST['image'];
    $folderPath = "C:/xxamp/htdocs/upload/upload/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = 'test' . '.jpg';
  
    $file = $folderPath . $fileName;
    $file_new = $fileName;
    file_put_contents($fileName, $image_base64);
  
   // print_r($file);

        require_once 'C:\Users\hp\vendor\aws.phar';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket = 'be-project';
$keyname = 'sample';
// $filepath should be absolute path to a file on disk                      
$filepath = 'C:/xxamp/htdocs/upload/upload/Image.jpeg';

// Instantiate the client.
$s3 = new Aws\S3\S3Client([
			'region'  => 'ap-south-1',
			'version' => 'latest',
			'credentials' => [
				'key'    => "AKIAXRP2XPX7VJUNJUZI",
				'secret' => "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",
			]
		]);		

try {
    // Upload data.
    $result = $s3->putObject(array(
        'Bucket' => $bucket,
        'Key'    => $keyname,
        'SourceFile'   => $file_new
    ));

   

    // Print the URL to the object.
     $result['ObjectURL'] . "\n";
} catch (S3Exception $e) {
     $e->getMessage() . "\n";
} 

$client = new GuzzleHttp\Client();
$res = $client->request('POST', 'http://ec2-13-126-221-63.ap-south-1.compute.amazonaws.com/');
$res->getStatusCode();
// "200"
echo $res->getStatusCode();
var_dump($res->getStatusCode());
$res->getHeader('application/json');
// 'application/json; charset=utf8'
echo " " ;
//echo $res->getBody();
$contents = $res->getBody()->getContents();
echo $contents;

$length = strlen($contents);
//echo $contents;
//var_dump($contents);



if (!isset($_SESSION['views'])) { 
    $_SESSION['views'] = 0;
}

$_SESSION['views'] = $_SESSION['views']+1;

if ($_SESSION['views'] === 2 && $length !=3) {
    header("Location: index_2.html");
}



else {
// {"type":"User"...'
//$res_new = (string)$res;
//$contents_new = '1';
//echo gettype($contents);
if($length == 3){
    echo '<script type="text/javascript">alert("Authentication Success!");</script>';
    header('Location: thankyou.php');
}
    
else  { 
    echo '<script type="text/javascript">alert("Authentication F");</script>';
     header('Location: index.html'); 
}
}
?>
