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
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="<?= base_url("product/create"); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Product</a>
    </div>

    <?php echo $this->session->flashdata('message');?>
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
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $product->name; ?></td>
                            <td><?= $product->category; ?></td>
                            <td><?= "Rp " . number_format($product->price,2,',','.'); ?></td>
                            <td>
                                <span class="badge badge-light badge-o"><?= $product->stock; ?></span>
                                <button type="button" class="btn btn-primary btn-circle btn-sm btnEditStock" data-id="<?= $product->id; ?>" data-stock="<?= $product->stock; ?>">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                            <td>
                                <a href="<?= base_url("product/edit/$product->id"); ?>" class="btn btn-warning btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url("product/delete/$product->id"); ?>" class="btn btn-danger btn-circle btn-sm" title="Delete" onClick='return confirm("menghapus product <?= $product->name ?>?");'><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formStockEdit" action="<?= base_url("product/edit_stock"); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-body-category">
                        <div class="form-group">
                            <label for="stockId">Add Stock</label> | Stock : <span class="jmlStock badge badge-info"></span>
                            <input type="text" name="stock" id="stockId" class="form-control" value="<?= set_value('stock'); ?>" placeholder="Enter Add Stock" required />
                            <?php
                                if (!empty(form_error('stock'))) {
                                    echo form_error('stock','<small class="form-text text-danger">','</small>');
                                }
                            ?>
                        </div>
                        <input type="hidden" name="stock_now" id="stockNowID">
                        <input type="hidden" name="id" id="productID">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit_stock" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</div>
<!-- /.container-fluid -->

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->
<script>
    const btnEditstock = document.querySelectorAll('.btnEditStock');
    
    btnEditstock.forEach(element => {
        element.addEventListener('click', async function () {
            document.querySelector('.jmlStock').innerHTML = parseInt(this.getAttribute('data-stock'));
            document.querySelector('#stockNowID').value = parseInt(this.getAttribute('data-stock'));
            document.querySelector('#productID').value = parseInt(this.getAttribute('data-id'));
            $("#modalEditStock").modal('show');
        });
    });
</script>
<!-- Page level plugins -->
<script src="<?= base_url().'assets/backend/vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url().'assets/backend/js/demo/datatables-demo.js'; ?>"></script>
<?php $this->load->view('template/footer'); ?>