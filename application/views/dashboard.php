<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<style>
    .badge-o {
        font-size: 14px;
    }
</style>
<!-- Custom styles for this page -->
<link href="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.css'; ?>" rel="stylesheet">
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Data Users</h6> -->
        </div>
        <div class="card-body">
            <h1>DASHBOARD...</h1>
        </div>
    </div>    

</div>
<!-- /.container-fluid -->

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->
<?php $this->load->view('template/footer'); ?>