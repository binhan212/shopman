
app.controller("trangchucontroller",function($scope,$rootScope, $http) {
    //get
    $scope.addCart=function(id){
        console.log(id);
        $scope.cart=[];
        $scope.val={sizeId:id, quantity: 1, cartId: Math.floor(Date.now() * Math.random())}
        if(localStorage.getItem('cart')){
            $scope.cart=JSON.parse(localStorage.getItem('cart'));
            $scope.isEx=false;
            //lặp qua sp
            $scope.cart.forEach(item => {
                if(item.sizeId==id){
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
    }

    $scope.detail=function(id){
        console.log(id);
        localStorage.setItem('idProduct',JSON.stringify(id));
    }
    
    $scope.danhmuc=function(id){
        if(!JSON.parse(localStorage.getItem('search'))){
            localStorage.removeItem('MaDML');
            localStorage.setItem('MaDML',JSON.stringify(id));
        }
        else{
            localStorage.setItem('MaDML',JSON.stringify(id));
        }
        document.location.href='/trangchu/shop';
    }

    $scope.searchText='';

    $scope.search=function(text){
        if(!JSON.parse(localStorage.getItem('search'))){
            localStorage.removeItem('search');
            localStorage.setItem('search',JSON.stringify(text));
        }
        else{
            localStorage.setItem('search',JSON.stringify(text));
        }

        console.log(text);
        document.location.href='/trangchu/search';
    }


});
