define(['jquery', 'ControllerManager'], function($, ControllerManager){ 

var CaloretJs = function(params){
	this.listenExecute();
	this.ControllerManager = new ControllerManager();
}

CaloretJs.prototype.listenExecute = function(){
	var __this = this;

	$(document).on("click", "[execute]", function(e){
		e.preventDefault();
		var controller_method = $(this).attr("execute").split("_");
		var controller_name = controller_method[0];
		var method_name = controller_method[1];

		__this.ControllerManager.executeController(controller_name, method_name);
	});
}



$(document).ready(function() {
	var Caloret = new CaloretJs();
});

});