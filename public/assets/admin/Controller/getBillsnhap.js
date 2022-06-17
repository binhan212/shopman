app.controller('getBillsnhap',['$scope','$http',getBillsnhap]);
function getBillsnhap($scope,$http){
    $http.get(
        "/BTLZB/api/getBillsnhap.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){

    });
}