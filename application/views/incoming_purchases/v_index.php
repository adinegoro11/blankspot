<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Barang Masuk</h3> </div>
    <div class="panel-body">
        <a class="btn btn-success" href="<?= base_url()?>incoming_purchase/create" role="button">Tambah</a>
        <hr>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($query as $s): ?>    
                <tr>
                    <td><?=$s->supplier?></td>
                    <td><?=$s->barang?></td>
                    <td><?=$s->jumlah?></td>
                    <td><?=date('d F Y', strtotime($s->tanggal))?></td>
                    <td><a class="btn btn-default" href="<?=base_url().'incoming_purchase/edit/'.$s->id?>" role="button">Ubah</a></td>
                    <td><a class="btn btn-warning" href="<?=base_url().'incoming_purchase/delete/'.$s->id?>" role="button" onclick="return confirm('Yakin hapus data?')">Hapus</a></td>
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