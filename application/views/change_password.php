<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('message')) { ?>

                                        <?php echo $this->session->flashdata('message'); ?>

                                    <?php } else {
                                    } ?>

                                    <form action="<?= base_url() ?>auth/change_password" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Insert password" value="<?= $this->session->userdata['reset_password'] ?>" name="email" readonly>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Insert password" name="password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Repeat password" name="password2">
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">SUBMIT</button>
                                        <br>
                                        <a href="<?= base_url() ?>auth" class="form-control btn btn-warning">Back to auth</a>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>