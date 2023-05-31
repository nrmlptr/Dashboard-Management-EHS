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
    
    <style>
        .footer-text {
            color: black;
            text-shadow: none;
            font-weight: bold;
            font-size: 14px;
        }
        .login_content {
            padding: 20px;
            margin: 10px;
        }
    </style>

    <body class="login bg-image" style="background-image: url(<?= base_url('assets/gambar/cbi1.jpg')?>); background-repeat: no-repeat; background-size: 100% auto; width: 100%;">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form" >
                    <section class="login_content" style="background-color: white; padding: 20px;">
                        <?php if ($this->session->flashdata('error')) : ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif; ?>
                        <form action="<?php echo base_url('Login/verifyLogin');?>" method="POST">
                            <h1 style="color: black;">Login Form</h1>
                            <div>
                                <?php echo (form_error('username') != '') ? 'has-error' : ''; ?>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="" value="<?php echo set_value('username'); ?>"/>
                                <?php echo form_error('username'); ?>
                            </div>
                            <div>
							    <?php echo (form_error('password') != '') ? 'has-error' : ''; ?>
                                    <input type="password" class="form-control" name="upass" placeholder="Password" required="" id="upass" />
                                <?php echo form_error('password'); ?>
                            </div>
                            <div>
                                <button class="btn btn-round btn-secondary" type="submit">Log In</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">
                                    <a href="<?= base_url('Layout/index');?>" class="btn btn-outline-secondary btn-sm" style="color: black;">Kembali ke Dashboard </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <p class="footer-text">©2023 All Rights Reserved. <br> EHS Dept - PT Century Batteries Indonesia. <br> Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
