jQuery(document).ready(function($){
	$('#project-list li').on('mouseenter', function() {
		$(this).children().next().slideToggle() ; 
	}).on('mouseleave', function() {
		$(this).children().next().slideToggle() ;
	});
	$('.project-title').on('click', function(e) {
		e.preventDefault();
	});
});
