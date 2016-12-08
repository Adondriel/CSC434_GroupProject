routerApp.controller('homeController', function($scope) {  
	$.ajax({
		url: 'php/item.php',
		data: {func: "getAllItems"},
		dataType: 'json',
		success: function(data){
			$scope.$apply(function(){
				var newData = [];
				newData.push(data[0]);
				newData.push(data[1]);
				newData.push(data[2]);
				$scope.items = newData;
			});
			//console.info(data);
		}
	});	
});