routerApp.controller('wishlistController', function ($scope) {

    $scope.addItemToWishlist = function (itemId) {
        //this will send the itemId to the php file, with the itemId that needs to be added.
        $.ajax({
            url: '',
            type: 'POST',
            data: { func: "addItemToWishlist", itemId: itemId },
            success: function (response) {
                console.info("Added to wishlist");
                //alert(response); // do what you like with the response
                //alert("Thank you!");
                //localStorage.removeItem('cart');
            }
        });
    }
    $scope.removeItemFromWishlist = function(itemId){
        $.ajax({
            url: '',
            type: 'POST',
            data: { func: "removeItemFromWishlist", itemId: itemId },
            success: function (response) {
                console.info("removedFromWithlist")
                //alert(response); // do what you like with the response
                //alert("Thank you!");
                //localStorage.removeItem('cart');
            }
        });
    }
});
