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
<div>
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
                <?php if (isset($_SESSION['customers_role']) == 99) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= URLROOT; ?>/infos/products">Laptops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= URLROOT; ?>/admins/admins">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= URLROOT; ?>/pages/login">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

    <table class="table table-dark table-hover  container mt-5">
        <thead>
        <tr class="text-warning">
            <?php foreach ($data['allCustomers'][0] as $key => $value ) :?>
            <th scope="col"><?= $key ?></th>
            <?php endforeach;?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['allCustomers'] as $user) :?>
        <tr>
            <th scope="row"><?= $user->id ?></th>
            <td><?= $user->name ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->role ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="container mt-3">
        <form action="<?= URLROOT ;?>/admins/admins" method="post">
            <div class="row">
                 <div class="col-md-3 form-group form-inline">
                     <input type="text" class="form-control <?=
                     (!empty($data['id_err'])) ? 'is-invalid' : ''; ?>" value="<?= (!empty($data['get_user'])) ? $data['get_user']->id : '' ;?>"  name="id" placeholder="ID">
                     <span class="invalid-feedback position-absolute mt-4"><?= $data['id_err']; ?></span>
                </div>
                <div class="col-md-3 form-group form-inline">
                    <input type="text"  name="name" class="form-control" value="<?= (!empty($data['get_user'])) ? $data['get_user']->name : '' ;?>" placeholder="name">
                    <span class="invalid-feedback position-absolute mt-4"><?= $data['name_err']; ?></span>
                </div>
                <div class="col-md-3 form-group form-inline">
                    <input type="email" name="email" class="form-control" value="<?= (!empty($data['get_user'])) ? $data['get_user']->email : '' ;?>" placeholder="email">
                    <span class="invalid-feedback position-absolute mt-4"><?= $data['email_err']; ?></span>
                </div>
                <div class=" col-md-3 form-group form-inline">
                    <input type="text" name="role"  class="form-control" value="<?= (!empty($data['get_user'])) ? $data['get_user']->role : '' ;?>" placeholder="role">
                    <span class="invalid-feedback position-absolute mt-4"><?= $data['role_err']; ?></span>
                </div>
              </div>
            <div>
                <button type="submit"  name="select"  class="btn btn-info  mr-3 pull-right">SELECT</button>
            </div>
            <div>
                <button type="submit" name="refresh" class="btn btn-success mr-3 pull-right">REFRESH</button>
            </div>
            <div>
                <button type="submit" name="update" class="btn btn-warning mr-3 pull-right">UDPDATE</button>
            </div>
            <div>
                <button  style="border-radius: 10px;"  name="delete" type="submit" class="btn btn-danger  mr-3 pull-right">DELETE</button>
            </div>
        </form>
    </div>

    <div class="container mt-5">
        <label for="admin">Admin</label>
        <div class="progress mb-3 ">
            <div name="admin" class="progress-bar bg-info" role="progressbar" style="width: <?=$data['adminProc']; ?>" ><?=$data['admin'] . ' ' .  '(' . $data['adminProc'] . ')'; ?></div>
        </div>
        <label for="users">Users</label>
        <div class="progress mb-3 ">
            <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$data['userProc']; ?>"><?=$data['user'] . ' ' .  '(' . $data['userProc'] . ')' ; ?></div>
        </div>
        <label for="admin">All Users</label>
        <div class="progress mb-3">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" ><?=$data['usersAmount']; ?></div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>

