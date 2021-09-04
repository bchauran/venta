$('.pagination li a').on('click', function(){

      $('.items').html('<div class="loading"><img src="imagen/brito.png" width="70px" height="70px"/><br/>Un momento por favor...</div>');
    		 
      var page = $(this).attr('data');		
      var dataString = 'page='+page;
    		 
      $.ajax({
          type: "GET",
          url: "ajax.php",
          data: dataString,
          success: function(data) {
              //$('.items').fadeIn(2000).html(data);

                        $('.items').fadeIn(2000).html(data);
                                
                            
              $('.pagination li').removeClass('active');
              $('.pagination li a[data="'+page+'"]').parent().addClass('active');
          }
      });
      
      return false;
}); 