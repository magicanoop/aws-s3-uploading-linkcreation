<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;  
use Aws\Exception\AwsException;

$s3Client = new Aws\S3\S3Client([
    'profile' => 'default',
    'region' => 'ap-south-1',
    'version' => '2006-03-01',
]);


//Creating a presigned URL
$cmd = $s3Client->getCommand('GetObject', [
    'Bucket' => 'bktname',
    'Key' => 'test_example/sampletextfile.txt'
]);

$request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

// Get the actual presigned-url
$presignedUrl = (string)$request->getUri();

echo $presignedUrl;
