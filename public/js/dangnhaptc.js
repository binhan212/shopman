var app = angular.module("myapp", []); //tao 1 module
app.controller("dangnhapTCcontroller", function ($scope, $http) {
    $scope.dn={
        tk:'',
        mk:''
    };
   // cho dữ liệu vào ad
    $scope.login=function(data){
        console.log(data);
        $http({
            method: "POST",
            url: "http://localhost:8000/api/dangnhaptc",
            data:data,
            "content-Type": "application/json",
        }).then(function (response) {
            $scope.kq=response.data;
            console.log($scope.kq);
            if($scope.kq!=''){
                console.log($scope.kq);
                localStorage.setItem('MaKH',JSON.stringify($scope.kq[0].MaKH));
                document.location.href="/trangchu/detailpay";
            }
            else{
                //console.log($scope.kq);
                alert('TK or MK không đúng!');
                //window.location.reload();
            }
        })
    }

});