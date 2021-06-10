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
	
		/*
		$(".list-nomes").bind("mousewheel",function(ev, delta) {
			var scrollTop = $(this).scrollTop();
			$(this).scrollTop(scrollTop-Math.round(delta));
		});
		*/
	}

	/* Menu */
	function Menu(){
		const logoImg = $('.img_logo');
		const menuSigle = $('.menu-single');

		logoImg.click(()=>{
			menuSigle.slideToggle(500);

			var borderLogoUsuario = $('.border-logo-usuario');
			if(borderLogoUsuario.hasClass('border-usuario-active')){
				borderLogoUsuario.removeClass('border-usuario-active');
			}else{
				borderLogoUsuario.addClass('border-usuario-active');

			}
		});
	}

	
	/* Carregamentos Animados */
	function carregamentoDimanico(){
		$('.menu-single [realtime]').click(function(){
			var container = $('.container-central')
			var pagina = $(this).attr('realtime');

			container.hide();

			var url = include_path_painel+'pages/'+pagina+'.php';

			container.load(url);

			container.fadeIn(1000);
			window.history.pushState('', '', pagina);

			return false;
		});
	}

	/* Carregamento de paginção dinâmico */
	function carregamentoPaginacao(){
		$('.lista-paginacao-wrapper [realtime]').click(function(){
			var container = $('.tbody-agendados');
			var pagina = $(this).attr('realtime');
			
			console.log(pagina);
			
			container.hide();
			
			var url = include_path_painel+'pages/relatorio.php'+pagina;
			
			container.load(url);
			container.fadeIn(1000);
			window.history.pushState('', '', pagina);
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

	/* Opções de Importação */
	function showOpcoes(){
		const btnOpcoesRelatorio = $('.opcoes-relatorio-wrapper');
		let engrenagem = $('.engrenagem');
		let closeX = $('.closeX');
		let opcoesRelatorio = $('.opcaoes-relatorio-single');

		btnOpcoesRelatorio.click(function(){
			if(opcoesRelatorio.is(':hidden')){

				engrenagem.css('transform', 'rotate(180deg)').css('opacity', '0');

				closeX.show();
				closeX.css('opacity', '0');
				setTimeout(()=>{
					engrenagem.hide();
					closeX.css('transform', 'rotate(180deg)').css('opacity', '1').css('fill', '#3493eb');
				}, 100);
				opcoesRelatorio.show(200);

			}else{
				closeX.css('transform', 'rotate(-180deg)').css('opacity', '0');
				setTimeout(()=>{
					engrenagem.show();
					closeX.hide();
					engrenagem.css('transform', 'rotate(-180deg)').css('opacity', '1');
			
				}, 100);
				opcoesRelatorio.hide(200)
			}
		});
	}

	/* Show Wraper Relatório */
	function showDivWrapper(){
		var title = $('.title');
		
		title.click(function(){
			var divWrapper = $(this).next();
			var titleSeta = $(this).find('.seta-title');
			
			divWrapper.slideToggle(500);
			
			if($(this).hasClass('border-title')){
				titleSeta.css('transform', 'rotate(-90deg)');
				$(this).removeClass('border-title');
			}else{
				titleSeta.css('transform', 'rotate(0deg)');
				$(this).addClass('border-title');
			}
		});
	}

	/* Chamando Funções */
	// carregamentoDimanico();
	// carregamentoPaginacao();
	showDivWrapper();
	showOpcoes();
	showPassword();
	agendamentos();
    Menu();
});