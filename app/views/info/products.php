<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/css/style.css">
    <title><?= SITENAME; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-light">
    <div class="container">
        <a class="navbar-brand text-success" href="<?= URLROOT; ?>"><?= strtoupper(SITENAME); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-body" href="<?= URLROOT; ?>">Home</a>
                </li>
            </ul>

        </div>
    </div>
</nav>





<?php require APPROOT . '/views/inc/footer.php'; ?>
