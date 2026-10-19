@props([
    'items' => [],
    'badge' => null,
    'sticky' => true,
])

<div class="w-full bg-[#F1F5F9]/95 backdrop-blur-md border-b border-[#E2E8F0] py-2.5 px-4 sm:px-6 lg:px-12 {{ $sticky ? 'sticky top-[118px] z-40 shadow-xs' : '' }} transition-all">
    <div class="max-w-7xl mx-auto flex items-center justify-between text-xs text-[#64748B]">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="Breadcrumb" class="flex items-center gap-1.5 flex-wrap">
            <a href="{{ url('/') }}" class="hover:text-[#2563EB] transition-colors flex items-center gap-1 font-medium">
                <span class="material-symbols-outlined text-[15px]">home</span>
                <span>Beranda</span>
            </a>
            @foreach($items as $item)
                <span class="material-symbols-outlined text-[14px] text-[#94A3B8] select-none">chevron_right</span>
                @if(!empty($item['url']) && !$loop->last)
                    <a href="{{ $item['url'] }}" class="hover:text-[#2563EB] transition-colors font-medium">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span class="text-[#2563EB] font-semibold">{{ $item['label'] }}</span>
                @endif
            @endforeach
        </nav>

        <!-- Status / Info Badge -->
        @if($badge)
            <div class="hidden sm:flex items-center gap-2 text-xs font-medium">
                <span class="w-2 h-2 rounded-full bg-[#16A34A] animate-pulse"></span>
                <span class="text-[#15803D]">{{ $badge }}</span>
            </div>
        @endif
    </div>
</div>
