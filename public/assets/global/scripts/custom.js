$(document).ajaxSend(function(event, request, settings) {
	// $('.spn1').append('');
	NProgress.start();
});
$(document).ajaxComplete(function(event, request, settings) {
	NProgress.done();
});
	
