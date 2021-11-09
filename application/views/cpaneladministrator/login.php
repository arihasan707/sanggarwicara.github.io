<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>template/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>template/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/login/css/style.css">

    <title>SanggarWicara | Log In</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo base_url(); ?>template/login/images/logogede.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <?php if ($this->session->flashdata('alert')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('alert'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="mb-4">
                                <h3>Admin Sanggar Wicara</h3>
                                <p class="mb-4">Silahkan login terlebih dahulu, Terima Kasih.</p>
                            </div>
                            <form action=" <?php echo base_url() . 'cpaneladministrator/logprs' ?>" method="post">
                                <div class="form-group first">

                                    <input type="text" name="pengguna" class="form-control" placeholder="Username">

                                </div>
                                <div class="form-group last mb-4">

                                    <input type="password" name="ksandi" class="form-control" placeholder="Password">

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" />
                                        <div class="control__indicator"></div>
                                    </label>

                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>template/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>template/login/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>template/login/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>template/login/js/main.js"></script>
</body>

</html>