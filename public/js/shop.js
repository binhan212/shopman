var app = angular.module("myapp", []);
app.controller("shopcontroller",function($scope,$rootScope, $http) {
    //get
    if(!JSON.parse(localStorage.getItem(('cart')))){
        $rootScope.sl=0;
    }else{
        $rootScope.sl=JSON.parse(localStorage.getItem(('cart'))).length;
    }


    $rootScope.hswName=JSON.parse(localStorage.getItem(('MaKH')));
    console.log($rootScope.hswName);
    if(!$rootScope.hswName){
        $('#cli').hide();
    }
    else{
        $http({
            method: "GET",
            url: "http://localhost:8000/api/khachhang/" + $rootScope.hswName,
        }).then(function (response) {
            $rootScope.kh1 = response.data;
            console.log($rootScope.kh1);

            $rootScope.name_client=$rootScope.kh1.TenKH;
        });
        
    }

    $scope.MaDML=JSON.parse(localStorage.getItem(('MaDML')));
    $scope.madmc=0;
    $http({
        method: "GET",
        url: "http://localhost:8000/api/dml/" + $scope.MaDML,
    }).then(function (response) {
        $scope.dml = response.data;
        console.log($scope.dml);
    });

    $http({
        method: "GET",
        url: "http://localhost:8000/api/getdmc/" + $scope.MaDML,
    }).then(function (response) {
        $scope.dmc = response.data;
        $scope.madmc=$scope.dmc[0].MaDM;
        console.log($scope.madmc);

        $http({
            method: "GET",
            url: "http://localhost:8000/api/getSpDmc/" + $scope.madmc,
        }).then(function (response) {
            $scope.sp = response.data.data;
            console.log($scope.sp);
        });

    });

    $scope.changeKindOf=function(ma){
        $http({
            method: "GET",
            url: "http://localhost:8000/api/getSpDmc/" +ma,
        }).then(function (response) {
            $scope.sp = response.data.data;
            console.log($scope.sp);
        });
    }

    

        
})