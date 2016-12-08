routerApp.controller('loginController', function($scope) { 
	$scope.keypressed = function(e){
		console.info(e);
		console.info(this.searchTerm);
		if (e.which === 13){

		}
	}
});