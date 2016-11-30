routerApp.controller('homeController', function($scope) {  
	$.ajax({
		url: 'php/item.php',
		data: {func: "getAllItems"},
		dataType: 'json',
		success: function(data){
			$scope.$apply(function(){
				$scope.featuredItems = data;
			});
			console.info(data);
		}
	});	
});