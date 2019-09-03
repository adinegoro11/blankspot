<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Data Supplier</h3> </div>
    <div class="panel-body">
        <a class="btn btn-success" href="<?= base_url()?>supplier/create" role="button">Tambah</a>
        <hr>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($query as $s): ?>    
                <tr>
                    <td><?=$s->nama?></td>
                    <td><?=$s->alamat?></td>
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