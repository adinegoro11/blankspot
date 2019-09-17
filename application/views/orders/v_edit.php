<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Ubah Order Barang</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url().'order/edit/'.$id?>" method="post">
            
            <div class="form-group">
                <label for="product_name" class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="product_name" value="<?=$query->product_name?>" required="required" placeholder="Nama Barang" autocomplete="off">
                </div> <?=form_error('product_name')?>
            </div>

            <div class="form-group">
                <label for="user_id" class="col-sm-2 control-label">Pengambil</label>
                <div class="col-sm-5">
                    <select class="form-control js-example-basic-single" name="user_id" required="required">
                        <option value="">-- Pilih Pengambil --</option>
                        <?php 
                        foreach ($dropdown_user as $s){
                            $s->id == $query->user_id ? $selected = 'selected' : $selected = null;
                            echo "<option value=".$s->id." ".$selected.">".$s->nama_lengkap."</option>";
                        }  
                        ?>
                    </select>
                </div> <?=form_error('user_id')?>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Qty</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="jumlah" value="<?=$query->jumlah?>" required="required" placeholder="Qty" autocomplete="off">
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
                    <input type="date" class="form-control" name="tanggal" required="required" placeholder="Tanggal" autocomplete="off">
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
