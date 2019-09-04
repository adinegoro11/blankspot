<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Ubah Barang Masuk</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url().'incoming_purchase/edit/'.$id?>" method="post">
            
            <div class="form-group">
                <label for="product_id" class="col-sm-2 control-label">Barang</label>
                <div class="col-sm-5">
                    <select class="form-control js-example-basic-single" name="product_id" required="required">
                        <option value="">-- Pilih Barang --</option>
                        <?php 
                        foreach ($dropdown_product as $s):    
                            $s->id == $query->product_id ? $selected = 'selected' : $selected = null;
                            echo "<option value=".$s->id." ".$selected.">".$s->nama."</option>";
                        endforeach;
                        ?>
                    </select>
                </div> <?=form_error('product_id')?>
            </div>

            <div class="form-group">
                <label for="supplier_id" class="col-sm-2 control-label">Supplier</label>
                <div class="col-sm-5">
                    <select class="form-control js-example-basic-single" name="supplier_id" required="required">
                        <option value="">-- Pilih Barang --</option>
                        <?php 
                        foreach ($dropdown_supplier as $s):    
                            $s->id == $query->supplier_id ? $selected = 'selected' : $selected = null;
                            echo "<option value=".$s->id." ".$selected.">".$s->nama."</option>";
                        endforeach;
                        ?>
                    </select>
                </div> <?=form_error('supplier_id')?>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Qty</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="jumlah" value="<?=$query->jumlah?>" required="required" placeholder="Qty" autocomplete="off">
                </div> <?=form_error('jumlah')?>
            </div>

            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal Masuk</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal" required="required" placeholder="Tanggal Masuk" autocomplete="off">
                </div> <?=form_error('tanggal')?>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-default" href="<?=base_url().'incoming_purchase/index'?>" role="button">Batal</a>
                </div>
            </div>

        </form>

    </div>
</div>
