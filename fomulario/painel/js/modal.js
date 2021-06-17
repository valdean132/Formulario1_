$(function(){
    /* Deletar Usuário */
	function deletar(contador, cont, popup){
		
		while(cont <= contador){
			var btnDeletar = $('.btn-remove'+cont);
				btnDeletar.click(function(){
					var btnDeletarRealtime = $(this).attr('realtime')
					var deleteConf = $('.delete-conf'+btnDeletarRealtime);
					
					popup.css('display', 'flex');
					setTimeout(() =>{
						popup.css('opacity', 1);
						deleteConf.addClass('animate-popup');
					}, 500);
					
				});
			
			cont++;
		}
	}
	/* Editar Usuário */
	function editar(contador, cont, popup){
		
		while(cont <= contador){
			var btnEditar = $('.btn-editar'+cont);
				btnEditar.click(function(){
					var btnEditarRealtime = $(this).attr('realtime')
					var editarConf = $('.editar-conf'+btnEditarRealtime);
					
					popup.css('display', 'flex');
					setTimeout(() =>{
						popup.css('opacity', 1);
						editarConf.addClass('animate-popup');
					}, 500);
					
				});
			
			cont++;
		}
	}

	/* Por Agendar */
	function porAgendar(contador, cont, popup){
		while(cont <= contador){
			var btnPorAgendar = $('.btn-por-agendar'+cont);
				btnPorAgendar.click(function(){
					var btnPorAgendarRealtime = $(this).attr('realtime')
					var porAgendar = $('.por-agendar'+btnPorAgendarRealtime);

					d = new Date();
					var month = d.getMonth()+1;
					var date = d.getDate();
					var hours = d.getHours();
					var minutes = d.getMinutes();
					if(d.getMonth() < 10){
						var month = '0'+(d.getMonth()+1);
					}
					if(d.getDate() < 10){
						var date = '0'+d.getDate();
					}
					if(d.getHours() < 10){
						var hours = '0'+d.getHours();
					}
					if(d.getMinutes() < 10){
						var minutes = '0'+d.getMinutes();
					}
					var dHAtual = d.getFullYear()+"-"+month+"-"+date+"T"+hours+":"+minutes;
					
					console.log(dHAtual);
					$('#data-agend'+btnPorAgendarRealtime).val(dHAtual);
					
					popup.css('display', 'flex');
					setTimeout(() =>{
						popup.css('opacity', 1);
						porAgendar.addClass('animate-popup');
					}, 500);
					
				});
			
			cont++;
		}
	}
	
	/* Agendados */
	function agendados(contador, cont, popup){
		while(cont <= contador){
			var btnAgendados = $('.btn-agendados'+cont);
			
			btnAgendados.click(function(){
				// alert('deu certo');
				var btnAgendadosRealtime = $(this).attr('realtime')
				var agendados = $('.agendados'+btnAgendadosRealtime);
				var agendadoFilter = $('.filter-popup');
				
					popup.css('display', 'flex');
					setTimeout(() =>{
						popup.css('opacity', 1);
						agendados.addClass('animate-popup');
						agendadoFilter.addClass('animate-popup');
					}, 500);
				});
			
			cont++;
		}
	}

	/* Fechar popup */
	function fecharPopup(popup){

		popup.click(e =>{
			const ocultar = $('.ocultar');

			if(e.target.className == 'popup' || e.target.className == 'sairModal'){
				popup.css('opacity', 0);
				setTimeout(() =>{
					popup.css('display', 'none');
					ocultar.removeClass('animate-popup');
				}, 500);
				return false;
			}
		});
	}

	/* Janela Popup */
	function popup(){

		// Variaveis Constantes
		const contador = $('.contador').attr('realtime');
		var cont = 1;
		const popup = $('.popup');

		// Modal Deletar
		deletar(contador, cont, popup);
		
		// Modal Editar
		editar(contador, cont, popup);

		// Modal Por Agendar
		porAgendar(contador, cont, popup);

		// Modal Agendados
		agendados(contador, cont, popup);

		// Fechar Popup
		fecharPopup(popup);
	
	}

    popup();
});