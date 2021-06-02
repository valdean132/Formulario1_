$(function(){

	/* Botões de Agendamentos */
	function agendamentos(){
		const porAgendar = $('.por_agendar');
		const agendado = $('.agendado');
		const btnWraper1 = $('.btn-wraper-center .btn-wraper.btn1');
		const btnWraper2 = $('.btn-wraper-center .btn-wraper.btn2');
		const seta1 = $('.seta1');
		const seta2 = $('.seta2');
		
		porAgendar.click(()=>{
			$('.anm1').slideToggle(500);
			if(btnWraper1.hasClass('border-radius1')){
				btnWraper1.addClass('hover1');
				btnWraper1.removeClass('border-radius1');
				btnWraper1.addClass('border-radius2');
			}else{
				btnWraper1.removeClass('border-radius2');
				btnWraper1.addClass('border-radius1');
				btnWraper1.removeClass('hover1');
			}

			if(seta1.hasClass('seta-para-baixo')){
				seta1.removeClass('seta-para-baixo');
				seta1.addClass('seta-para-cima');
			}else{
				seta1.removeClass('seta-para-cima');
				seta1.addClass('seta-para-baixo');
			}
		});
		agendado.click(()=>{
			$('.anm2').slideToggle(500);
			if(btnWraper2.hasClass('border-radius1')){
				btnWraper2.addClass('hover2');
				btnWraper2.removeClass('border-radius1');
				btnWraper2.addClass('border-radius2');
			}else{
				btnWraper2.removeClass('border-radius2');
				btnWraper2.addClass('border-radius1');
				btnWraper2.removeClass('hover2');
			}

			if(seta2.hasClass('seta-para-baixo')){
				seta2.removeClass('seta-para-baixo');
				seta2.addClass('seta-para-cima');
			}else{
				seta2.removeClass('seta-para-cima');
				seta2.addClass('seta-para-baixo');
			}
		});
	
		$(".list-nomes").bind("mousewheel",function(ev, delta) {
			var scrollTop = $(this).scrollTop();
			$(this).scrollTop(scrollTop-Math.round(delta));
		});
	}

	/* Menu */
	function Menu(){
		const logoImg = $('.img_logo');
		const menuSigle = $('.menu-single');

		logoImg.click(()=>{
			menuSigle.slideToggle(500);
		});
	}

	
	/* Carregamentos Animados */
	function carregamentoDimanico(){
		$('[realtime]').click(()=>{
			var container = $('.container-central')
			var pagina = $(this).attr('realtime');

			container.hide();

			var url = include_path_painel+'pages/'+pagina+'.php';

			container.load(url);

			container.fadeIn(1000);

			return false;
		});
	}

	/* Mostrar e Ocutar Senha */
	function showPassword(){
		$('.showPassword i').on('click', function(){
			var password = $('.passwordSenha');
			var passwordType = password.attr('type');
			if(passwordType == 'password'){
				password.attr('type', 'text');

				$('.mostrarPassword').hide(200);
				
				$('.ocultarPassword').show(200);
			}else{
				password.attr('type', 'password');

				$('.mostrarPassword').show(200);
				
				$('.ocultarPassword').hide(200);
			}
		});
	}

	/* Deletar Usuário */
	function deletar(contador, cont, popup){
		
		while(cont <= contador){
			var btnDeletar = $('.btn-remove'+cont);
				btnDeletar.click(function(){
					var btnDelete = $(this).attr('realtime')
					var deleteConf = $('.delete-conf'+btnDelete);
					
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
					var btnEditar = $(this).attr('realtime')
					var editarConf = $('.editar-conf'+btnEditar);
					
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
					var btnPorAgendar = $(this).attr('realtime')
					var porAgendar = $('.por-agendar'+btnPorAgendar);
					
					popup.css('display', 'flex');
					setTimeout(() =>{
						popup.css('opacity', 1);
						porAgendar.addClass('animate-popup');
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

		// Fechar Popup
		fecharPopup(popup);

		
	}

	/* Chamando Funções */
	// carregamentoDimanico();
	popup();
	showPassword();
	agendamentos();
    Menu();
});