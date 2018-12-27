$(function() {
	$("#calendario" ).datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
	});
});


jQuery(document).ready(function() {
		var campos_max          = 20;   
		var x = 2; // campos iniciais
		$('#novaEdicao').click (function(e) {
				e.preventDefault();     //prevenir novos clicks
				if (x < campos_max) {
						$('#cadernos').append('<div>\
								<label for="PDF">Caderno '+ x +' </label>\
								<input type="file" name="edicao[]">\
								<a href="#" class="remover_campo">Remover</a>\
								</div>');
						x++;
				}
		});

		// Remover o div anterior
		$('#cadernos').on("click",".remover_campo",function(e) {
				e.preventDefault();
				$(this).parent('div').remove();
				x--;
		});
});