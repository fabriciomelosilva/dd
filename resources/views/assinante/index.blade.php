<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Diário Digital</title>

	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </head>

  <body>

		<div class="container-fluid">
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
			
		
			<div class="row">
				@foreach ($edicao as $value)
				<div class="col-xs-6 col-md-3">
					<div class="thumb-edicao" data-route="{{route('uploadsAssinante', ['ano' => $value->ed_year, 'mes' =>  $value->ed_mounth,'dia' => $value->ed_day, 'arquivo' => $value->ed_file_name])}}" >
						<img id="edicaos" src="{{ url('/uploadsThumbAssinante/app/edicao/'.$value->ed_year.'/'.$value->ed_mounth.'/'.$value->ed_day.'/'.$value->ed_capa) }}" class="btn" alt="" height="350" width="250"/>
						<div style="text-align: center;" class="caption">{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</div>
					</div>
				</div>
				@endforeach
			</div>

			<nav class="d-flex justify-content-center">
				<ul class="pagination ">
					{{$edicao->links()}}
				</ul>
			</nav>
		
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

			$(".thumb-edicao").click(function(e){
				var pdf = $(this).attr('data-route');

				var booksOptions = {
						edicaos: {
							pdf: pdf,
							template: template,
							controlsProps: { 
								actions: {
									cmdBackward: {
										code: 37
									},
									cmdForward: {
										code: 39
									},
									cmdSinglePage: {
									activeForMobile: true
									}		 
								}
							}
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
					if(e.target.id) {
						instance.options = booksOptions[e.target.id];
						$('#flip-book-window').modal('show');
					}
			})
		</script>

			


  </body>
</html>
