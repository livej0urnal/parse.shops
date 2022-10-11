$('#select-manufacture').on('change', function () {
   var value = $(this).attr('data-value');
   var item = $(this).val();
   console.log(item);
});