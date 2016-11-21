routerApp.controller('searchController', function($scope, $state, $stateParams, $filter) {  
	//console.info($state);
	//console.info($stateParams);
	//console.info($scope.searchTerm);
    $scope.scotchList = [
        {
            name: 'Macallan 12',
            price: 50
        },
        {
            name: 'Chivas Regal Royal Salute',
            price: 10000
        },
        {
            name: 'Glenfiddich 1937',
            price: 20000
        }
    ];  
	//This will filter the datasource by the thing they searched for.
	$scope.searchResults = $filter('filter')($scope.scotchList, {name: $stateParams.searchTerm});
});