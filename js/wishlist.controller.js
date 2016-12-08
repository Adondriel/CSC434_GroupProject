routerApp.controller('wishlistController', function($scope) {
    $.ajax({
        url: 'php/wishlist.php',
        type: 'POST',
        data: { func: "getWishlist" },
        dataType: 'json',
        success: function(data) {
            $scope.$apply(function() {
                //console.info(data);
                $scope.wishlist = data
            });
        }
    });



    $scope.addItemToWishlist = function(itemId) {
        //this will send the itemId to the php file, with the itemId that needs to be added.
        $.ajax({
            url: 'php/wishlist.php',
            type: 'POST',
            data: { func: "addItemToWishlist", itemId: itemId },
            success: function(response) {
                //console.info("Added to wishlist");
                //alert(response); // do what you like with the response
                //alert("Thank you!");
                //localStorage.removeItem('cart');
            }
        });
    }
    $scope.removeItemFromWishlist = function(wishlistId) {
        $.ajax({
            url: 'php/wishlist.php',
            type: 'POST',
            data: { func: "removeItemFromWishlist", wishlistId: wishlistId },
            success: function(response) {
                $.ajax({
                    url: 'php/wishlist.php',
                    type: 'POST',
                    data: { func: "getWishlist" },
                    dataType: 'json',
                    success: function(data) {
                        $scope.$apply(function() {
                            //console.info(data);
                            $scope.wishlist = data
                        });
                    }
                });
            }
        });
    }
});