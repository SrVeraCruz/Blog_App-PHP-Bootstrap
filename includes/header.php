<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= isset($page_title) ? $page_title : "Vera-Blog" ?></title>

  <meta name="description" content="<?= isset($meta_description) ? $meta_description : "" ?>" >
  <meta name="keywords" content="<?= isset($meta_keywords) ? $meta_keywords : "" ?>" >
  <meta name="author" content="Vera Cruz Company" >
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="../assets/custom.css">
</head>
<body>
