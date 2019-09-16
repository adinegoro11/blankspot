<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Tambah Order Barang</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url()?>order/create" method="post">

            <div class="form-group">
                <label for="product_id" class="col-sm-2 control-label">Barang</label>
                <div class="col-sm-5">
                    <select class="form-control js-example-basic-single" name="product_id" required="required">
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach ($dropdown_product as $s): ?>    
                            <option value="<?=$s->id?>"><?=$s->nama?></option>
                        <?php endforeach; ?>
                    </select>
                </div> <?=form_error('product_id')?>
            </div>

            <div class="form-group">
                <label for="user_id" class="col-sm-2 control-label">Diajukan Oleh</label>
                <div class="col-sm-5">
                    <select class="form-control js-example-basic-single" name="user_id" required="required">
                        <option value="">-- Pilih Customer --</option>
                        <?php foreach ($dropdown_user as $s): ?>    
                            <option value="<?=$s->id?>"><?=$s->nama_lengkap?></option>
                        <?php endforeach; ?>
                    </select>
                </div> <?=form_error('customer_id')?>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Qty</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="jumlah" required="required" placeholder="Qty" autocomplete="off">
                </div> <?=form_error('jumlah')?>
            </div>

            <div class="form-group">
                <label for="keperluan" class="col-sm-2 control-label">Keperluan</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="keperluan" value="Internal"> Internal
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="keperluan" value="External"> External
                    </label>
                </div> <?=form_error('keperluan')?>
            </div>

            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal" required="required" placeholder="Tanggal Masuk" autocomplete="off">
                </div> <?=form_error('tanggal')?>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-default" href="<?=base_url().'order/index'?>" role="button">Batal</a>
                </div>
            </div>

        </form>

    </div>
</div>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>