$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   var seller = $('.seller-input').val();
   location.href = '/shop/manufacture/?q='+ item + '&seller=' + seller
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

$('.find-product-updates').on('click', function(){
   var sku = $(this).attr('data-value');
   var seller = $(this).attr('data-seller');
   console.log(sku + ' ' + seller);
   $('#mediumModal').show();
});


$('#search-success').on('click', function (e) {
   e.preventDefault();
   var input = $('#search-input');
   var select = $('#select-out_stock');
   var seller = $('#seller-search');
   var value = input.val();
   if(value.length > 1) {
      location.href = '/site/search?q=' + input.val() + '&select=' + select.val() + '&seller=' + seller.val();

   }else{
      alert('Empty search input');
   }
});

$('selector').loupe({
   width: 500, // width of magnifier
   height: 500, // height of magnifier
   loupe: 'loupe' // css class for magnifier
});

$('.loupe-image').loupe();