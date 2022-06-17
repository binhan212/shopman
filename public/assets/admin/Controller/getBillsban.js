app.controller('getBillsban',['$scope','$http',getBillsban]);
function getBillsban($scope,$http){
    $http.get(
        "/BTLZB/api/getBillsban.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){

    });
}