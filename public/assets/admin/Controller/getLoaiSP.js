app.controller('getLoaiSP',['$scope','$http',getLoaiSP]);
function getLoaiSP($scope,$http){
    $http.get(
        "/BTLZB/api/getLoaiSP.php"
    ).success(function(data){
        $scope.datas=data;
        console.log(datas);
    }).error(function(data){
    });
}