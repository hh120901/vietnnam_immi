<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="{{ asset('assets/js/todc.js') }}"></script>
@vite('resources/js/app.js')

<script>
	$(document).ready(function() {
		@if ($message = Session::get('success'))
		messageBox("SUCCESS", "Success", '{{ $message }}');
		@endif
		
		@if ($message = Session::get('info'))
		messageBox("INFO", "Information", '{{ $message }}');
		@endif
		
		@if ($message = Session::get('warning'))
		messageBox("WARNING", "Warning", '{{ $message }}');
		@endif
		
		@if ($message = Session::get('error'))
		messageBox("ERROR", "Error", '{{ $message }}');
		@endif
		
		@if ($errors->any())
		messageBox("ERROR", "Error", @json($errors->all()));
		@endif
	});
</script>
<!-- Initialize Swiper -->
<script>
	// Tooltip
	//$(document).ready(function () {
	//	$('[data-toggle="tooltip"]').tooltip();
	//});

	// drop-zone
	var dropZone = $('.drop-zone');
	var inputField = $('.input-file')
	dropZone.on('click', function(){
		$('.input-file').trigger('click');
	})
	inputField.on('change', function(){
		var files = $(this).prop('files');
		var fileName = $(this).val().split('\\').pop();
		if (fileName != '') {
			$(".file-name").text("Upload file completed: " + fileName);
			let extend = getExtension(fileName);
			let previewImg = $('.previewImage');
			if (previewImg.length !== 0) {
				var imageUrl = URL.createObjectURL(files[0]);
				previewImg.attr('src', imageUrl);
				previewImg.removeClass('d-none');
			}
		} else {
			$(".file-name").text("");
		}
	}) 

	dropZone.on('dragover', function (e) {
		e.preventDefault();
		$(this).addClass('drag-over');
	});

	dropZone.on('dragleave', function (e) {
		e.preventDefault();
		$(this).removeClass('drag-over');
	});

	dropZone.on('drop', function (e) {
		e.preventDefault();
		$(this).removeClass('drag-over');
		var files = e.originalEvent.dataTransfer.files;
		inputField.prop('files', files);
		var fileName = files[0].name;
		$(".file-name").text("Upload file completed: " + fileName);
		let previewImg = $('.previewImage');
		if (previewImg.length !== 0) {
			var imageUrl = URL.createObjectURL(files[0]);
			previewImg.attr('src', imageUrl);
			previewImg.removeClass('d-none');
		}
	});
	function getExtension(fileName) {
		console.log(fileName);
		return fileName.split('.').pop();
	}

</script>