<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Laporan</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url()?>product/laporan" method="post">

            <div class="form-group">
                <label for="start_date" class="col-sm-2 control-label">Tanggal Awal</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="start_date" required="required" placeholder="Tanggal Awal" autocomplete="off">
                </div> <?=form_error('start_date')?>
            </div>

            <div class="form-group">
                <label for="end_date" class="col-sm-2 control-label">Tanggal Akhir</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="end_date" required="required" placeholder="Tanggal Akhir" autocomplete="off">
                </div> <?=form_error('end_date')?>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a class="btn btn-default" href="<?=base_url().'product/index'?>" role="button">Batal</a>
                </div>
            </div>
        </form>

    </div>
</div>


<?php if (isset($hasil)): ?>
<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Hasil Pencarian</h3> </div>
    <div class="panel-body">
        <h2>Barang Masuk</h2>
        <hr>
        <a class="btn btn-primary" href="<?=base_url().'incoming_purchase/export/'.$start_date.'/'.$end_date?>" role="button" target="_blank">Cetak</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($query_masuk as $s): ?>    
                <tr>
                    <td><?=$s->supplier?></td>
                    <td><?=$s->barang?></td>
                    <td><?=$s->jumlah?></td>
                    <td><?=date('d F Y', strtotime($s->tanggal))?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Barang Keluar</h2>
        <hr>
        <a class="btn btn-primary" href="<?=base_url().'outgoing_purchase/export/'.$start_date.'/'.$end_date?>" role="button" target="_blank">Cetak</a>
        <table class="table table-striped">
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
                <?php foreach ($query_keluar as $s): ?>    
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

    </div>
</div>

<?php endif; ?>