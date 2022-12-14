<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">

		@include('partials.headertagmanager')

		<script type='text/javascript'>
			(function() {
				var useSSL = 'https:' == document.location.protocol;
				var src = (useSSL ? 'https:' : 'http:') +
				'//www.googletagservices.com/tag/js/gpt.js';
				document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
			})();
		</script>

		<style type="text/css">
			.monthselect{
				border: none;
				border-top: solid 1pt;
			}
			.yearselect{
				border: none;
				border-top: solid 1pt;
			}
		</style>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />

		<title>Diário Digital</title>
		
		<link rel="shortcut icon" type="image/ico" href="{{ asset('/images/favicon.ico') }}"/>

		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/style.css') }}?v=v1.0.3">
		<link href=	"{{ asset('/simulor/admin/dist/css/icons.min.css') }}" rel="stylesheet">
		
		<!-- SELECIONAR O PERIODO -->
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/daterangepicker.css') }}" />

		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
		<script type='text/javascript'>
			var googletag = googletag || {};
			googletag.cmd = googletag.cmd || [];

			var mapping1 = googletag.sizeMapping().
			addSize([1440, 200], [[1100,275],[1100,110],[728,90],[1,1]]).
			addSize([1024, 200], [[720,180]]).
			addSize([0000, 000], [[320,80]]).
			build();

			googletag.cmd.push(function() {
				googletag.defineSlot('/1028625/SLB1', [[1100, 110], [320, 80], [720, 180], [1100, 275]], 'div-gpt-ad-1538588809041-0').defineSizeMapping(mapping1).addService(googletag.pubads());
				googletag.pubads().enableSingleRequest();
				googletag.pubads().collapseEmptyDivs();
				googletag.enableServices();
			});
		</script>
	</head>

	<body>

		@include('partials.bodytagmanager')

		<nav class="navbar navbarassinante">
			<div class="container">
				<div class="navbar-header">
					<div class="navbar-logout">
						<a type="button" class="btn btn-pattern" href="{{ url('/logoutAssinante') }}">Sair</a>
					</div>

					<a class="navbar-brand" href="{{ url('/assinante') }}">
						<img src="{{ asset('/assets/images/diario-logo.svg') }}" alt="Marca">
					</a>
				</div>
			</div>
		</nav>

		<div class="modal fade" id="flip-book-window" tabindex="-1" role="dialog" aria-labelledby="headerLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<div class="modal-body">
						<div class="mount-node">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- /1028625/SLB1 -->
					<div id='div-gpt-ad-1538588809041-0' class="main-ad">
						<script>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1538588809041-0'); });
						</script>
					</div>
				</div>
			</div>

			<div class="row header">
				<div class="col-xs-7 col-md-10">
					<h2 class="text-primary" style="margin: 0">Edição</h2>
				</div>

				<div class="col-xs-5 col-md-2">
					<div class="periodselect">
						<form class="form-inline">
							<label class="periodselect__label">Buscar por data</label>
							<div class="form-group data-smartphone">
								<div class="formitem">
									<input type="text" name="daterange" class="datarangerform" id="daterange" />
									<label for="daterange" class="icondaterange">&#x25BC;</label>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div id="results-wrapper">
					@if ($descriPublications !="") 

					<div class="button-removefilter">
						<button title="Voltar" type="button" class="btn search-button">
							Voltar para listagem {{-- <i class="fe-delete"></i> --}}
						</button>
					</div>

					@endif

					<!-- TITULO -->
					<div class="results-wrapper">
						{{$descriPublications}}
					</div>
					<!-- TITULO -->

					<div class="row">
						@foreach ($publications as $value)
						<div class="col-xs-6 col-md-3">
							<div class="thumbnail thumbnail-style js-thumbnail-target" data-route="{{route('uploadsAssinante', ['type' => $value->type, 'ano' => $value->ed_year, 'mes' =>  $value->ed_month,'dia' => $value->ed_day, 'arquivo' => $value->ed_file_name])}}" >
								<div class="capazoom">
									<img id="edicaos" src="{{ url('/uploadsThumbAssinante/app/'.$value->type.'/'.$value->ed_year.'/'.$value->ed_month.'/'.$value->ed_day.'/'.$value->ed_capa) }}" alt="" height="350" width="250"/>
								</div>
								<div class="thumbnail-date">
									@if ($paginate)
										{{$value->ed_day}}/{{$value->ed_month}}/{{$value->ed_year}}
									@else
										{{$value->caderno}}
									@endif
									<div class="readmore"><a id="edicaos" href="#">Leia Mais <i class="fe-chevron-right"></i></a></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					@if ($paginate)
					<div class="col-xs-12 col-sm-12 col-md-12">
						<nav class="d-flex justify-content-center text-center">
							<ul class="pagination results-wrapper" id="pagination-wrapper">
								{{ $publications->appends(request()->except('page'))->links() }}
							</ul>
						</nav>
					</div>
					@endif
				</div>
			</div>
		</div>
		
		<!-- FLIPBOOK -->
		<script src="{{ asset('/js/html2canvas.min.js') }}"></script>
		<script src="{{ asset('/js/three.min.js') }}"></script>
		<script src="{{ asset('/js/pdf.min.js') }}"></script>
		<script src="{{ asset('/js/3dflipbook.min.js?v=1.0.2') }}"></script>

		<!-- SELECIONAR O PERIODO -->
		<script type="text/javascript" src="{{ asset('/js/datapicker/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/datapicker/daterangepicker.js') }}"></script>

		<!-- VISUALIZAÇÃO CLASSIFICADOS -->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

		<script>
			//// FLIPBOOK
			//// FLIPBOOK
			//// FLIPBOOK

			var template = {
				html: './templates/default-book-view.html',
				styles: [
				'./css/font-awesome.min.css',
				'./css/short-white-book-view.css?v=v1.0.1'
				],
				script: './js/default-book-view.js?v=v1.0.1'
			};

			$(document).on('click', '.js-thumbnail-target', function(e){
				var pdf = $(this).attr('data-route');
				

				var booksOptions = {
					edicaos: {
						pdf: pdf,
						template: template,
						controlsProps: {
							
							downloadURL: pdf,

							actions: {
								cmdBackward: {
									code: 37
								},
								cmdForward: {
									code: 39
								},
								cmdZoomIn: {
   								 	code: 38
   								},
   								cmdZoomOut: {
   								 	code: 40
    							}, 
								cmdSinglePage: {
									activeForMobile: true
								}	 
							},
							scale: {
								default: 1,
								levels: 2,
								max: 4
							},
						},
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
			});

			//// PESQUISA
			//// PESQUISA
			//// PESQUISA

			$(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    singleDatePicker: true,
                    //autoApply: false,
                    //showDropdowns: true,
				    minYear: 1970,
				    maxYear: parseInt(moment().format('YYYY')) +1
                }, function(start, end, label) {
                	//search();
                    console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                });
            });

            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
				search();
			});

            $('.search-button').on('click', function(){btn-paginate-content
            	search();
            });

            function search(){
            	var category = 0;

            	$('.btn-paginate-content').each(function(){
            		if ( $(this).hasClass('active') ){
            			category = $(this).data('category');
            		}
            	});

                var get = '?';

                get += 'startDateYear=' + $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY');
                get += '&startDateMonth=' + $('input[name="daterange"]').data('daterangepicker').startDate.format('MM');
                get += '&startDateDay=' + $('input[name="daterange"]').data('daterangepicker').startDate.format('DD');

                get += '&endDateYear=' + $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY');
                get += '&endDateMonth=' + $('input[name="daterange"]').data('daterangepicker').endDate.format('MM');
                get += '&endDateDay=' + $('input[name="daterange"]').data('daterangepicker').endDate.format('DD');

                get += '&startDate=' + $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
                get += '&endDate=' + $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
                get += '&category=' + category;

                $('#results-wrapper').load("{{ route('buscaEdicao') }}" + get + " #results-wrapper", function() {
		        	//atualizarButtonVisualizacao();
				});
            }

            $('.btn-paginate-content').on('click', function(){
            	$('.btn-paginate-content').removeClass('active');
            	$(this).addClass('active');

            	if ( $('.button-removefilter').length ){
            		search();
            	}else{
	            	searchCategory( $(this).data('category') );
	            }
            });

            $(document).on('click', '.search-button', function(){
            	var category = 0;
            	$('.btn-paginate-content').each(function(){
            		if ( $(this).hasClass('active') ){
            			category = $(this).data('category');
            		}
            	});

            	searchCategory( category );
            });

            function searchCategory( category ){
                var get = '?';
                get += 'category=' + category;

                $('#results-wrapper').load("{{ route('buscaCategoria') }}" + get + " #results-wrapper", function() {});
            }

            // PAGINAÇÃO CONTEÚDO
		    $(document).on('click', '#pagination-wrapper a', function(e){
		        e.preventDefault();
		        $('#results-wrapper').load($(this).attr('href') + ' #results-wrapper', function() {
		        	//atualizarButtonVisualizacao();
				});
		    });

			/*/// VISUALIZAÇÃO CLASSIFICADOS
			//// VISUALIZAÇÃO CLASSIFICADOS
			//// VISUALIZAÇÃO CLASSIFICADOS

            $(document).on('click', '.buttonvisualizacao-lista', function() {
                $( ".thumbnail-style" ).switchClass( "thumbnail-style", "list-style" );
                $.removeCookie('grid-list-style');
                $.cookie('grid-list-style', true, { expires: 1 });

                $('.buttonvisualizacao-grid').removeClass('selected');
                $(this).addClass('selected');
            });

            $(document).on('click', '.buttonvisualizacao-grid', function() {
                $( ".list-style" ).switchClass( "list-style", "thumbnail-style" );
                $.removeCookie('grid-list-style'); // => true
                $.cookie('grid-list-style', false, { expires: 1 });

                $('.buttonvisualizacao-lista').removeClass('selected');
                $(this).addClass('selected');
            });

            function atualizarButtonVisualizacao(){
	            if( $.cookie('grid-list-style') == "true"){
	                $( ".buttonvisualizacao-lista" ).addClass('selected')
	                $( ".js-thumbnail-target" ).addClass("list-style").removeClass("thumbnail-style" );
	            }else{
	                $( ".buttonvisualizacao-grid" ).addClass('selected')
	                $( ".js-thumbnail-target" ).addClass("thumbnail-style").removeClass("list-style" );
	            }
            }
            
            atualizarButtonVisualizacao();
            */
		</script>
	</body>
</html>
