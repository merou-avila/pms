@if ($paginator->hasPages())
    <div class="mt-4 d-flex align-items-center">
        <div class="flex-fill">
            <strong>
                Page {{ $paginator->currentPage() }} or {{ $paginator->lastPage() }}
            </strong>
        </div>
        <div class="pl-3">
            <div class="btn-group shadow-sm rounded" role="group" aria-label="Basic example">
                @if ($paginator->onFirstPage())
                    <button type="button" class="btn border text-secondary px-2" disabled>
                        <i class="fa fa-chevron-left fa-fw"></i>
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn border bg-white text-body px-2">
                        <i class="fa fa-chevron-left fa-fw"></i>
                    </a>
                @endif
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn border bg-white text-body px-2">
                        <i class="fa fa-chevron-right fa-fw"></i>
                    </a>
                @else
                    <button type="button" class="btn border text-secondary px-2" disabled>
                        <i class="fa fa-chevron-right fa-fw"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif
