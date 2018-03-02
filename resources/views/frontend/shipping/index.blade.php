<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
	<link rel="stylesheet" title="style" href="source/assets/front/css/shipping-index.css">
</head>
<body>

	<div>
	<img src="source/assets/dest/images/logo-cake.png" width="200px" alt="">
	</div>
	<div class="row">
	    <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Đăng Nhập</li>
                <li>Địa Chỉ Giao Hàng</li>
                <li>Thanh Toán & Đặt Hàng</li>
            </ul>
            <div class="col-md-7 col-xs-9">
            	@include('frontend.shipping.partials.progress')
            </div>
            <div class="col-md-5 col-xs-3">
            	@include('frontend.shipping.partials.order')
            </div>
        </form>
	</div>
	
	<div class="clear-fix"></div>
	
	<!--jquery phai duoc dat truoc js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5a94337cd7591465c70807e3/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
	<!-- include js files -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
	
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="source/assets/front/js/shipping-index.js"></script>
	
</body>
</html>
