$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   console.log(item);
   location.href = '/' + value + '/manufacture?q=' + item;
});


$('.find-gmi-updates').on('click', function (){
   var product = $(this).attr('data-value');
   $('.tr-shadow-hidden').addClass('disabled');

   if(!$(this).hasClass('open-hub')) {
      $('.disabled-' + product).removeClass('disabled');
   }
   else{
      console.log('click');
      $('.disabled-' + product).addClass('disabled');
   }
   $(this).addClass('open-hub');

});



$('#select-out_stock').on('change', function () {
   $('#search-everything').submit();
});