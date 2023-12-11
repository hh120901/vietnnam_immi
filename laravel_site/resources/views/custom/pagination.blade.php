@if ($paginator->hasPages())
	<div class="todc-pagination d-flex">
		<div class="">Page: </div>
		@foreach ($elements as $element)
			@if (is_string($element))
				<span>{{ $element }}</span>
			@endif
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<div class="page-item px-2 active" aria-current="page"><span class="page-link">{{ $page }}</span></div>
					@else
						<div class="page-item px-2"><a class="page-link" href="{{ $url }}">{{ $page }}</a></div>
					@endif
				@endforeach
			@endif
		@endforeach
		@if ($paginator->onFirstPage())
			<div class="page-item px-2 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
				<span class="page-link" aria-hidden="true">Back</span>
			</div>
		@else
			<div class="page-item px-2">
				<a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Back</a>
			</div>
		@endif
		 {{-- Nút "Next" --}}
		@if ($paginator->hasMorePages())
			<div class="page-item px-2">
				<a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
			</div>
		@else
			<div class="page-item px-2 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
				<span class="page-link" aria-hidden="true">Next</span>
			</div>
		@endif
	</div>
@endif