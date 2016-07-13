var app = angular.module('App', [
    'ngAnimate',
    'ui.bootstrap',
    'ui.router',
    'anim-in-out',
    'naif.base64',
    'checklist-model',
    'colorpicker.module',
    'toastr'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}
);




app.config(function ($stateProvider, $urlRouterProvider, toastrConfig) {
    angular.extend(toastrConfig, {
        closeButton: true,
        extendedTimeOut: 1000,
        progressBar: true,
        tapToDismiss: true,
        timeOut: 5000
    });




    $urlRouterProvider.otherwise('/home');

    $stateProvider.state('home', {
        url: '/home',
        templateUrl: 'http://mercado.app/frag/home'
    }).state('vistaProductos', {
        url: '/vistaProductos',
        templateUrl: 'http://mercado.app/frag/vistaProductos'
    }).state('addProductos', {
        url: '/addProductos',
        templateUrl: 'http://mercado.app/frag/addProductos'
    }).state('addCategoria', {
        url: '/addCategoria',
        templateUrl: 'http://mercado.app/frag/addCategoria'
    }).state('vistaUsers', {
        url: '/vistaUsers',
        templateUrl: 'http://mercado.app/frag/vistaUsers'
    });


});




app.controller('Control', ['$scope', '$http', 'toastr', function ($scope, $http, toastr) {


        $scope.select = {
            categorias: []
        };

        $scope.roles = ["user", "admin"];

        $scope.obtenerCategorias = function () {
            $http.get('http://mercado.app/categorias')
                    .success(function (data, status, headers, config) {
                        $scope.categorias = data;
                    })
                    .error(function (err, status, headers, config) {
                        console.log(err);
                    });
        };


        $scope.obtenerProductos = function () {
            listaProductos();
        };

        $scope.agregarCategoria = function () {

            var categoria = $scope.categoria;

            $http.post('http://mercado.app/categorias', categoria)
                    .success(function (data, status, headers, config) {
                        toastr.success(data.ECO, 'Muy bien');
                        $scope.categoria.nombre = '';
                    })
                    .error(function (err, status, headers, config) {
                        console.log(err);
                    });
        };




        $scope.agregarProducto = function () {
            var imagen = $scope.producto.imagen;
            $scope.producto.imagen = "data:" + imagen.filetype + ";base64," + imagen.base64;
            $scope.producto.categorias = $scope.select.categorias;
            var producto = $scope.producto;
            console.log(producto);

            $http.post('http://mercado.app/productos', producto)
                    .success(function (data, status, headers, config) {
                        toastr.success(data.ECO, 'Muy bien');
                        $scope.producto.nombre = '';
                        $scope.select.categorias = [];

                    })
                    .error(function (err, status, headers, config) {
                        console.log(err);
                    });
        };

        $scope.comprarProducto = function (id) {

            $http.delete('http://mercado.app/productos/' + id)
                    .success(function (data, status, headers, config) {
                        listaProductos();
                        toastr.success(data.ECO, 'Muy bien');
                    })
                    .error(function (err, status, headers, config) {
                        console.err(err);
                    });


        };


        $scope.obtenerUsers = function () {
            obtenerUsers();
        };

        $scope.cambbiarRol = function (id, rol) {

            $http.put('http://mercado.app/users/' + id, {rol: rol})
                    .success(function (data, status, headers, config) {
                        obtenerUsers();
                        toastr.success(data.ECO, 'Muy bien');
                    })
                    .error(function (err, status, headers, config) {
                        console.log(err);
                    });
        };


        $scope.borrarUser = function (id) {
            $http.delete('http://mercado.app/users/' + id)
                    .success(function (data, status, headers, config) {
                        obtenerUsers();
                        toastr.success(data.ECO, 'Muy bien');
                    })
                    .error(function (err, status, headers, config) {
                        console.log(err);
                    });
        };



        function obtenerUsers() {
            $http.get('http://mercado.app/users')
                    .success(function (data, status, headers, config) {
                        $scope.users = data;

                    })
                    .error(function (err, status, headers, config) {
                        console.log(err);
                    });
        }


        function listaProductos() {
            $http.get('http://mercado.app/productos')
                    .success(function (data, status, headers, config) {
                        $scope.productos = data;
                    })
                    .error(function (err, status, headers, config) {
                        console.err(err);
                    });
        }

    }
]);