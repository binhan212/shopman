<!DOCTYPE html>
<html lang="en" ng-app='myapp'>
  <head>
    <title>SHOPMAN</title>
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

	<style>
		img:hover{
			cursor: pointer;
		}
	</style>
  </head>
  <body class="goto-here" ng-controller="detailcontroller">
        @include('includes_TC.header')

    <section class="ftco-section">

    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5" style="display: flex;flex-wrap: initial;">
    				<div style="display: flex;justify-content: center;width:60%">
						<a href="#"><img src="/upload/sanpham/@{{sanphams.mausacs[0].AnhMS}}" style="width:100%;height:360px"></a>
					</div>
    				<div style="display:flex; justify-content:space-between; flex-direction: column;width:30%;padding-left:20px">
						<img src="/upload/sanpham/@{{sanphams.mausacs[1].AnhMS}}" style="width:70%; padding:3px 4px;height:90px" ng-click="changeIndex(1)">
						<img src="/upload/sanpham/@{{sanphams.mausacs[2].AnhMS}}" style="width:70%; padding:3px 4px;height:90px" ng-click="changeIndex(2)">
						<img src="/upload/sanpham/@{{sanphams.mausacs[3].AnhMS}}" style="width:70%; padding:3px 4px;height:90px" ng-click="changeIndex(3)">
						<img src="/upload/sanpham/@{{sanphams.mausacs[4].AnhMS}}" style="width:70%; padding:3px 4px;height:90px" ng-click="changeIndex(4)">
					</div>
					
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<p style="font-size: 24px;">@{{sanphams.TenSP}}</p>
    				<div class="rating d-flex">
						</div>
						<div>
							Giá<p class="price"><span>@{{sanphams.mausacs[index].Gia}} </span>VNĐ</p>
						</div>
    					
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>

	                  <select name="" class="form-control" ng-model="sanphams.current_size" ng-change="show()" ng-options="size.TenSize for size in sanphams.mausacs[index].sizes">
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<!-- <div class="col-md-12">
	          		<p style="color: #000;">600 kg available</p>
	          	</div> -->
          	</div>
          	<p><a href="#" class="btn btn-black py-3 px-5" ng-click="addCart()">Thêm Vào Giỏ Hàng</a></p>
    			</div>
    		</div>
    	</div>
    </section>
	
	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Cùng Loại</span>
            <p style="font-size: 24px;">Có thể bạn sẽ thích?</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3" ng-repeat="s in spl">
    				<div class="product" style="    height: 350px !important;overflow: hidden;">
    					<a href="#" class="img-prod"><img class="img-fluid" src="/upload/sanpham/@{{s.mausacs[0].AnhMS}}" alt="Colorlib Template" style="height: 200px;">
    						<span class="status">@{{s.GiamGia}}</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">@{{s.TenSP}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">@{{s.mausacs[0].Gia}}</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    
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
	<script src="/js/detail.js"></script>
    
  </body>
</html>