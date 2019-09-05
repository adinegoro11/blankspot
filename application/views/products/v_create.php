<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Tambah Barang</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url()?>product/create" method="post">

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Barang" autocomplete="off">
                </div> <?=form_error('nama')?>
            </div>

            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Jenis Barang</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="jenis" id="inlineRadio1" value="peralatan"> Peralatan
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jenis" id="inlineRadio2" value="chemical"> Chemical
                    </label>
                </div> <?=form_error('jenis')?>
            </div>

            <div class="form-group">
                <label for="stok_minimal" class="col-sm-2 control-label">Stok Minimal</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="stok_minimal" required="required" placeholder="Stok Minimal" autocomplete="off">
                </div> <?=form_error('stok_minimal')?>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-default" href="<?=base_url().'product/index'?>" role="button">Batal</a>
                </div>
            </div>
        </form>

    </div>
</div>