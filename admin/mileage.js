$(document).on("ready page:load" , function () {

  $(".number-control button").on( 'click', function() {
    var tmp = parseInt( $(this).parent().attr('value') );
    if( $(this).hasClass('minus') ) { tmp *= -1; }

    var input = $(this).parent().parent().find('input').first();

    var mileage = parseInt( input.val() )+tmp;
    mileage = mileage < 0 ? 0 : mileage;
    input.val( mileage );
  });
});