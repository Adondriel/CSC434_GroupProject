routerApp.controller('searchController', function($scope, $state, $stateParams, $filter) {  
	//console.info($state);
	//console.info($stateParams);
	//console.info($scope.searchTerm);
    
    $scope.searchTerm = $stateParams.searchTerm;
    
    $.ajax({
		url: 'php/item.php',
		data: {func: "getAllItems"},
		dataType: 'json',
		success: function(data){
            var filteredData = 	$filter('filter')(data, {name: $stateParams.searchTerm});
			$scope.$apply(function(){
				$scope.items = filteredData;
			});
		}
	});	
});