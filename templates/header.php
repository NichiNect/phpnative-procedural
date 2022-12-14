<?php 
function asset($src)
{
    return 'assets/' . $src;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>

    <link rel="stylesheet" href="<?= asset('bootstrap-4.6.0/css/bootstrap.min.css'); ?>">
    <!-- <link rel="stylesheet" href="assets/bootstrap-4.6.0/css/bootstrap.min.css"> -->
</head>
<body>