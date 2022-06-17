app.controller('getMigrations',['$scope','$http',getMigrations]);
function getMigrations($scope,$http){
    $http.get(
        "/BTLZB/api/getMigrations.php"
    ).success(function(data){
        $scope.datas=data;
    }).error(function(data){

    });
}