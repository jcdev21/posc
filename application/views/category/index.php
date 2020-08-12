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
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalAddCategory">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Category
        </button>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                    <?php foreach ($categories as $category) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $category->name; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-circle btn-sm btnEdit" data-id="<?= $category->id ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url("category/delete/$category->id"); ?>" class="btn btn-danger btn-circle btn-sm" title="Delete" onClick='return confirm("menghapus category <?= $category->name ?>?");'><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formCategory" action="<?= base_url("category/create"); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-body-category">
                        <div class="form-group">
                            <label for="nameCategory">Name Category</label>
                            <input type="text" name="name" id="nameCategory" class="form-control" value="<?= set_value('name'); ?>" placeholder="Enter Name Category" required />
                            <?php
                                if (!empty(form_error('name'))) {
                                    echo form_error('name','<small class="form-text text-danger">','</small>');
                                }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="create_category" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formCategoryEdit" action="<?= base_url("category/edit"); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-body-category">
                        <div class="form-group">
                            <label for="nameCategoryEdit">Name Category</label>
                            <input type="text" name="name" id="nameCategoryEdit" class="form-control nameEdit" value="<?= set_value('name'); ?>" placeholder="Enter Name Category" required />
                            <?php
                                if (!empty(form_error('name'))) {
                                    echo form_error('name','<small class="form-text text-danger">','</small>');
                                }
                            ?>
                        </div>
                        <input type="hidden" name="id" id="inputID">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit_category" class="btn btn-primary" value="Save">
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
    const btnEdit = document.querySelectorAll('.btnEdit');
    btnEdit.forEach(element => {
        element.addEventListener('click', async function (e) {
            const id = parseInt(this.getAttribute("data-id"));

            const res = await fetch(`${base_url}category/get`, {
                method: 'POST',
                body: JSON.stringify({ id: id }),
                headers: {
                    'Content-Type': 'application/json'
                },
            });

            const result = await res.json();

            document.querySelector('.nameEdit').value = result.name;
            document.querySelector('#inputID').value = id;
            $("#modalEditCategory").modal('show');
        });
    });
</script>
<!-- Page level plugins -->
<script src="<?= base_url().'assets/backend/vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url().'assets/backend/js/demo/datatables-demo.js'; ?>"></script>
<?php $this->load->view('template/footer'); ?>