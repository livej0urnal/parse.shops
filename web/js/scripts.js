$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   console.log(item);
   location.href = '/' + value + '/manufacture?q=' + item;
});

$('.find-gmi-updates').on('click', function (){
   var product = $(this).attr('data-value');

   $.ajax({
      url: '/gmi/updates?sku=' + product,
      method: 'GET',
      success: function (res)
      {
         console.log(res);
      },
      error: function ()
      {
         console.log('Error')
      }

   })
});