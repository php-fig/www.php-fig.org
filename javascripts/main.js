jQuery(document).ready(function($){
	$('#project-list a.project-title').on('click', function(e) {  
		$(this).next().slideToggle()  
		e.preventDefault();
	});
});
