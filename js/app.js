var routerApp = angular.module('routerApp', ['ui.router', 'ui.bootstrap']);

routerApp.config(function($stateProvider, $urlRouterProvider) {


    $urlRouterProvider.otherwise('/');
    $stateProvider
    // HOME STATES AND NESTED VIEWS ========================================
    /*        .state('home', {
                url: '/home',
    			templateUrl: 'partials/home.html',
    			controller: 'homeController'
            })*/

        .state('/', {
        url: '/',
        views: {
            '': {
                templateUrl: 'partials/home.html',
            },
            'item-list@/': {
                templateUrl: 'partials/item-list.php',
                controller: 'homeController'
            }
        }
    })

    .state('search', {
        url: '/search/:searchTerm',
        controller: 'searchController',
        views: {
            '': {
                templateUrl: 'partials/search.html',
                controller: 'searchController'
            },
            'item-list@search': {
                templateUrl: 'partials/item-list.php',
                controller: 'searchController'
            }
        }
    })

    .state('login', {
            url: '/login',
            templateUrl: 'partials/login.php',
            controller: 'loginController'
        })
        .state('register', {
            url: '/register',
            templateUrl: 'partials/register.php',
            controller: 'registerController'
        })
        .state('cart', {
            url: '/cart',
            templateUrl: 'partials/cart.php',
            controller: 'cartController'
        })


    .state('products', {

            url: '/products',
            views: {
                '': {
                    templateUrl: 'partials/products.html',
                },
                'item-list@products': {
                    templateUrl: 'partials/item-list.php',
                    controller: 'productsController'
                }
            }
        })

        .state('admin', {
            url: '/admin',
            templateUrl: 'partials/admin.html',
            controller: 'adminController'
        })


    .state('checkout', {
            url: '/checkout',
            templateUrl: 'partials/checkout.php',
            controller: 'checkoutController'
        })
        .state('wishlist', {
            url: '/wishlist',
            templateUrl: 'partials/wishlist.php',
            controller: 'wishlistController'
        })



    .state('account', {
            url: '/account',
            templateUrl: 'partials/account.php',
            controller: 'accountController'
        })
        .state('purchases', {
            url: '/purchases',
            templateUrl: 'partials/purchases.html'
        });

    /*// nested list with custom controller
        .state('home.list', {
            url: '/list',
            templateUrl: 'partials/home-list.html',
            controller: function($scope) {
                $scope.dogs = ['Bernese', 'Husky', 'Goldendoodle'];
            }
        })

        // nested list with just some random string data
        .state('home.paragraph', {
            url: '/paragraph',
            template: 'I could sure use a drink right now.'
        })*/

    // ABOUT PAGE AND MULTIPLE NAMED VIEWS =================================
    /*
		  	Use <div ui-view="columnOne"></div> for the "columnOne@about: {}" to be placed into
			the page correctly.
		  */
    /*
        .state('about', {
            url: '/about',
            views: {
                '': { templateUrl: 'partials/about.html' },
                'columnOne@about': { template: 'Look I am a column!' },
                'columnTwo@about': {
                    templateUrl: 'partials/table-data.html',
                    controller: 'scotchController'
                }
            }
        });*/

});
