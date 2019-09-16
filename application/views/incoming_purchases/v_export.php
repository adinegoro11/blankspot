<h2>Barang Masuk</h2>
<table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($query as $s): ?>    
                <tr>
                    <td><?=$s->supplier?></td>
                    <td><?=$s->barang?></td>
                    <td><?=$s->jumlah?></td>
                    <td><?=date('d F Y', strtotime($s->tanggal))?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


