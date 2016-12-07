routerApp.controller('productsController', function($scope) {
	$.ajax({
		url: 'php/item.php',
		data: {func: "getAllItems"},
		dataType: 'json',
		success: function(data){
			$scope.$apply(function(){
				$scope.items = data;
			});
			//console.info(data);
		}
	});
});
