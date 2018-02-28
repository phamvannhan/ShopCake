
  jQuery(document).ready(function($) {
            $('.updatecart').click(function(){
		 	var rowId = $(this).attr('id');
		 	var qty =  $(this).parent().parent().find(".qty").val();
		 	var token = $("input[name='_token']").val();
		 	
		 	$.ajax({
		 		url: 'cap-nhat-gio/'+rowId,
		 		type: 'GET',
		 		cache: false,
		 		data: {"_token":token, "id":rowId, "qty":qty},
		 		success: function(data){
		 			if (data = "ok") {
		 				window.location = "cart"
		 			}

		 		}
		 	});
		 });    
    }); 

/*(function($){ $('#upcart').on('change keyup', function(){
    	var newqty = $('#upcart').val();
    	var proId = $('#proId').val();
    	var rowId = $('#rowId').val();

		    	$.ajax({
		        type: 'get',
		        dataType: 'html',
		        url: 'cap-nhat-gio/'+proId,
		        data: {"rowId":rowId, "proId":proId, "qty":newqty}, //lấy dl
		       success: function (data) {
			          if (data = "oke")
			          {
			          	//alert('dung');
			          	window.location "capnhatgio"
			          }
			        }
		    });
    }); })(jQuery);*/


