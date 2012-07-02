$(document).ready(function(){
	$('.project-info').slideToggle("fast");
	$('#project-list a.project-title').on('click', function() {  $(this).next().slideToggle("slow")  });
});