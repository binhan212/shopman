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
        .product-category li span a:hover{
            color:darkturquoise;
        }
	</style>
  </head>
  <body class="goto-here" ng-controller="searchcontroller">
        @include('includes_TC.header')

    <section class="ftco-section" style="padding: 4em 0;">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3" ng-repeat="s1 in sp">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="/upload/sanpham/@{{s1.mausacs[0].AnhMS}}" alt="Colorlib Template" style="height:330px;">
    						<span class="status">@{{s1.GiamGia}}%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">@{{s1.TenSP}}</a></h3>
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
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
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
	<script src="/js/search.js"></script>
    
  </body>
</html>