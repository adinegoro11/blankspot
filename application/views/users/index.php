<div class="panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title">Data User</h3> </div>
    <div class="panel-body">
        <?php if ($this->session->userdata('level')=='admin'): ?>
        <a class="btn btn-success" href="<?= base_url()?>user/create" role="button">Tambah</a>
        <?php endif; ?>
        <hr>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>NIK</th>
                    <th>Level</th>
                    <?php if ($this->session->userdata('level')=='admin'): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>NIK</th>
                    <th>Level</th>
                    <?php if ($this->session->userdata('level')=='admin'): ?>
                    <th></th>
                    <?php endif; ?>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($query as $s): ?>    
                <tr>
                    <td><?=$s->nama_lengkap?></td>
                    <td><?=$s->username?></td>
                    <td><?=$s->nik?></td>
                    <td><?=$s->level?></td>
                    <?php if ($this->session->userdata('level')=='admin'): ?>
                    <td>
                        <a class="btn btn-default" href="<?=base_url().'user/edit/'.$s->id?>" role="button">Ubah</a>
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