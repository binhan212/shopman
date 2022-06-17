app.controller('getKhachhang',['$scope','$http',getKhachhang]);
function getKhachhang($scope,$http){
    $http.get(
        "/BTLZB/api/getKhachhang.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){

    });
}