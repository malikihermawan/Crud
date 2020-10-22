<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome User</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>


    <style>
        .card {
            margin: 3%;
        }

        #alert {
            margin: 5%;
        }
    </style>

</head>

<body>

    <?= session()->getflashdata('pesan'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="float: right; width:10%;">
                Insert
            </button>
            <h6 class="m-0 font-weight-bold text-primary">Data user</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>No.hp</th>
                        <th>Level</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->username; ?></td>
                            <td><?= $row->password; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->no_hp; ?></td>
                            <td><?= $row->level; ?></td>
                            <td><?= $row->alamat; ?></td>
                            <td>
                                <button type="button" class="btn btn-success fa fa-edit" data-toggle="modal" data-target="#edit<?= $row->id_user; ?> "></button>
                                <a href="<?= base_url('crud/hapus/' . $row->id_user); ?>"> <button type="button" class="btn btn-danger fa fa-trash-alt"> </button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>



    <!-- FORM MODAL TAMBAH   -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: cornflowerblue;">
                    <h5 class="modal-title" id="modalSayaLabel" style="color:white;">Insert Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('crud/tambah_user'); ?>" method="post">
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-goup">
                            <label>Password :</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>No.hp :</label>
                            <input type="number" name="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Level :</label>
                            <select name="level" class="form-control">
                                <option disabled>pilih</option>
                                <option value="admin">admin</option>
                                <option value="karyawan">karyawan</option>
                                <option value="kasir">kasir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat :</label>
                            <textarea name="alamat" cols="20" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <!-- FORM MODAL EDIT -->
    <?php foreach ($user as $row) : ?>
        <div class="modal fade" tabindex="-1" id="edit<?= $row->id_user; ?>" aria-labelledby="modaltambah" aria-hidden="true" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: cornflowerblue ;">
                        <h5 class="modal-title" id="modaltambah" style="color: white;">Update Data </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('crud/edit_data/' . $row->id_user); ?>" method="post">
                            <input type="hidden" name="id_user" value="<?= $row->id_user; ?>">
                            <div class="form-group">
                                <label>Username :</label>
                                <input type="text" name="user" class="form-control" required value="<?= $row->username; ?>">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="pass" class="form-control" required value="<?= $row->password; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" required value="<?= $row->email; ?>">
                            </div>
                            <div class="form-group">
                                <label>No.hp</label>
                                <input type="number" name="no" class="form-control" required value="<?= $row->no_hp; ?>">
                            </div>
                            <div class="form-group">
                                <label>Level :</label>
                                <select name="level" class="form-control">
                                    <option disabled>~pilih ~</option>
                                    <option value="<?= $row->level; ?>"><?= $row->level; ?></option>
                                    <option value="karyawan">Karyawan</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat :</label>
                                <input type="text" name="alamat" class="form-control" required value="<?= $row->alamat; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>



</body>

<script>
    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>/template/js/jquery-3.4.1.js"></script>
<script src="<?= base_url() ?>/template/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>/template/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>/template/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>/template/js/demo/chart-pie-demo.js"></script>
