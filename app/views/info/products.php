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
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <title><?= SITENAME; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="">
    <div class="container">
        <a class="navbar-brand" style="color: #05a081; font-size: 1.3em" href="<?= URLROOT; ?>"><?= strtoupper(SITENAME); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= URLROOT; ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['customers_id'])) : ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= URLROOT; ?>/infos/products">Laptops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="<?= URLROOT; ?>/pages/login">Logout</a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
        <form method="post">
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-2" type="checkbox" name="brand[]" id="inlineCheckbox1" value="Apple">
            <label class="form-check-label" style="font-size: 1.2em" for="inlineCheckbox1">Apple</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-5" type="checkbox" name="brand[]" id="inlineCheckbox2" value="Samsung">
            <label class="form-check-label" style="font-size: 1.2em" for="inlineCheckbox2">Samsung</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-5" type="checkbox" name="brand[]" id="inlineCheckbox3" value="Lenovo">
            <label class="form-check-label" style="font-size: 1.2em" for="inlineCheckbox3">Lenovo</label>
        </div>
        <hr>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-2" type="checkbox" name="model[]" id="inlineCheckbox4" value="Macbook Pro">
          <label class="form-check-label" for="inlineCheckbox4">Macbook Pro</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-2" type="checkbox" name="model[]" id="inlineCheckbox5" value="ChromeBook XE50">
            <label class="form-check-label" for="inlineCheckbox5">ChromeBook</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-4" type="checkbox" name="model[]" id="inlineCheckbox6" value="IdeaPad 320">
            <label class="form-check-label" for="inlineCheckbox6">IdeaPad 320</label>
        </div>
        <br>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-2" type="checkbox" name="model[]" id="inlineCheckbox7" value="Macbook Air">
            <label class="form-check-label" for="inlineCheckbox7">Macbook Air</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input ml-2" type="checkbox" name="model[]" id=inlineCheckbox8" value="Spin 7">
            <label class="form-check-label" for="inlineCheckbox8">Spin 7</label>
        </div>
        <div class="form-check form-check-inline ml-5">
            <input class="form-check-input ml-4" type="checkbox" name="model[]" id="inlineCheckbox9" value="Yoga 720">
            <label class="form-check-label" for="inlineCheckbox9">Yoga 720</label>
        </div>
        <div class="row mt-4">
            <div class="col">
             <button type="submit" name="submit" value="select" class="btn btn-sm btn-warning">Select</button>
            </div>
         </div>
    </form>
</div>

<div class="container mt-5">
    <div class="row">
        <?php foreach($data['pc'] as $lap) : ?>
        <div class="col-lg-4">
            <div class="card m-3" style="width: 18rem;">
                <img class="card-img-top"  style="height: 250px" src="<?= $lap->img_url;  ?>">
                <div class="card-body">
                    <h4 class="card-title"><?=$lap->brand; ?></h4>
                    <hr>
                    <p class="card-text"><?=$lap->model; ?></p>
                    <h5><span class="badge badge-lg badge-danger"><?=$lap->price ?></span></h5>
                    <h5><span class="badge badge-info pull-right">Buy Now</span></h5>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>







<?php require APPROOT . '/views/inc/footer.php'; ?>
