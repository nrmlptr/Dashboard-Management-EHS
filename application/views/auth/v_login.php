<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EHS System | Login </title>

        <!-- Bootstrap -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= base_url('assets/gentelella-master/')?>build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="login">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="<?php echo base_url('Login/verifyLogin');?>" method="POST">
                            <h1>Login Form</h1>
                            <div>
                                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" name="upass" placeholder="Password" required="" />
                            </div>
                            <div>
                                <button class="btn btn-round btn-secondary" type="submit">Log In</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">
                                    <a href="<?= base_url('Layout/index');?>" class="btn btn-outline-secondary btn-sm">Kembali ke Dashboard </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                                <p>©2023 All Rights Reserved. <br> EHS Dept - PT Century Batteries Indonesia. <br> Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
