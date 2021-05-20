$(function(){

	// Botões de Agendamentos
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

	// Menu
	function Menu(){
		const logoImg = $('.img_logo');
		const menuSigle = $('.menu-single');

		logoImg.click(()=>{
			menuSigle.slideToggle(500);
		});
	}

	
	// Carregamentos Animados
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

	// carregamentoDimanico();
	agendamentos();
    Menu();
});