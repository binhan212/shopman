var app = angular.module("myapp", []);
app.controller("searchcontroller",function($scope,$rootScope, $http) {
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

    $rootScope.text=JSON.parse(localStorage.getItem(('search')));
    console.log($rootScope.text);

    $http({
        method: "GET",
        url: "http://localhost:8000/api/search/" + $rootScope.text,
    }).then(function (response) {
        
        $scope.sp = response.data.data;
        console.log($scope.sp);
    });



});
