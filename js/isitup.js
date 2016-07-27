angular.module('isitupApp', [])
	.controller('UrlFormController', function() {
		//map the name of the controller to internal name we can use inside this function
		var urlForm = this;
		//set default value
		urlForm.checkingURL = false;
		
		urlForm.checkURL = function () {
			urlForm.checkingURL = true;
		};
	}
);