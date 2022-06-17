var app = angular.module("myapp", []);
app.controller("detailcontroller",function($scope,$rootScope, $http) {
    //get
    if(!JSON.parse(localStorage.getItem(('cart')))){
        $rootScope.sl=0;
    }else{
        $rootScope.sl=JSON.parse(localStorage.getItem(('cart'))).length;
    }

    $rootScope.tkh=JSON.parse(localStorage.getItem(('MaKH')));
    console.log($rootScope.tkh);
    if($rootScope.tkh==null){
        $('#cli').hide();
    }
    else{
        $http({
            method: "GET",
            url: "http://localhost:8000/api/khachhang/" + $rootScope.tkh,
        }).then(function (response) {
            $rootScope.kh = response.data;
            console.log($rootScope.kh);

            $rootScope.name_client=$rootScope.kh.TenKH;
        });
        
    }



    $scope.id=JSON.parse(localStorage.getItem(('idProduct')));
    $scope.index=0;
    $scope.idSize='';
    console.log($scope.id);

    //lấy sp
    $http({
        method: "GET",
        url: "http://localhost:8000/api/sanpham/"+$scope.id,
    }).then(function (response) {
        console.log(response.data.data);
        $scope.sanphams = response.data.data;

        $http({
            method: "GET",
            url: "http://localhost:8000/api/getSpDmcDetail/"+$scope.sanphams.MaDMC,
        }).then(function (response) {

            $scope.spl=response.data.data;
            console.log(response.data.data);
        });
        
    });

    //thay đổi khi click ảnh
    $scope.changeIndex=function(ix){
        $scope.index=ix;
        
    }


    $scope.show = function () {
        $scope.idSize=$scope.sanphams.current_size.MaSize;
        console.log($scope.sanphams.current_size.MaSize);
    }


    
    //tăng giảm số lượng
    $scope.qty=parseInt($('#quantity').val());
    $(document).ready(function(){
		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        e.preventDefault();
		        var quantity = parseInt($('#quantity').val());

		            $('#quantity').val(quantity + 1);
		    });

		     $('.quantity-left-minus').click(function(e){
		        e.preventDefault();
		        var quantity = parseInt($('#quantity').val());
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
	});



    //thêm vào giỏ hàng
    $scope.addCart=function(){
        if($scope.idSize==''){
            alert('Vui lòng nhập size!');
        }
        else{
            $scope.cart=[];
            $scope.val={sizeId:$scope.idSize, quantity: $scope.qty, cartId: Math.floor(Date.now() * Math.random())}
            if(localStorage.getItem('cart')){
                $scope.cart=JSON.parse(localStorage.getItem('cart'));
                $scope.isEx=false;
                //lặp qua sp
                $scope.cart.forEach(item => {
                    if(item.sizeId==$scope.idSize){
                        item.quantity+=$scope.val.quantity;
                        $scope.isEx=true;
                        return false;
                    }
                
                })
                if(!$scope.isEx){
                    $scope.cart.unshift($scope.val)
                }
            }
            else{
                $scope.cart.unshift($scope.val);
            }
            localStorage.setItem('cart',JSON.stringify($scope.cart));
            
            console.log(localStorage.getItem('cart'));
            document.location.href="/trangchu/cart";
        }

        
    }
});