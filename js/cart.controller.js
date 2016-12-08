/* 
ar testObject = { 'URL': 1, 'TITLE': 2 };
localStorage.setItem('testObject', JSON.stringify(testObject));
var retrievedObject = localStorage.getItem('testObject');
console.log('retrievedObject: ', JSON.parse(retrievedObject));
*/

routerApp.controller('cartController', function($scope) {
    $scope.addItemToCart = function(item) {
        item.quantity = 1;
        //console.info(item);
        var cart = [];
        if (localStorage.getItem('cart') === null) {
            cart.push(item);
        } else {
            cart = JSON.parse(localStorage.getItem('cart'));
            //check if the item is already in the cart, if so add to the quanity.
            var alreadyInCart = false;
            for (i = 0; i < cart.length; i++) {
                loopItem = cart[i];
                if (loopItem.itemId === item.itemId) {
                    alreadyInCart = true;
                    //We know there is at least 1 of said item in cart now,
                    //Now, we need to verify that quantity has been initiated, 
                    //we start at 1 because we already have 1 in the cart and will increment this newly initialized variable right after this.
                    if (loopItem.quantity === null) {
                        cart[i].quantity = "1";
                    }
                    cart[i].quantity = parseInt(cart[i].quantity) + 1;
                }
            }
            if (!alreadyInCart) {
                cart.push(item);
            }
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        //console.info(cart);
    }

    $scope.addWishlistToCart = function() {
        $.ajax({
            url: 'php/wishlist.php',
            type: 'POST',
            data: { func: "getWishlist" },
            dataType: 'json',
            success: function(data) {
                $scope.$apply(function() {
                    console.info(data);
                    $scope.wishlist = data
                });
            }
        });

        for (var i = 0; i < this.wishlist.length; i++) {
            this.addItemToCart(this.wishlist[i]);
        }
        //console.info(this.cart);
    }

    $scope.updateCart = function(localCart) {
        localStorage.setItem('cart', JSON.stringify(localCart));
    }

    $scope.removeItem = function(item) {
        var index = this.cart.indexOf(item);
        this.cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(this.cart));
    }

    $scope.cart = JSON.parse(localStorage.getItem('cart'));
    $scope.total = function() {
        if (this.cart) {
            var sum = 0.00;
            for (var i = 0; i < this.cart.length; i++) {
                sum = sum + this.cart[i].price * this.cart[i].quantity;
            }
            return sum.toFixed(2);
        } else {
            return 0.00;
        }
    }
});