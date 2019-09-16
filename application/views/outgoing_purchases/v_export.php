<h2>Barang Keluar</h2>
<table class="table table-striped" border="1">
<thead>
    <tr>
        <th>Judul</th>
        <th>Nama Barang</th>
        <th>Nama Pengambil</th>
        <th>Qty</th>
        <th>Keperluan</th>
        <th>Tanggal</th>
    
    </tr>
</thead>
           
<tbody>
    <?php foreach ($query as $s): ?>    
    <tr>
        <td><?=$s->judul?></td>
        <td><?=$s->barang?></td>
        <td><?=$s->nama_lengkap?></td>
        <td><?=$s->jumlah?></td>
        <td><?=$s->keperluan?></td>
        <td><?=date('d F Y', strtotime($s->tanggal))?></td>
        
    </tr>
    <?php endforeach; ?>
</tbody>
</table>


