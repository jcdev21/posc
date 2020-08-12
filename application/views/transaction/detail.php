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
        <h1 class="h3 mb-0 text-gray-800">Detail Transaction</h1>
    </div>

    <?php echo $this->session->flashdata('message');?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Data Users</h6> -->
        </div>
        <div class="card-body">
            <h4>Code Transaction : <?= $transaction->code_transaction; ?></h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Name Product</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Overall Price</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        $datas = json_decode($transaction->datas);

                    ?>
                    <?php foreach ($datas as $key => $value) { ?>
                        <?php $totalPriceProd = ($value->price * $value->qty); ?>
                        <tr>
                            <td><?= $no.'.'; ?></td>
                            <td><?= $value->name; ?></td>
                            <td><?= "Rp " . number_format($value->price,2,',','.'); ?></td>
                            <td><?= $value->qty; ?></td>
                            <td><?= "Rp " . number_format($totalPriceProd,2,',','.'); ?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                    <tr>
                        <td colspan="4" align="right"><b>Total</b></td>
                        <td><?= "Rp " . number_format($transaction->overall_price,2,',','.'); ?></td>
                    </tr>
                </tbody>
            </table>
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