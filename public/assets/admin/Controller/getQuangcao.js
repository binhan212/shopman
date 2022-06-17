
app.controller('getQuangcao',['$scope','$http',getQuangcao]);
function getQuangcao($scope,$http)
{
	$scope.hello = "Xin chao angular";
	$http.get("/BTLZB/api/getQuangcao.php").success(function(data){
		console.log(data);
		$scope.datas = data;
	}).error(function(data){
		
	});
}