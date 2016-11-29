var routerApp = angular.module('routerApp', ['ui.router']);

routerApp.config(function($stateProvider, $urlRouterProvider) {

	
    $urlRouterProvider.otherwise('/home');
    
    $stateProvider        
        // HOME STATES AND NESTED VIEWS ========================================
        .state('home', {
            url: '/home',
			templateUrl: 'partials/home.html',
			controller: 'homeController'
        })
		
		.state('search', {
			url: '/search/:searchTerm',
			templateUrl: 'partials/search.html',
			controller: 'searchController'
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
		
		.state('account', {
			url: '/account',
			templateUrl: 'partials/account.html',
			controller: 'accountController'
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

