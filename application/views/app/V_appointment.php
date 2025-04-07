<!-- CONTENT 1 -->
<div class="container mb-5">
    <div class="d-flex gap-2">
        <div class="flex-grow-1 fs-5 font-monospace">Check Appointment</div>
    </div>
    <hr class="border-bottom border-2 border-dark" />
    <form action="<?= site_url('Appointment/index') ?>" method="get">
        <div class="d-flex flex-wrap gap-3">
            <div class="flex-fill">
                <label for="floatingInput" class="mb-2 form-label">ID Appointment</label>
                <input class="form-control" type="text" id="searchbyid" name="id_app" />
            </div>
            <div class="flex-fill">
                <label for="" class="mb-2 form-label">Nama Pasien</label>
                <input class="form-control" type="text" name="nama_pasien" aria-label="readonly input example" />
            </div>
        </div>
        <div class="flex-fill">
            <label for="" class="mb-2 form-label">Doctor</label>
            <select class="form-select" aria-label="Default select example" name="dokter">
                <option value="">--Select Doctor--</option>
                <?php foreach ($dokter as $dk) : ?>
                    <option value="<?= $dk['nama'] ?>"><?= $dk['nama'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="flex-fill">
            <label for="" class="mb-2 form-label">Date</label>
            <input class="form-control date" type="date" name="tanggal" />
        </div>
        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
            <button class="btn" id="reset-btn" type="reset" style="border: #198754 solid 1px; color: #198754" value="Reset" onclick="">Reset</button>
            <button class="btn btn-success" type="submit" onclick="">Search</button>
        </div>
    </form>
</div>
<!-- END OF CONTENT 1 -->

<!-- CONTENT 2 -->
<div class="container mt-3">
    <!-- MODAL APPOiNTMENT -->
    <!-- BUTTON MODAL -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#appointment">Make Appointment</button>
    <a href="<?= site_url('Appointment') ?>" class="btn btn-secondary">Back</a>
    <!-- MODAL -->
    <div class="modal fade" id="appointment" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= site_url('Appointment/tambah') ?>">
                    <div class="modal-body">
                        <div class="row gap-2">
                            <div class="col">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required />
                            </div>
                            <div class=" col">
                                <label for="dokter" class="form-label">Doctor</label>
                                <select class="form-select" aria-label="Default select example" name="dokter" id="dokter">
                                    <?php foreach ($dokter as $dk) : ?>
                                        <option value="<?= $dk['nama'] ?>"><?= $dk['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="">
                                <label for="id_akun" class="mb-2 form-label">ID Akun</label>
                                <input class="form-control" id="id_akun" name="id_akun" type="id_akun" required />
                            </div>
                            <div class="">
                                <label for="tanggal" class="mb-2 form-label">ID Akun</label>
                                <input class="form-control" id="tanggal" name="tanggal" type="date" required />
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Make Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END OF MODAL APPOINTMENT -->
    <hr class="border-bottom border-2 border-dark" />
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Doctor</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($find as $app) : ?>
                <tr>
                    <td class=""><?= $i ?></td>
                    <td class=""><?= $app['id_app'] ?></td>
                    <td class=""><?= $app['nama_pasien'] ?></td>
                    <td class=""><?= $app['dokter'] ?></td>
                    <td class=""><?= $app['tanggal'] ?></td>
                    <td class="">
                        <a href="" class="badge text-bg-success rounded-pill" data-bs-toggle="modal" data-bs-target="#edit<?= $app['id_app'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                        <a href="<?= site_url("Appointment/hapus/" . $app['id_app']); ?>" class="badge text-bg-danger rounded-pill" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit<?= $app['id_app'] ?>" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Your Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="<?= site_url('Appointment/ubah') ?>">
                                <div class="modal-body">
                                    <div class="row gap-2">
                                        <div class="col">
                                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $app['nama_pasien'] ?>" readonly />
                                        </div>
                                        <div class="col">
                                            <label for="dokter" class="form-label">Doctor</label>
                                            <select class="form-select" aria-label="Default select example" name="dokter" id="dokter">
                                                <?php foreach ($dokter as $dk) : ?>
                                                    <option value="<?= $dk['nama'] ?>"><?= $dk['nama'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="">
                                            <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                            <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $app['tanggal'] ?>" required />
                                        </div>
                                        <div class="d-none">
                                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="id_app" name="id_app" value="<?= $app['id_app'] ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            <?php $i++;
            endforeach ?>
        </tbody>
    </table>
    <?php if (empty($find)) : ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan
        </div>
    <?php endif; ?>
</div>
<!-- END OF CONTENT 2 -->