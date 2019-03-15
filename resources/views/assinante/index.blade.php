<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>
      3D FlipBook - Sources forma      </title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="main-menu">

    </div>
    <div class="container">
      <div class="content">
      
<div class="modal fade" id="flip-book-window" tabindex="-1" role="dialog" aria-labelledby="headerLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      <div class="modal-body">
        <div class="mount-node">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="books">
  <h2>PDFs</h2>
  <div class="thumb">
    <img id="edicao" src="images/condoLiving.jpg" class="btn" alt="Condo Living - Party in your place" />
    <div class="caption">
      PDF magazine as a 3D FlipBook.
    </div>
  </div>
</div>

<script src="./js/html2canvas.min.js"></script>
<script src="./js/three.min.js"></script>
<script src="./js/pdf.min.js"></script>
<script src="./js/3dflipbook.min.js"></script>

<script type="text/javascript">
  var template = {
    html: './templates/default-book-view.html',
    styles: [
      './css/font-awesome.min.css',
      './css/short-white-book-view.css'
    ],
    script: './js/default-book-view.js'
  };

  var booksOptions = {


    edicao: {
      pdf: 'http://localhost/flipbook/demo/assets/pdf/magazine.pdf',
      downloadURL: 'http://localhost/flipbook/demo/assets/pdf/magazine.pdf',
      template: template
    },

  };

  var instance = {
    scene: undefined,
    options: undefined,
    node: $('#flip-book-window').find('.mount-node')
  };
  $('#flip-book-window').on('hidden.bs.modal',  function() {
    instance.scene.dispose();
  });
  $('#flip-book-window').on('shown.bs.modal', function() {
    instance.scene = instance.node.FlipBook(instance.options);
  });

  $('.books').find('img').click(function(e) {
    if(e.target.id) {
      instance.options = booksOptions[e.target.id];
      $('#flip-book-window').modal('show');
    }
  });

</script>
      </div>

    </div>

    
  </body>
</html>
