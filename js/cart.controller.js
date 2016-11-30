/* 
ar testObject = { 'URL': 1, 'TITLE': 2 };
localStorage.setItem('testObject', JSON.stringify(testObject));
var retrievedObject = localStorage.getItem('testObject');
console.log('retrievedObject: ', JSON.parse(retrievedObject));
*/

routerApp.controller('cartController', function($scope) {  
	$scope.addItemToCart = function(item){
        //console.info(item);
        var cart;
        if(localStorage.getItem('cart') === null){
            cart = item;
        }else{
            cart = JSON.parse(localStorage.getItem('cart'));
            cart.push(item);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        console.info(cart);
    }
});