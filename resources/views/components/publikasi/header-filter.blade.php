<section class="pt-8 pb-6 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-primary tracking-tight font-headline">
                Publikasi & Pengembangan Kompetensi
            </h1>
            <p class="mt-2 text-sm sm:text-base text-on-surface-variant leading-relaxed">
                Karya tulis ilmiah, prosiding, pedoman strategis, dan repositori literasi kebijakan publik INAKI untuk memperkuat <span class="text-on-surface font-semibold">evidence-based policy</span> di Indonesia.
            </p>
        </div>

        <!-- Filter Tab Buttons with Alpine.js -->
        <div class="mt-6 flex flex-wrap items-center gap-2 border-b border-outline-variant/30 pb-3">
            <button @click="category = 'semua'"
                    :class="category === 'semua' ? 'bg-primary text-white shadow-xs' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all">
                Semua Publikasi
            </button>
            <button @click="category = 'prosiding'"
                    :class="category === 'prosiding' ? 'bg-primary text-white shadow-xs' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all">
                Buku Prosiding
            </button>
            <button @click="category = 'pedoman'"
                    :class="category === 'pedoman' ? 'bg-primary text-white shadow-xs' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all">
                Buku Pedoman
            </button>
            <button @click="category = 'policy-brief'"
                    :class="category === 'policy-brief' ? 'bg-primary text-white shadow-xs' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all">
                Policy Brief
            </button>
            <button @click="category = 'regulasi'"
                    :class="category === 'regulasi' ? 'bg-primary text-white shadow-xs' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[15px]">gavel</span>
                <span>Regulasi & AD/ART</span>
            </button>
            <button @click="category = 'repository'"
                    :class="category === 'repository' ? 'bg-primary text-white shadow-xs' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all">
                Repositori Ilmiah
            </button>
        </div>
    </div>
</section>