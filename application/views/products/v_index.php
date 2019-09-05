<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Data Barang</h3> </div>
    <div class="panel-body">
        <a class="btn btn-success" href="<?= base_url()?>product/create" role="button">Tambah</a>
        <hr>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Stok Saat Ini</th>
                    <th>Stok Minimal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Stok Saat Ini</th>
                    <th>Stok Minimal</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($query as $s): ?>    
                <tr>
                    <td><?=$s->nama?></td>
                    <td><?=$s->jenis?></td>
                    <td>?</td>
                    <td><?=$s->stok_minimal?></td>
                    <td>
                        <a class="btn btn-default" href="<?=base_url().'product/edit/'.$s->id?>" role="button">Ubah</a>
                    </td>
                </tr>
                <?php endforeach; ?>
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