<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Themes Lab - Creative Laborator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>template/assets/global/images/favicon.png">
        <link href="<?php echo base_url(); ?>template/assets/global/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/assets/global/css/ui.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    </head>
    <body class="account separate-inputs" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">



                    <?php $error = $this->session->userdata('login_error');
                        if($error == "failed"){
                            $this->session->unset_userdata('login_error');
                    ?>
                    <div style="color: red;"> <h3><b>Wrong login credentials provided!</b></h3></div>
                    <?php } 

                        $checkemail = $this->session->userdata('reset_email');
                        if($checkemail == "exists"){
                            $this->session->unset_userdata('reset_email');
                    ?>

                    <div style="color: green;"> <h3><b>Password send to your email!</b></h3></div>
                    <?php } elseif ($checkemail == "notexists") {
                        $this->session->unset_userdata('reset_email');
                    ?>
                    <div style="color: red;"> <h3><b>Email address don't match with any of our records!</b></h3></div>
                    <?php } ?>



                        <i class="user-img icons-faces-users-03"></i>
                        <form class="form-signin" role="form" method="post" action="">
                            <div class="append-icon">
                                <input type="email" name="email" id="email" class="form-control form-white username" placeholder="Email" required>
                                <i class="icon-user"></i><br/><br/>
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit"  class="btn btn-lg btn-danger btn-block ladda-button">Sign In</button>
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a id="password" href="#">Forgot password?</a></p>
                            </div>
                        </form>

                        <form class="form-password" method="post" action="<?=base_url("login/reset_password/");?>" role="form">
                            <div class="append-icon m-b-20">
                                <input type="email" name="reset_email" class="form-control form-white username" placeholder="Email" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" class="btn btn-lg btn-danger btn-block ladda-button" >Send Password to email</button>
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a id="login" href="#">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>template/assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>template/assets/global/plugins/backstretch/backstretch.min.js"></script>
        <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="<?php echo base_url(); ?>template/assets/global/js/pages/login-v1.js"></script>
    </body>
</html>

