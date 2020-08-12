<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<!-- Custom styles for this page -->
<link href="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.css'; ?>" rel="stylesheet">
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
        <a href="<?= base_url("product"); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    <div class="col-sm-6">
    <!-- Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary">Buat Berita Baru</h6> -->
            </div>
            <div class="card-body">
                <form method="POST" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-12">
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
                                <label for="categoryId">Category</label>
                                <select id="select-category" name="category" placeholder="Choise Category..." required>
                                    <option value="">Choise Category</option>
                                    <?php foreach ($categories as  $category) { ?>
                                        <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                                    <?php } ?>
                                </select>
                                <?php
                                    if (!empty(form_error('category'))) {
                                        echo form_error('category','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="priceId">Price</label>
                                <input type="text" name="price" id="priceId" class="form-control" value="<?= set_value('price'); ?>">
                                <?php
                                    if (!empty(form_error('price'))) {
                                        echo form_error('price','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="stockId">Stock</label>
                                <input type="text" name="stock" id="stockId" class="form-control" value="<?= set_value('stock'); ?>">
                                <?php
                                    if (!empty(form_error('stock'))) {
                                        echo form_error('stock','<small class="form-text text-danger">','</small>');
                                    }
                                ?>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" name="create_product" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</div>
<!-- /.container-fluid -->

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
    	$('#select-category').selectize({
    		sortField: 'text'
    	});
	});
</script>
<!-- Page level plugins -->
<script src="<?= base_url().'assets/backend/vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url().'assets/backend/js/demo/datatables-demo.js'; ?>"></script>
<?php $this->load->view('template/footer'); ?>