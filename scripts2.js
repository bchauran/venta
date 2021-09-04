$('.pagination li a').on('click', function(){

       

      $('.items').html('<div class="loading"><img src="imagen/brito.png" width="70px" height="70px"/><br/>Un momento por favor...</div>');
    		 
      var page = $(this).attr('data');
      var busca = $('p#buscacateg').text();

      //var dataString = 'page='+page;

      
    		 
      $.ajax({
          type: "GET",
          url: "ajax.php",
          //data: dataString,
          data: {dato1:page, dato2:busca},
          success: function(data) {
              //$('.items').fadeIn(2000).html(data);

              $('.items').fadeIn(2000).html(data);
                            
              $('.pagination li').removeClass('active');
              $('.pagination li a[data="'+page+'"]').parent().addClass('active');
          }
      });

       /*console.log("CARRITO DE COMPRA paginacion "+carrito_compra);  
       console.log("CANTIDAD COMPRADA paginacion "+carrito_compra.length); */
      
      return false;

      
       
}); 


$(document).ready(function(){

  $('p#buscacateg').hide();
});