app.controller('getBilldetailnhap',['$scope','$http',getBilldetailnhap]);
function getBilldetailnhap($scope,$http){
    $http.get(
        "/BTLZB/api/getBilldetailnhap.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){

    });
}