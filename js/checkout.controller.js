routerApp.controller('checkoutController', function($scope) {  
        $scope.submit = function(){
            var form = $(this).closest('form');
            var my_data = form.serialize();
            console.log(my_data);
            my_data.push(JSON.parse(localStorage.getItem("cart")));
            $.ajax({ 
                url   : form.attr('action'),
                type  : form.attr('method'),
                data  : my_data, // data to be submitted
                success: function(response){
                    alert(response); // do what you like with the response
                }
        });
        return false;
    };
});
