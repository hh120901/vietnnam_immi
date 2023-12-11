$(document).ready(function () {
	$('.btn-check-all').on('change', function(){
		let getAllCheckBox = $('.checkbox-manage-content');
		getAllCheckBox.prop('checked', $(this).prop('checked'));
		$("#checkedboxcounter").val($(".checkbox-manage-content:checked").length);
	});
	$('.checkbox-manage-content').on('change', function(){
		if (!$(this).prop('checked')) {
			$('.btn-check-all').prop('checked', false);
		}
		if ($(".checkbox-manage-content:checked").length === $(".checkbox-manage-content").length) {
			$('.btn-check-all').prop('checked', true);
		}
		$("#checkedboxcounter").val($(".checkbox-manage-content:checked").length);
	})
	
	$(".btn-search").click(function(e) {
		submitButton("search", window.location.pathname);
	});
	
	$('.custom-input.required').on('focus', function(){
		$(this).removeClass('error');
		$(this).parent().find('.input-error').addClass('d-none');
	})

	$('.custom-input.required').on('blur', function(){
		if ($(this).val() == '') {
			$(this).addClass('error');
			$(this).parent().find('.input-error').removeClass('d-none');
		}
	})

	$('.drop-zone').on('drop', function (e) {
		$(this).removeClass('error');
	});
	$('.input-file.required').on('change', function(){
		$('.drop-zone.error').removeClass('error');
	})

	$(".btn-save").click(function(){
		submitButton("save");
	});

	$(".btn-delete").on('click', function(e){
		e.preventDefault();
		if ($("#checkedboxcounter").val() == 0) {
			messageBox("ERROR", "Error", "Please make a selection from the list to delete.");
		}
		else {
			confirmBox("Delete items", "Are you sure you want to delete the selected items?", "submitButton", "delete");
		}
	})
	$('.btn-show-messbox').on('click', function(){
		messageBox('INFO', 'TEST SUCCESS', 'its work :) ')
	})
	
});

function checkInputFile() {
	let flag = true;
	if ($('#check_empty_image').val() == '') {
		let getInputFile = $('.input-file.required');
		getInputFile.each(function(){
			let targetInput = $(this);
			if (targetInput.val() == '') {
				flag = false;
				targetInput.parent().find('.drop-zone').addClass('error');
			}
		});
	}

	return flag;
}

function checkInputText() {
	let flag = true;
	let getAllInput = $('.custom-input.required');
	getAllInput.each(function(){
		let targetInput = $(this);
		if (targetInput.val() == '') {
			flag = false;
			targetInput.addClass('error');
			targetInput.parent().find('.input-error').removeClass('d-none');
		}
	});

	return flag;
}

function checkBeforeSubmit() {
	let flag = false;
	let flagText = checkInputText();
	let flagFile = checkInputFile();
	if (flagText == true && flagFile == true) {
		flag = true;
	}
	return flag;
}

function itemTask(id, task)
{
	let checkbox = document.querySelector('#cb'+id);
	let getAllCheckBox = $('.checkbox-manage-content');
	getAllCheckBox.prop('checked', false);
	checkbox.checked = true;
	submitButton(task);
}
/**
 * Default function.  Usually would be overriden by the component
 */
function submitButton(pressButton, formAction) // save, undefined
{
	submitForm(pressButton, formAction);
}

/**
 * Submit the admin form
 */
function submitForm(pressButton, formAction)
{
	if (pressButton) {
		document.adminForm.task.value=pressButton;
	}
	if (formAction) {
		document.adminForm.action = formAction;
	}
	if (typeof document.adminForm.onsubmit == "function") {
		document.adminForm.onsubmit();
	}
	let submit = checkBeforeSubmit();
	if (submit) {
		document.adminForm.submit();
	}
	else {
		messageBox('ERROR', 'Input required', 'Please fill in all field required.');
	}
}