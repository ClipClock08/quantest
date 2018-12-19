//скрипт для вызова модального окна
$(document).ready(function(){
    
	$('.btn').on('click', function(e){
	    //hide field with div
	    $("cand_jobs").hide();
	    $.each($.viewMap, function() { this.hide(); });
		e.preventDefault();
		$('#modal').fadeIn(300);
		$('.modalBody').slideDown(500);

	});
	$('.close, #modal').on('click', function(e){
		e.preventDefault();
		$('.modalBody').slideUp(300); 	
		$('#modal').fadeOut(500);
	});
});

//скрипт при выборе теста
$(document).ready(function() {
  $.viewMap = {
    '0' : $([]),
    '1' : $('#view1'),
    '2' : $('#view3'),
    '3' : $("cand_jobs")
  };

  $('#viewSelector').change(function() {
    // hide all
    $.each($.viewMap, function() { this.hide(); });
    // show current
    $.viewMap[$(this).val()].show();
  });
});