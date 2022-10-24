$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   console.log(item);
   location.href = '/' + value + '/manufacture?q=' + item;
});

$('.open-hub').on('click', function () {
   console.log('click');
});

$('.find-gmi-updates').on('click', function (){
   var product = $(this).attr('data-value');
   $('.tr-shadow-hidden').addClass('disabled');
   $('.open-hub').removeClass('open-hub');
   $('.disabled-' + product).removeClass('disabled');
   $(this).addClass('open-hub');
   $(this).removeClass('find-gmi-updates');
});



$('#select-out_stock').on('change', function () {
   $('#search-everything').submit();
});