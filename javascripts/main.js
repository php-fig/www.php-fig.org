jQuery(document).ready(function(){
	jQuery('.project-info').slideToggle("fast");
	jQuery('#project-list a.project-title').on('click', function(e) {  
		$(this).next().slideToggle()  
		e.preventDefault();
	});
});