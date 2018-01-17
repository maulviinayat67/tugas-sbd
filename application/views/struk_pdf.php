<h1>
    <b> SEKAR SEAFOOD</b>
</h1>

<h2 >Kode Transaksi :
    <span style="text-transform:uppercase"><?php echo $kode_transaksi ?></span></h2>
<p >Nama Pemesan :
    <?php foreach ($nama_pemesan as $row) {
    echo $row->nama_pemesan;
} ?>
</p>
<p >Tanggal Transaksi :
    <?php foreach ($tgl_transaksi as $row) {
    echo $row->tanggal;
} ?>
</p>
<p >Status :
<?php foreach ($nama_pegawai as $row) {
    if ($row->nama !== '-') {
        echo 'Sudah dibayar';
    } else {
        echo "Belum dibayar";
    }
} ?>
</p>
<p >Nama Pegawai :
<?php foreach ($nama_pegawai as $row) {
    if ($row->nama !== '-') {
        echo $row->nama;
    } else {
        echo "-";
    }
} ?>
</p>
<table border="1" width="100%">
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
        <td><?php echo $row->jumlah ?></td>
        <td><?php echo $row->jumlah*$row->harga ?></td>
    </tr>
    <?php
                    }
                  ?>
</tbody>
</table>
<div>
<?php foreach ($total_harga->result() as $row) {
                      ?>
<h2>Total Harga : Rp.<?php echo $row->total_harga;
                  }?>
</h2>
