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

		<script type='text/javascript'>
			(function() {
				var useSSL = 'https:' == document.location.protocol;
				var src = (useSSL ? 'https:' : 'http:') +
				'//www.googletagservices.com/tag/js/gpt.js';
				document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
			})();
		</script>

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
		<nav class="navbar navbarassinante">
			<div class="container">
				<div class="navbar-header">
					
					<div class="navbar-logout">
						<a type="button" class="btn btn-pattern" href="{{ url('/logoutAssinante') }}">Sair</a></li>
					</div>

					<a class="navbar-brand" href="#">
						<img src="{{ asset('/assets/images/diario-logo.svg') }}" alt="Marca">
					</a>
				</div>

				
				
			</div>
		</nav>
		<div class="container">
			<!-- /1028625/SLB1 -->
			<div id='div-gpt-ad-1538588809041-0' class="main-ad">
				<script>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1538588809041-0'); });
				</script>
			</div>
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
			
			<?php

			
				foreach($years as $year){
					foreach($year as $ano){
						$anos[] = $ano;
					}	
				}

				foreach($mounths as $mounth){
					foreach($mounth as $mes){
						$meses[] = $mes;
					}	
				}
							
			?>

			<!--<form id="menu" action="{{ route('buscaEdicao') }}" method="GET">
				<ul class="nav nav-pills">
					<select name="year" id="year">
						<?php 
							foreach($anos as $ano){
								echo '<option value='.$ano.'>'.$ano.'</option>';
							}
						?>
					</select>

					<select name="mounth" id="mounth">
						<?php	

						   $monthNames = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

							foreach($meses as $mes){
								echo '<option value='.$mes.'>'.$monthNames[$mes-1].'</option>';
							}
						
						?>
					</select>

					<button type="submit" id="filtrar">Filtrar</button> 
				</ul>
			<form>-->

			<!-- SELECIONE O PERIODO -->
			<div class="row">
				<div class="col-xs-12">

					<div class="periodselect">
						<div class="col-xs-12 col-sm-3">
							<div class="periodselect-title">Selecione o período</div>
						</div>

						<div class="col-xs-12 col-sm-9">
							<form class="form-inline periodselect__right">
								<div class="form-group">
                                    <div class="formitem periodselect-mobile">
										<i class="fe-calendar"></i>&nbsp;
									    <input type="text" name="daterange" class="datarangerform" value="01/01/2018 | 01/15/2018" />
                                    </div>

								<div class="formitem periodselect-mobile periodselect-mobile__smaller">
									<div class="form-group">
                                        <select name="categoria">
                                            <option value="classificados" selected>Classificados</option>
                                            <option value="edicoes">Edições</option>
                                            <option value="todos">Todos</option>
                                        </select>
                                    </div>
								</div>

                                <div class="formitem formitem__last">
                                    <button type="submit" class="btn">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
							</form>
						</div>
					</div>

				</div>
			</div>
			<!-- SELECIONE O PERIODO -->

			<!-- TITULO E VISUALIZAÇÃO -->
            <div class="row classificadoslista">
                <div class="col-xs-7 col-sm-6">
                    <div class="classificadoslista-title">Classificados</div>
                </div>
				<div class="col-xs-5 col-sm-6">
					<div class="pull-right classificadoslista-buttons">
						<ul>
							<li>
                                <button class="classificadoslista-buttons buttonvisualizacao-grid"><i class="fe-grid"></i></button>
							</li>
							<li>
								<button class="classificadoslista-buttons buttonvisualizacao-lista"><i class="fe-list"></i></button>
							</li>
						</ul>
					</div>
				</div>
            </div>
			<!-- TITULO E VISUALIZAÇÃO -->

			<!-- CLASSIFICADOS E EDICOES -->
			@foreach ($edicao as $value)
			<div class="col-xs-6 col-sm-4 col-md-3">
				<div class="thumbnail-style js-thumbnail-target" data-route="{{route('uploadsAssinante', ['ano' => $value->ed_year, 'mes' =>  $value->ed_mounth,'dia' => $value->ed_day, 'arquivo' => $value->ed_file_name])}}" >
					<div class="thumbnail-date">
						{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}
						<hr />
						<div class="readmore"><a id="edicaos" href="#">Leia Mais <i class="fe-chevron-right"></i></a></div>
					</div>

					<div class="capazoom">
						<img id="edicaos" src="{{ url('/uploadsThumbAssinante/app/edicao/'.$value->ed_year.'/'.$value->ed_mounth.'/'.$value->ed_day.'/'.$value->ed_capa) }}" alt="" height="350" width="250"/>
					</div>
				</div>
			</div>
			@endforeach
		<!-- CLASSIFICADOS E EDICOES -->

		</div>

		<div class="row">
			<nav class="d-flex justify-content-center text-center">
				<ul class="pagination ">
					{{$edicao->appends(request()->except('page'))->links()}}
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

			<script>
				$("#year").change(function(e) {
					var urlMounths = "{{ route('getMounthsByYear') }}"
					e.preventDefault();
					$.ajax({
						type: "GET",
						url: urlMounths,
						data: $("#menu").serialize(),
						success: function(data) {
							$("#mounth").empty();

							$.each(data, function(i, data){

								const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
									"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
								];
          						$('#mounth').append("<option value='"+data.ed_mounth+"'>"+monthNames[data.ed_mounth-1]+"</option>");
        					});

						}
					})

				});
	
			</script>

		<!-- SELECIONAR O PERIODO -->
		<script type="text/javascript" src="{{ asset('/js/datapicker/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/datapicker/daterangepicker.js') }}"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/daterangepicker.css') }}" />
		<script>
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left'
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                });
            });
		</script>
		<!-- SELECIONAR O PERIODO -->

		<!-- VISUALIZAÇÃO CLASSIFICADOS-->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
		<script>
            $( function() {
                $( ".buttonvisualizacao-lista" ).on( "click", function() {
                    $( ".thumbnail-style" ).switchClass( "thumbnail-style", "list-style" );
                    $.removeCookie('grid-list-style');
                    $.cookie('grid-list-style', true, { expires: 1 });
                });
                $( ".buttonvisualizacao-grid" ).on( "click", function() {
                    $( ".list-style" ).switchClass( "list-style", "thumbnail-style" );
                    $.removeCookie('grid-list-style'); // => true
                    $.cookie('grid-list-style', false, { expires: 1 });
                });

                if( $.cookie('grid-list-style') == "true"){
                    $( ".buttonvisualizacao-lista" ).addClass('selected')
                    $( ".js-thumbnail-target" ).addClass("list-style").removeClass("thumbnail-style" );
                }else{
                    $( ".buttonvisualizacao-grid" ).addClass('selected')
                    $( ".js-thumbnail-target" ).addClass("thumbnail-style").removeClass("list-style" );
                }
            } );
		</script>
		<script>
            $('button').on('click', function(){
                $('button').removeClass('selected');
                $(this).addClass('selected');
            });
		</script>
		<!-- VISUALIZAÇÃO CLASSIFICADOS-->

	</body>
</html>
