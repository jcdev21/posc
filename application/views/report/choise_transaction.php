<?php $this->load->view('template/head'); ?>
<!-- Custom CSS -->
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<?php $this->load->view('template/main'); ?>
<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/topbar'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Report Transaction</h1>
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
                                <label for="" class="control-label">Start Date</label>
                                <input type="text" name="startDate" id="startDate" class="form-control" placeholder="YYYY-MM-DD" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">End Date</label>
                                <input type="text" name="endDate" id="endDate" class="form-control" placeholder="YYYY-MM-DD" required>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" name="create_report" class="btn btn-primary" value="Print">
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</div>
<!-- /.container-fluid -->

<?php $this->load->view('template/js'); ?>
<!-- Custom JS -->

<!-- Date Picker -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#startDate').datepicker({
        uiLibrary: 'bootstrap4',
        format:"yyyy-mm-dd"
    });
    $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        format:"yyyy-mm-dd",
    });
</script>

<?php $this->load->view('template/footer'); ?>