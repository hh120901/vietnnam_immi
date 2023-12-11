function confirmBox(title, message, callback, params)
{
	if (!$("#confirm-dialog").length) {
		$("body").append('<div class="modal-warning modal fade" id="confirm-dialog" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="messageModalLabel">Modal title</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary btn-confirm-dialog-ok">OK</button> <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button></div></div></div></div>');
	}
	
	$("#confirm-dialog").find(".modal-title").html(title);
	$("#confirm-dialog").find(".modal-body").html(message);
	$("#confirm-dialog").find(".btn-confirm-dialog-ok").click(function(event) {
		var fn = window[callback];
		if (!(params instanceof Array)) {
			params = [params];
		}
		if (typeof fn === "function") {
			fn.apply(null, params);
		}
		$("#confirm-dialog").modal("hide");
	});
	
	$("#confirm-dialog").modal("show");
	
	return $("#confirm-dialog");
}

function messageBox(type, title, message)
{
	if (!$("#dialog").length) {
		$("body").append('<div class="modal-error modal fade" id="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="messageModalLabel">Modal title</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button></div></div></div></div>');
	}

	$("#dialog").removeClass("modal-error");
	$("#dialog").removeClass("modal-info");
	$("#dialog").removeClass("modal-warning");
	$("#dialog").removeClass("modal-success");
	
	if (type == "INFO") {
		$("#dialog").addClass("modal-info");
	} else if (type == "WARNING") {
		$("#dialog").addClass("modal-warning");
	} else if (type == "SUCCESS") {
		$("#dialog").addClass("modal-success");
	} else {
		$("#dialog").addClass("modal-error");
	}
	
	$("#dialog").find(".modal-title").html(title);
	$("#dialog").find(".modal-body").html(message);
	
	if (typeof(message) == 'object' && message.length > 0) {
		var errorMsg = "<ul>";
 		for (var m=0; m < message.length; m++) {
			errorMsg += "<li>" + message[m] + "</li>";
		}
		errorMsg += "</ul>";
		$("#dialog").find(".modal-body").html(errorMsg);
	}
	
	$("#dialog").modal("show");
	
	return $("#dialog");
}