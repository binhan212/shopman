var app = angular.module("myapp", []); //tao 1 module
app.controller("detailpaycontroller", function ($scope, $http, $rootScope) {
    if(!JSON.parse(localStorage.getItem(('cart')))){
        $rootScope.sl=0;
    }else{
        $rootScope.sl=JSON.parse(localStorage.getItem(('cart'))).length;
    }
    

    $scope.id=JSON.parse(localStorage.getItem('MaKH'));
    console.log($scope.id);
    $scope.tongtien=0;
    // tên tài khoản
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


    // lấy khách hàng
    $http({
        method: "GET",
        url: "http://localhost:8000/api/khachhang/" + $scope.id,
    }).then(function (response) {
        $scope.kh = response.data;
        console.log($scope.kh);
    });


    $scope.cart=JSON.parse(localStorage.getItem('cart'));
    $http({
        method: "POST",
        url: "http://localhost:8000/api/cart",
        data: {
            cart: $scope.cart
        }
    }).then(function (response) {

        console.log(response.data);
        $scope.sanphams =response.data;

        $scope.sanphams.forEach(item => {
            $scope.tongtien=$scope.tongtien+item.mausac.Gia;
        })

        console.log($scope.tongtien);

    });


       

    $scope.addhang={
        "MaDH": 1,
        "NgayDatHang": "",
        "ThanhTien": "",
        "DiaChiGiaoHang":"",
        "SDT":"",
        "HoTen": "",
        "GhiChu":"",
        "MaKH":"",
        "CTDH":[
                
        ]
    }
    
    $scope.buyCart=function(kh,sanphams,tongtien){
        console.log(kh);
        console.log(sanphams);
        // $scope.addhang.MaDH=Math.floor(Date.now() * Math.random());
        $scope.addhang.NgayDatHang=Date.now();
        $scope.addhang.HoTen=kh.TenKH;
        $scope.addhang.DiaChiGiaoHang=kh.DiaChi;
        $scope.addhang.SDT=kh.SDT;
        $scope.addhang.ThanhTien=tongtien;
        $scope.addhang.GhiChu="no"; 
        $scope.addhang.MaKH=kh.MaKH;
        sanphams.forEach(item=>{
            let CTDH={
                "MaCTDH":"",
                "MaSize":"",
                "GiamGia":"",
                "SoLuong":"",
                "MaDH":"",
            }
            // $scope.CTDH.MaCTDH=Math.floor(Date.now() * Math.random());
            CTDH.MaSize=item.MaSize;
            CTDH.GiamGia=item.mausac.sanpham.GiamGia;
            CTDH.SoLuong=item.quantity;
            // $scope.CTDH.MaDH=$scope.addhang.MaDH;
            $scope.addhang.CTDH.push(CTDH);
        })
        console.log($scope.addhang);


        $http({
            method: "POST",
            url: "http://localhost:8000/api/themdonhang",
            data: $scope.addhang
        }).then(function (response) {
            console.log(response.data);
            localStorage.removeItem("cart");
            alert("Đơn hàng của bạn đã được đặt thành công!");
            document.location.href="/";
        });

    }


});
