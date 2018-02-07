<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Struk</title>
<style type="text/css">
* {
  clear: both;
  font-family: 'roboto', sans-serif;
  color: #3E4651;
}

#struk {
  width:100%;
  padding: 0px;
}

#struk .banner {
  width: 100%;
  padding: 2px 16px;
  background-color: #303030;
}

#struk .end {
  width: 100%;
  padding: 8px 16px;
  background-color: #303030;
}

#struk .end p{
  text-align:center;
  color: white;
}

#struk .banner h1 {
  text-align: center;
  padding: 0px;
  color: white
}

#struk .content {
  width: 100%;
  padding: 8px 16px;
}

#struk .content .info-struk {
  width: 100%;
  /* margin: 32px auto; */
  border-bottom: 2px solid #303030;
}

#struk .content .info-struk h2 {
  /* margin: 8px auto; */
}

#struk .content .info-struk p {
  /* margin: 8px auto; */
}

#struk .content table {
  width: 100%;
  border-collapse: collapse;
  padding: 8px;
}

#struk .content table td,
#struk .content table th {
  border: 1px solid #303030;
  padding: 4px 8px;
}

#struk .content .sum-bill {
  font-weight: bold;
  font-size: 1.25em;
}

#struk .content .sum-bill td {
  border: none;
  padding-top: 8px;
}

#struk .content .sum-bill td:first-child {
  text-align: left
}

#struk .content .sum-bill td:last-child {
  text-align: right
}


</style>
</head>
<body>

<div id="struk">
  <div class="banner">
    <h1>SEKAR SEAFOOD</h1>
  </div>

  <div class="content">

    <div class="info-struk">
      <h2>Kode Transaksi : <span style="text-transform:uppercase"><?php echo $kode_transaksi ?></span></h2>
      <p>Nama Pemesan : <?php foreach ($nama_pemesan as $row) {
      echo $row->nama_pemesan;} ?></p>
      <p>Tanggal Transaksi :     <?php foreach ($tgl_transaksi as $row) {
          echo date("j F Y h:m:s",strtotime($row->tanggal));
      } ?></p>
      <p>Status : <?php foreach ($nama_pegawai as $row) {
          if ($row->nama !== '-') {
              echo 'Sudah dibayar';
          } else {
              echo "Belum dibayar";
          }
      } ?></p>
      <p>Nama Pegawai : <?php foreach ($nama_pegawai as $row) {
          if ($row->nama !== '-') {
              echo $row->nama;
          } else {
              echo "-";
          }
      } ?></p>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nama Makanan</th>
          <th>Harga Makanan (IDR)</th>
          <th>Kuantitas</th>
          <th>Jumlah (IDR)</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($detail_transaksi->result() as $row) {
        ?>
        <tr>
          <td><?php echo $row->nama_makanan ?></td>
          <td><?php echo $row->harga ?></td>
          <td style="text-align:center"><?php echo $row->jumlah ?></td>
          <td style="text-align:right"><?php echo $row->jumlah*$row->harga ?></td>
        </tr>
        <?php
          }
        ?>
        <tr class="sum-bill">
          <td colspan="3">Total Harga</td>
          <td><?php foreach ($total_harga->result() as $row) {
              ?>Rp.<?php echo $row->total_harga;
                    }?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="end">
    <p>Terima Kasih Sudah Memesan</p>
  </div>
</div>

</body>
</html>
