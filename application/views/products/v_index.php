<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Master Barang</h3> </div>
    <div class="panel-body">
        <?php if ($this->session->userdata('level')=='admin'): ?>
        <a class="btn btn-success" href="<?= base_url()?>product/create" role="button">Tambah</a>
        <?php endif; ?>
        <hr>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Jumlah Masuk</th>
                    <th>Jumlah Keluar</th>
                    <th>Stok</th>
                    <th>Stok Minimal</th>
                    <?php if ($this->session->userdata('level')=='admin'): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Jumlah Masuk</th>
                    <th>Jumlah Keluar</th>
                    <th>Stok</th>
                    <th>Stok Minimal</th>
                    <?php if ($this->session->userdata('level')=='admin'): ?>
                    <th></th>
                    <?php endif; ?>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    foreach ($query as $s) {
                        $s['stok'] < $s['stok_minimal'] ? $class = 'class="danger"' : $class = null; ?>    
                <tr <?=$class?>>
                    <td><?=$s['nama']?></td>
                    <td><?=$s['jenis']?></td>
                    <td><?=$s['total_masuk']?></td>
                    <td><?=$s['total_keluar']?></td>
                    <td><?=$s['stok']?></td>
                    <td><?=$s['stok_minimal']?></td>
                    <?php if ($this->session->userdata('level')=='admin'): ?>
                    <td>
                        <a class="btn btn-default" href="<?=base_url().'product/edit/'.$s['id']?>" role="button">Ubah</a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php
                    }?>
            </tbody>

          </table>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// Setup - add a text input to each footer cell
	    $('#data tfoot th').each( function () {
	        var title = $(this).text();
	        if(title !=''){
	        	 $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
	        }
	       
		});
	    
	    // DataTable
		var table = $('#data').DataTable();   
		
		// Apply the search
		table.columns().every( function () {
			var that = this;
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			});
		} );
	});
</script>