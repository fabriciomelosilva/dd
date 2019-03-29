<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Diário Digital</title>
		<link rel="shortcut icon" type="image/ico" href="{{ asset('/images/favicon.ico') }}"/>
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<link href=	"{{ asset('/simulor/admin/dist/css/icons.min.css') }}" rel="stylesheet">
		
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137234529-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-137234529-1');
		</script>
		
	</head>

	<body>
		<nav class="navbar navbar-primary navbar-static-top" style="
    margin-bottom: 40px;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">
						<img src="{{ asset('/assets/images/diario-logo.svg') }}" alt="Marca">
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a type="button" class="btn btn-default navbar-btn" href="{{ url('/logoutAssinante') }}">Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
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
					<div class="thumbnail js-thumbnail-target" data-route="{{route('uploadsAssinante', ['ano' => $value->ed_year, 'mes' =>  $value->ed_mounth,'dia' => $value->ed_day, 'arquivo' => $value->ed_file_name])}}" >
						<img id="edicaos" src="{{ url('/uploadsThumbAssinante/app/edicao/'.$value->ed_year.'/'.$value->ed_mounth.'/'.$value->ed_day.'/'.$value->ed_capa) }}" class="btn" alt="" height="350" width="250"/>
						<div class="caption text-center text-muted">{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</div>
					</div>
				</div>
				@endforeach 
			</div>

			<nav class="d-flex justify-content-center text-center">
				<ul class="pagination ">
					{{$edicao->links()}}
				</ul>
			</nav>
		
		</div>

		<script src="{{ asset('/js/html2canvas.min.js') }}"></script>
		<script src="{{ asset('/js/three.min.js') }}"></script>
		<script src="{{ asset('/js/pdf.min.js') }}"></script>
		<script src="{{ asset('/js/3dflipbook.min.js') }}"></script>					

		<script type="text/javascript">

			var template = {
				html: './templates/default-book-view.html',
				styles: [
				'./css/font-awesome.min.css',
				'./css/short-white-book-view.css'
				],
				script: './js/default-book-view.js'
			};

			$(".js-thumbnail-target").click(function(e){
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
