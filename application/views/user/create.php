<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add User</h1>
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
                                <label for="levelId">Level</label>
                                <select name="level" id="levelId" class="form-control">
                                    <option value="">--Pilih Level--</option>
                                    <?php foreach ($levels as $level) { ?>
                                        <option value="<?= $level->id; ?>" <?= set_select('level', $level->id, False); ?>><?= $level->level; ?></option>
                                    <?php } ?>
                                </select>
                                <?php
                                    if (!empty(form_error('level'))) {
                                        echo form_error('level','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="emailId">Email</label>
                                <input type="email" name="email" id="emailId" class="form-control" value="<?= set_value('email'); ?>">
                                <?php
                                    if (!empty(form_error('email'))) {
                                        echo form_error('email','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="passwordId">Password</label>
                                <input type="password" name="password" id="passwordId" class="form-control" value="<?= set_value('password'); ?>">
                                <?php
                                    if (!empty(form_error('password'))) {
                                        echo form_error('password','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="nameId">Name</label>
                                <input type="text" name="name" id="nameId" class="form-control" value="<?= set_value('name'); ?>">
                                <?php
                                    if (!empty(form_error('name'))) {
                                        echo form_error('name','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="contactId">Contact</label>
                                <input type="text" name="contact" id="contactId" class="form-control" value="<?= set_value('contact'); ?>">
                                <?php
                                    if (!empty(form_error('contact'))) {
                                        echo form_error('contact','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="status" id="statusId" class="form-check-input" value="active">
                                <label for="statusId">Active</label>
                                <?php
                                    if (!empty(form_error('status'))) {
                                        echo form_error('status','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" name="create_user" class="btn btn-primary" value="Save">
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