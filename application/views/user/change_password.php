<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Password User</h1>
        <a href="<?= base_url("user"); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    <div class="col-sm-6">
    <!-- Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary">Buat Berita Baru</h6> -->
            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('error');?>
                <form method="POST" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="oldPasswordId">Old Password</label>
                                <input type="password" name="oldPassword" id="oldPasswordId" class="form-control" value="<?= set_value('oldPassword'); ?>">
                                <?php
                                    if (!empty(form_error('oldPassword'))) {
                                        echo form_error('oldPassword','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="newPasswordId">New Password</label>
                                <input type="password" name="newPassword" id="newPasswordId" class="form-control" value="<?= set_value('newPassword'); ?>">
                                <?php
                                    if (!empty(form_error('newPassword'))) {
                                        echo form_error('newPassword','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" name="change_password" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</div>
<!-- /.container-fluid -->

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->
<?php $this->load->view('template/footer'); ?>