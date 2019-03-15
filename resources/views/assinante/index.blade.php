@extends('layouts.app')
@section('content')


<script src="{{ URL::to('/js/html2canvas.min.js') }}"></script>
<script src="{{ URL::to('/js/three.min.js') }}"></script>
<script src="{{ URL::to('/js/pdf.min.js') }}"></script>
<script src="{{ URL::to('/js/3dflipbook.min.js') }}"></script>

    
    <div class="container">
		<div class="content">


	<div class="row p-4">
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
						<img id="condoLiving" src="http://localhost:8000/uploadsThumbAssinante/app/edicao/2019/3/12/capa_5c8856e9e6e6c.jpg" class="btn" alt="Condo Living - Party in your place" />
						<div class="caption">
						</div>
					</div>
			</div>

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
						condoLiving: {
						pdf: "http://localhost:8000/uploadsAssinante/app/edicao/2019/3/24/ed_24_5c88475276fee.pdf",
						downloadURL: "http://localhost:8000/uploadsAssinante/app/edicao/2019/3/24/ed_24_5c88475276fee.pdf",
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
</div>

@endsection
