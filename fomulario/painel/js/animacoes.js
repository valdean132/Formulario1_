$(function(){

    $('.por_agendar').click(()=>{
		
		$('.anm1').slideToggle(500);
	});
	$('.agendado').click(()=>{
		$('.anm2').slideToggle(500);
	});

	$(".list-nomes").bind("mousewheel",function(ev, delta) {
        var scrollTop = $(this).scrollTop();
        $(this).scrollTop(scrollTop-Math.round(delta));
    });
});