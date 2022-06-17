<!DOCTYPE html>
<html lang="en" ng-app="myapp">
  <head>
    <title>Shop Man</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/trangChu/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/trangChu/css/animate.css">
    
    <link rel="stylesheet" href="/trangChu/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/trangChu/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/trangChu/css/magnific-popup.css">

    <link rel="stylesheet" href="/trangChu/css/aos.css">

    <link rel="stylesheet" href="/trangChu/css/ionicons.min.css">

    <link rel="stylesheet" href="/trangChu/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/trangChu/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/trangChu/css/flaticon.css">
    <link rel="stylesheet" href="/trangChu/css/icomoon.css">
    <link rel="stylesheet" href="/trangChu/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  </head>
  <body class="goto-here" ng-controller="detailpaycontroller">

  @include('includes_TC.header')

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="#" class="billing-form">
							<h3 class="mb-4 billing-heading">Chi Tiết Đơn Hàng</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Họ Tên</label>
	                  <input type="text" class="form-control" placeholder="" ng-model="kh.TenKH">
	                </div>
	              </div>
                <div class="w-100"></div>

		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa Chỉ Nhận</label>
	                  <input type="text" class="form-control" placeholder="Số Nhà, Số đường..." ng-model="kh.DiaChi">
	                </div>
		            </div>
		            
		            <div class="w-100">

					<div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">SĐT</label>
	                  <input type="text" class="form-control" placeholder="" ng-model="kh.SDT">
	                </div>
	              </div>

					</div>
		            <div class="w-100">
					<div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="text" class="form-control" placeholder="" ng-model="kh.Email">
	                </div>
                </div>

					</div>
		            
	              
                <div class="w-100"></div>
	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Thanh Toán</h3>
	          			<p class="d-flex">
		    						<span>Tổng Tiền</span>
		    						<span>@{{tongtien}} VNĐ</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Toàn Bộ</span>
		    						<span>@{{tongtien}} VNĐ</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Thanh Toán</h3>
									<p><a href="#"class="btn btn-primary py-3 px-4" ng-click="buyCart(kh,sanphams,tongtien)">Chốt Đơn</a></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    @include('includes_TC.footer')

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/trangChu/js/jquery.min.js"></script>
  <script src="/trangChu/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/trangChu/js/popper.min.js"></script>
  <script src="/trangChu/js/bootstrap.min.js"></script>
  <script src="/trangChu/js/jquery.easing.1.3.js"></script>
  <script src="/trangChu/js/jquery.waypoints.min.js"></script>
  <script src="/trangChu/js/jquery.stellar.min.js"></script>
  <script src="/trangChu/js/owl.carousel.min.js"></script>
  <script src="/trangChu/js/jquery.magnific-popup.min.js"></script>
  <script src="/trangChu/js/aos.js"></script>
  <script src="/trangChu/js/jquery.animateNumber.min.js"></script>
  <script src="/trangChu/js/bootstrap-datepicker.js"></script>
  <script src="/trangChu/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/trangChu/js/google-map.js"></script>
  <script src="/trangChu/js/main.js"></script>

  <script src="/js/angular.min.js"></script>
  <script src="/js/appTC.js"></script>
  <script src="/js/detailpay.js"></script>

  <script>

		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>

  
</html>