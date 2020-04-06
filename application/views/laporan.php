<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
    <h1><?php echo "Laporan $title" ?></h1>
    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            
                            <th width="40%">Nama Produk</th>
                            <th width="30%">Stok Tersisa</th>
                            <th width="30%">Jumlah Terjual</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($order as $data) { ?>
                        <tr>
                            
                            <td><center><?php echo $data->nama_produk?></center></td>
                            <td><center><?php echo $data->stok?></center></td>
                            <td><center><?php echo $data->jumlahterjual?></center></td>
      

<!-- /page content -->

                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
</body>
</html>