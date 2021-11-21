<!-- Begin Page Content -->
<div class="container-fluid">





    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body container">
                    <div class=" row">
                        <div class="col-md-5 ">
                            <img src="<?php echo (site_url('uploads/' . $user['picture'])); ?>" class="img-circle border border-dark rounded-lg" alt="" style="width:250px;height:250px">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" value="<?= $user['name'] ?>" aria-describedby="emailHelp" readOnly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" value="<?= $user['email'] ?>" aria-describedby="emailHelp" readOnly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <div class="col-lg-6 mb-4">


        </div>


    </div>

</div>
</div>

</div>
<!-- /.container-fluid -->

</div>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>