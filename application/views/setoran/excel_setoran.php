<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=LaporanSetoran.xls");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
	  <thead>
	    <tr>
          <th>Nama Peternak</th>
          <th>Tanggal</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total Harga</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php foreach ($setoran as $key): ?>
        <tr>
          <td>
                          <?php foreach ($user as $k)
                          {
                            if($k->id_user == $key->id_user)
                            {?>
                            <?php echo $k->nama_lengkap;
                            }
                          }
                          ?>
                        </td>
          <td><?php echo "'".date_format(date_create($key->tgl_setoran), "d F Y"); ?></td>
          <td><?php echo $key->jml_setoran; ?></td>
          <td><?php echo "Rp.".number_format($key->harga, 0, ',', '.'); ?></td>
          <td><?php echo "Rp.".number_format($key->total, 0, ',', '.'); ?></td>
          
        </tr>
      <?php endforeach ?>
	  </tbody>
	</table>
</body>
</html>