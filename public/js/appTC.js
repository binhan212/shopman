var app = angular.module("myapp", []);
app.run(function ($rootScope, $http) {
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
    

});