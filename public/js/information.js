var app = angular.module("myapp", []); //tao 1 module
app.controller("infocontroller", function ($scope, $http, $rootScope) {
    $(".myInformation").show();
    $(".buyDonHang").hide();
    $scope.id=JSON.parse(localStorage.getItem('MaKH'));
    $http({
        method: "GET",
        url: "http://localhost:8000/api/khachhang/" + $scope.id,
    }).then(function (response) {
        $scope.kh = response.data;
        console.log($scope.kh);
    });

    $scope.changeList=function(id){
        if(id==1){
            $(".myInformation").show();
            $(".buyDonHang").hide();
        }else{
            $(".myInformation").hide();
            $(".buyDonHang").show();
        }
    }


    //đơn hàng
    $http({
        method: "GET",
        url: "http://localhost:8000/api/getdh/"+$scope.id,
    }).then(function (response) {
        $scope.donhang = response.data;
        console.log($scope.donhang);
    });



    //logout
    $scope.logout=function(){
        localStorage.removeItem("MaKH");
        document.location.href="/";
    }


    //sửa thông tin
    $scope.edit=function(kh){
        $http({
            method: "POST",
            url: "http://localhost:8000/api/editkh/" + $scope.id,
            data:kh,
            "content-Type": "application/json"
        }).then(function (response) {
            $scope.kq = response.data;
            console.log($scope.kq);
            alert("Bạn đã thay đổi thông tin thành công!");
        });
    }


    //lấy chi tiết đh

    $scope.detailDonhang=function(MaDH){
        $http({
            method: "GET",
            url: "http://localhost:8000/api/getDHAllInfo/"+MaDH,
        }).then(function (response) {
            $scope.ct = response.data;
            // console.log($scope.ct);
            $scope.ct.ctdhs.forEach(item => {
                $http({
                    method: "GET",
                    url: "http://localhost:8000/api/getSPwithSize/"+item.MaSize,
                }).then(function (response) {
                    console.log(response.data.mausac);
                    item['TenSP']= response.data.mausac.sanpham.TenSP;
                    item['Gia']= response.data.mausac.Gia;
                });
            })
            console.log($scope.ct);
        });
    }

    

    $scope.inDoc=function(info){
        if(localStorage.getItem("indoc")){
            localStorage.removeItem("indoc");
            localStorage.setItem("indoc",JSON.stringify(info));
            document.location.href='/trangchu/indoc';
        }
        else{
            localStorage.setItem("indoc",JSON.stringify(info));
            document.location.href='/trangchu/indoc';
        }
        
    }

});
