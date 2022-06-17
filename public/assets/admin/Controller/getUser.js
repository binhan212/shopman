
app.controller('getUser',['$scope','$http',getUser]);
function getUser($scope,$http)
{
	$scope.hello = "Xin chao angular";
	$http.get("/BTLZB/api/getUser.php").success(function(data){
		console.log(data);
		$scope.datas = data;
	}).error(function(data){
		
	});
}