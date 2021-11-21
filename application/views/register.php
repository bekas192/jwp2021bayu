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
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('message')) { ?>
                                        <div class="col-lg-12 alerts">
                                            <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>

                                                <p><?php echo $this->session->flashdata('message'); ?></p>
                                            </div>
                                        </div>
                                    <?php } else {
                                    } ?>
                                    <form action="<?= base_url() ?>auth/register" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Enter name..." name="name" require>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" require>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" require>
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Repeat password" name="password2" require>
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input " id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Insert Picture</label>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="image">Insert picture, max 1Mb</label>
                                            <input type="file" name="image" class="form-control form-control-user" id="image" accept="image/png, image/jpeg, image/jpg, image/gif">
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