app.controller('getKho',['$scope','$http',getKho]);
function getKho($scope,$http){
    $http.get(
        "/BTLZB/api/getKho.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){

    });
}