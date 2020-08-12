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
        <h1 class="h3 mb-0 text-gray-800">Data Transaction</h1>
    </div>

    <?php echo $this->session->flashdata('message');?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Data Users</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="table" width="100%" cellspacing="0" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Transaction</th>
                        <th>Date <small>s: yyyy-mm-dd</small></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
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
<!-- Page level plugins -->
<script src="<?= base_url().'assets/backend/vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url().'assets/backend/js/demo/datatables-demo.js'; ?>"></script>

<script>
    $(document).ready(function () {
        //datatables
        table = $('#table').DataTable({
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('transaction/get_data_transaction')?>",
                "type": "POST"
            },
            
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "orderable": false, 
                },
            ],    
        });    
    });
</script>

<?php $this->load->view('template/footer'); ?>