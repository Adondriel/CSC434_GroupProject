routerApp.controller('addItemController', function($scope) {
    $scope.formData = {};

    $scope.addItem = function() {
        var item = this.formData;
        //localStorage.setItem('cart', JSON.stringify(localCart));
        //this will call ajax to php that will update the database.
        $.ajax({
            url: 'php/item.php',
            type: "POST",
            data: { func: "addItem", item: item },
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