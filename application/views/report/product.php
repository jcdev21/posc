<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url().'assets/backend/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url().'assets/backend/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
</head>
<body>
    <header>
        <h3>Report Product</h3>
    </header>
    <main>
        <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $product->name; ?></td>
                        <td><?= $product->category; ?></td>
                        <td><?= $product->stock; ?></td>
                        <td><?= "Rp " . number_format($product->price,2,',','.'); ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <script src="<?= base_url().'assets/backend/vendor/jquery/jquery.min.js'; ?>"></script>
    <script src="<?= base_url().'assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?= base_url().'assets/backend/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>
    <script src="<?= base_url().'assets/backend/js/sb-admin-2.min.js'; ?>"></script>
</body>
</html>