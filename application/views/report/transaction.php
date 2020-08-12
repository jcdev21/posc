<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Transaction</title>

    <style>
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: #fff;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
        table * {
            position: relative;
        }
        thead {
            background: #36304a;
            color: #fff;
        }
        thead th, tbody td {
            text-align: left;
        }
        thead th {
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 1rem;
        }
        tbody tr:nth-child(even) {
            background: #dddddd;
        }
        tbody td {
            padding: .5rem 0;
            padding-left: 1rem;
        }
    </style>

</head>
<body>
    <header>
        <h3>Report Transaction</h3>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($transactions as $transaction) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $transaction->code_transaction; ?></td>
                        <td><?= get_date_indo($transaction->date); ?></td>
                        <td><?= "Rp " . number_format($transaction->overall_price,2,',','.'); ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>