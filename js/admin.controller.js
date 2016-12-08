routerApp.controller('adminController', function($scope) {
    $.ajax({
        url: 'php/item.php',
        data: { func: "getAllItems" },
        dataType: 'json',
        success: function(data) {
            $scope.$apply(function() {
                $scope.items = data;
            });
            //console.info(data);
        }
    });

    $scope.updateItem = function(item) {
        //localStorage.setItem('cart', JSON.stringify(localCart));
        //this will call ajax to php that will update the database.
        $.ajax({
            url: 'php/item.php',
            type: "POST",
            data: { func: "updateItem", item: item },
            dataType: 'json',
            success: function(data) {
                // $scope.$apply(function() {
                //     $scope.items = data;
                // });
                // console.info(data);
            }
        });
    }
});