$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   console.log(item);
   location.href = '/' + value + '/manufacture?q=' + item;
});

$('.open-hub').on('click', function () {
   var product = $(this).attr('data-value');
   console.log(product);
   $('.disabled-' + product).addClass('disabled');
   $(this).removeClass('open-hub');
   $(this).addClass('find-gmi-updates');
});

$('.find-gmi-updates').on('click', function (){
   var product = $(this).attr('data-value');
   $('.tr-shadow-hidden').addClass('disabled');
   $('.disabled-' + product).removeClass('disabled');
   $(this).addClass('open-hub');
   $(this).removeClass('find-gmi-updates');
});



$('#select-out_stock').on('change', function () {
   $('#search-everything').submit();
});