routerApp.controller('itemController', function($scope, $state, $stateParams) {
    $scope.rating = 1;
	$scope.comment = "";
	$scope.ratings = [];
	$.ajax({
		url: 'php/item.php',
		type: 'POST',
		data: {func: "getItemById", itemId: $stateParams.itemId},
		dataType: 'json',
		success: function(data){
			$scope.$apply(function(){
				$scope.item = data[0];
			});
		}
	});	

	$.ajax({
		url: 'php/item.php',
		type: 'POST',
		data: {func: "getRatings", itemId: $stateParams.itemId},
		dataType: 'json',
		success: function(data){
			$scope.$apply(function(){
				$scope.ratings = data;
			});
		}
	});	

	$scope.submitRating = function(){
		$.ajax({
			url: 'php/item.php',
			type: 'POST',
			data: {func: "submitRating", itemId: $stateParams.itemId, rating: $scope.rating, comment: $scope.comment},
			dataType: 'json',
			success: function(data){
				$scope.$apply(function(){
					//$scope.item = data[0];
				});
			}
		});	
	}



});
