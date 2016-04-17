$(document).on("ready page:load" , function () {

  $(".number-control button").on( 'click', function() {

    var tmp = parseInt( $(this).parent().attr('value') );
    
    if( $(this).hasClass('minus') ) { tmp *= -1; }

    var input = $(this).parent().parent().find('input.mileage');
    var mileage = parseInt( input.val() )+tmp;
    mileage = mileage < 0 ? 0 : mileage;
    input.val( mileage );
  });

  $("#win-number").on( 'click', function(){

  	$.ajax({
		url:'/2choi/gamble/secret.php',
		success:function(data){
			console.log(data);
			$("#win-number").text(data);
		}
	});
  });
});
