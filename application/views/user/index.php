<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<!-- Custom styles for this page -->
<link href="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.css'; ?>" rel="stylesheet">
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="<?= base_url("user/create"); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
    </div>

    <?php echo $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Data Users</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $user->name; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->level; ?></td>
                            <td><?= $user->status; ?></td>
                            <td><?= $user->contact; ?></td>
                            <td>
                                <a href="<?= base_url("user/edit/$user->id"); ?>" class="btn btn-warning btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url("user/change_password/$user->id"); ?>" class="btn btn-secondary btn-circle btn-sm" title="Change Password"><i class="fas fa-key"></i></a>
                                <a href="<?= base_url("user/delete/$user->id"); ?>" class="btn btn-danger btn-circle btn-sm" title="Delete" onClick='return confirm("menghapus user <?= $user->name ?>?");'><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->
<!-- Page level plugins -->
<script src="<?= base_url().'assets/backend/vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url().'assets/backend/js/demo/datatables-demo.js'; ?>"></script>
<?php $this->load->view('template/footer'); ?>