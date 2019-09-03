<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Edit Data</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url()?>supplier/edit" method="post">
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" required="required" placeholder="Nama supplier" autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" required="required"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </div>
        </form>

    </div>
</div>