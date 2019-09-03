
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="<?= base_url()?>assets/css/starter-template/">

    <title>Sistem Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url()?>assets/css/starter-template.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="<?= base_url()?>assets/css/select2.min.css" rel="stylesheet">
    <script src="<?= base_url()?>assets/js/select2.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/js/dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/js/dataTables.bootstrap.min.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Beranda</a></li>
            <li><a href="<?=base_url()?>supplier/index">Supplier</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Barang <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url()?>incoming_purchase/index">Barang Masuk</a></li>
                <li><a href="<?=base_url()?>incoming_purchase/index">Barang Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    
      <div class="row">
        <div class="col-md-12"> <br><br>
        <?php $this->load->view($isi); ?>
        </div>
      </div>


      <!-- <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
        <div class="col-md-12"> <br> <br>
          <div class="panel panel-default">
            <div class="panel-heading"> <h3 class="panel-title">Panel title</h3> </div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
        </div>
      </div> -->

    </div><!-- /.container -->

    <script>window.jQuery || document.write('<script src="<?= base_url()?>assets/js/jquery.min.js"><\/script>')</script>
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
