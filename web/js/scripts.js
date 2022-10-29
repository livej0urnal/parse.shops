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
      $(this).addClass('open-hub');
   }
   else{
      $('.disabled-' + product).addClass('disabled');
      $(this).removeClass('open-hub');
   }


});



$('#select-out_stock').on('change', function () {
   $('#search-everything').submit();
});

$('.find-product-updates').on('click', function(){
   var sku = $(this).attr('data-value');
   var seller = $(this).attr('data-seller');
   console.log(sku + ' ' + seller);
   $('#mediumModal').show();
});