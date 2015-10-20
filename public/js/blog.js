"use strict";

(function() {
    var app = angular.module("blog", []);

    // Find the token value from the page using jQuery
    var token = $("meta[name=csrf-token]").attr("content");

    // Set the token as an Angular constant
    app.constant("CSRF_TOKEN", token);

    // Configure $http to include both your token and a flag indicating the request is AJAX
    app.config(["$httpProvider", "CSRF_TOKEN", function($httpProvider, CSRF_TOKEN) {
        $httpProvider.defaults.headers.common["X-Csrf-Token"] = CSRF_TOKEN;
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);

    app.controller("ManagePostsController", ['$http', '$log', '$scope', function($http, $log, $scope) {
    	$scope.posts = [];
    	// An Ajax get request to load some data from the server
        $http.get("/posts/list").then(function(data) {
            $log.info("Ajax request completed successfully!");

            $log.debug(data);
            $scope.posts = data.data;
        }, function(response) {
            $log.error("Ajax request failed for some reason!");

            $log.debug(response);
        });
        $scope.select = function ($index) {
            $scope.selectedPost = $index;
            console.log($scope.selectedPost);
            console.log($scope.posts[$scope.selectedPost]);
        }
        $scope.deletePost = function ($index) {
            var id = $scope.posts[$index].id;

            $http.delete('/posts/' + id).then(function (response) {
                $log.info("Post successfully deleted");

                $scope.posts.splice($index, 1);
            }, function (response) {
                $log.error("Post failed to delete");

                $log.debug(response);
            });
        }
        $scope.updatePost = function () {
            var id = $scope.posts[$scope.selectedPost].id;

            $http.put('/posts/' + id).then(function (response) {
                $log.info("Post successfully updated");

                $scope.posts.splice($index, 1);
            }, function (response) {
                $log.error("Post failed to delete");

                $log.debug(response);
            });
        }
    }]);
})();