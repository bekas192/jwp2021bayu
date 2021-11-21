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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Picture</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($all as $get) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $get->name ?></td>
                                            <td><?= $get->email ?></td>
                                            <td><img src="<?php echo (site_url('uploads/' . $user['picture'])); ?>" class="img-circle border border-dark rounded-lg" alt="" style="width:75px;height:75px"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>


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
</div>
<!-- End of Page Wrapper -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({});
    });
</script>