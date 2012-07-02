jQuery(document).ready(function(){
	jQuery('#project-list a.project-title').on('click', function(e) {  
		$(this).next().slideToggle()  
		e.preventDefault();
	});
});