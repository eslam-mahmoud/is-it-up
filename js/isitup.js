angular.module('isitupApp', ['ngSanitize'])
    .controller('UrlFormController', ['$http', function($http, $sce) {
        //map the name of the controller to internal name we can use inside this function
        var urlForm = this;
        //set default value
        urlForm.checkingURL = false;
        
        urlForm.checkURL = function () {
            //reset the status of the html alet box
            urlForm.resetStatus();
            
            //show loading message
            urlForm.checkingURL = true;

            //avoid empty submission
            var url = '';
            if (urlForm.url !== undefined) {
                url = urlForm.url;
            }

            // Post request to get url status:
            $http({
                url: 'backend.php',
                method: 'POST',
                data: "url=" + url, //if used data: {url: urlForm.url} will get empty $_POST in PHP !!
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
            }).then(function successCallback(response) {
                // this callback will be called asynchronously
                // when the response is available
                //parse returned data to see the status of the url
                urlForm.checkingURL = false;
                //display result message
                if (response.data.status) {
                    urlForm.successMessage = response.data.message;
                    urlForm.checkingURLSuccess = true;
                } else {
                    urlForm.failMessage = response.data.message;
                    urlForm.checkingURLFail = true;
                }
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                urlForm.checkingURL = false;
                $('.alert-danger').html('Server error, Please try again');
                urlForm.checkingURLFail = true;
            });
        };
        
        //reset the status of the html alet box
        urlForm.resetStatus = function () {
            urlForm.checkingURL = false;
            urlForm.checkingURLSuccess = false;
            urlForm.checkingURLFail = false;
        }
    }])
    .controller('HistoryController', ['$http', function($http) {
        //map the name of the controller to internal name we can use inside this function
        var history = this;
        //set default value
        history.items = false;
        
        history.getHistory = function () {
            // Post request to get url status:
            $http({
                url: 'history.php',
                method: 'GET',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
            }).then(function successCallback(response) {
                history.items = response.data;
            }, function errorCallback(response) {
            });
        };
        history.getHistory();
    }]);