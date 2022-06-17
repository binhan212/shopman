
app.controller('getSP',['$scope','$http',getSP]);
function getSP($scope,$http)
{
	$scope.hello = "Xin chao angular";
	$http.get("/BTLZB/api/getSP.php").success(function(data){
		console.log(data);
		$scope.datas = data;
	}).error(function(data){
		
	});
}