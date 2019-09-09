<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Ubah Order Barang</h3> </div>
    <div class="panel-body">
    
        <form class="form-horizontal" action="<?= base_url().'user/edit/'.$id?>" method="post">

         
            <div class="form-group">
                <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_lengkap" value="<?=$query->nama_lengkap?>" required="required" placeholder="Nama Lengkap" autocomplete="off">
                </div> <?=form_error('nama_lengkap')?>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" value="<?=$query->username?>" required="required" placeholder="Username" autocomplete="off">
                </div> <?=form_error('username')?>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" required="required" placeholder="Password" autocomplete="off">
                </div> <?=form_error('password')?>
            </div>

            <div class="form-group">
                <label for="nik" class="col-sm-2 control-label">NIK</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nik" value="<?=$query->nik?>" required="required" placeholder="NIK" autocomplete="off">
                </div> <?=form_error('nik')?>
            </div>

            <div class="form-group">
                <label for="level" class="col-sm-2 control-label">Level</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="level" value="Admin"> Admin
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="level" value="User"> User
                    </label>
                </div> <?=form_error('level')?>
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
