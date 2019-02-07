$(function() {
	$("#calendario").datepicker({
		dateFormat: 'd/m/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
	});
});


jQuery(document).ready(function() {
		var campos_max = 20;
		var x = 2; // campos iniciais
		$('#novaEdicao').click(function(e) {
			e.preventDefault();     //prevenir novos clicks
			if (x < campos_max) {
				$('#cadernos').append('<div class="form-group row"><label class="col-sm-2 col-form-label">Upload do caderno</label>\<div class="col-sm-10">\
						<input  class="form-control" type="file" name="edicao[]">\
					<\div>');
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
