routerApp.controller('loginController', function($scope) { 
	$scope.loginStatus = function(){
		return checkLoginStatus();
	}
	console.info(checkLoginStatus());
	console.info($scope.loginStatus());
});