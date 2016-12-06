routerApp.controller('checkoutController', function ($scope) {
    $scope.formData = {};

    $scope.submit = function (event, form) {
        this.formData.cart = JSON.parse(localStorage.getItem('cart'));
        console.info(this.formData);
        $.ajax({
            url: '',
            type: 'POST',
            data: this.formData, // data to be submitted
            success: function (response) {
                //alert(response); // do what you like with the response
                alert("Thank you!");
                localStorage.removeItem('cart');
            }
        });
        return false;
    };
});
