<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Order Barang</h3> </div>
    <div class="panel-body">
        <?php if ($this->session->userdata('level') != 'admin'): ?>
        <a class="btn btn-success" href="<?= base_url()?>order/create" role="button">Tambah</a>
        <?php endif; ?>
        <hr>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Diajukan oleh</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                    <?php if ($this->session->userdata('level') != 'admin'): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Barang</th>
                    <th>Diajukan oleh</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                    <?php if ($this->session->userdata('level') != 'admin'): ?>
                    <th></th>
                    <?php endif; ?>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($query as $s): ?>    
                <tr>                  
                    <td><?=$s->barang?></td>
                    <td><?=$s->nama?></td>
                    <td><?=$s->jumlah?></td>
                    <td><?=date('d F Y', strtotime($s->tanggal))?></td>
                    <?php if ($this->session->userdata('level') != 'admin'): ?>
                    <td>
                        <a class="btn btn-default" href="<?=base_url().'order/edit/'.$s->id?>" role="button">Ubah</a>
                        <a class="btn btn-warning" href="<?=base_url().'order/delete/'.$s->id?>" role="button" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                    </td>
                    <?php endif; ?>
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