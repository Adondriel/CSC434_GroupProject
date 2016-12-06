// js/purchase.controller.js
// Purchase controller file
// author: Josh Varone

routerApp.controller('purchaseController', function($scope) { 

    $.ajax({
        url: 'php/purchase.php',
        data: {func: "getAllPurchases"},
        dataType: 'json',
        success: function(data){
            $scope.$apply(function(){
                $scope.purchases = data;
            });
        }
    });
    
});