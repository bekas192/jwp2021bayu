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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('message')) { ?>

                                        <p><?php echo $this->session->flashdata('message'); ?></p>


                                    <?php } else {
                                    } ?>
                                    <form class="user" action="<?= base_url() ?>auth" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary form-control">Login</button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url() ?>auth/forgot_password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url() ?>auth/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>