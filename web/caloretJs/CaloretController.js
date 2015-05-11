define(['jquery', 'jquery_modal'], function($){ 

CaloretController = {
	getAndParse: function(controller_name, method_name){
		var __this = this;

		$.getJSON("index.php", { c: controller_name, m: method_name }, function(data){
			if(data.alertMsg != null){
				__this.openModalWithContent(data.alertMsg);
			}
		});

	}, 

	openModalWithContent: function(content){
		if(!$("#modal_content").length){
			$("<div id='modal_content' />")
				.appendTo($("body"));
		}

		$("#modal_content")
			.html(content)
			.bPopup();
	}

};

return CaloretController;

});