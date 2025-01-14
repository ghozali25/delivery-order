@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center gap-[1vw]">

    <p>
        <span>{!! __('Menampilkan') !!}</span>
        <span class="text-stone-800">{!! '<b>'.($paginator->firstItem() ?? '0').'</b>' !!}</span>
        <span>{!! __('-') !!}</span>
        <span class="text-stone-800">{!! '<b>'.($paginator->lastItem() ?? '0').'</b>' !!}</span>
        <span>{!! __('dari') !!}</span>
        <span class="text-stone-800">{!! '<b>'.$paginator->total().'</b>' !!}</span>
        <span>{!! __('data') !!}</span>
    </p>

    <span class="flex items-center gap-2">
        <span>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <button type='button' class="btn-stone" aria-hidden="true" disabled>
                        <i class='bi-chevron-left'></i>
                    </button>
                </span>
            @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="prev" class="btn-stone" aria-label="{{ __('pagination.previous') }}">
                    <i class='bi-chevron-left'></i>
                </button>
            @endif
        </span>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <button type='button' class="btn-ghost-stone" disabled>{{ $element }}</button>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <button type='button' class="btn-stone" disabled>{{ $page }}</button>
                            </span>
                        @else
                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="btn-ghost-stone" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </button>
                        @endif
                    </span>
                @endforeach
            @endif
        @endforeach

        <span>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="next" class="btn-stone" aria-label="{{ __('pagination.next') }}">
                    <i class='bi-chevron-right'></i>
                </button>
            @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <button type='button' class="btn-stone" aria-hidden="true" disabled>
                        <i class='bi-chevron-right'></i>
                    </button>
                </span>
            @endif
        </span>
    </span>

</nav>
