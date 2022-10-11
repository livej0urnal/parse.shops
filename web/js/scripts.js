$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   console.log(item);
   location.href = '/' + value + '/manufacture?q=' + item;
});

$('.find-gmi-updates').on('click', function (){
   var product = $(this).attr('data-value');
   $('.tr-shadow-hidden').addClass('disabled');
   $('.disabled-' + product).removeClass('disabled');
});