app.controller('getBilldetailban',['$scope','$http',getBilldetailban]);
function getBilldetailban($scope,$http){
    $http.get(
        "/BTLZB/api/getBilldetailban.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){
    });
}