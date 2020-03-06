<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper">
    <div class="row my-0">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card card-body mt-5 text-center " style="background-color: transparent;">
                <h2>Create An Account</h2>
                <p>Please fill out this form to register with us</p>
                <form method="post">
                    <div class="form-group">
                        <input  type="text" name="name" class="<?=
                        (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>" placeholder="enter your name">
                        <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input  type="email" name="email" class=" <?=
                        (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>" placeholder="enter your email">
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input  type="password" name="password" class="<?=
                        (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>" placeholder="enter your password">
                        <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <input  type="password" name="confirm_password" class="<?=
                        (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['confirm_password']; ?>" placeholder="confirm your password">
                        <span class="invalid-feedback"><?= $data['confirm_password_err'] ?></span>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <button type="submit" name="submit" value="Register" class="btn btn-warning">Register</button>
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT; ?>/pages/login" class="btn btn-info">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>









<?php require APPROOT . '/views/inc/footer.php'; ?>