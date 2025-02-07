<section class="h-screen flex items-center justify-center">


    <div id="searchModal"
        class="fixed inset-0 z-10 flex flex-col items-center justify-end overflow-y-auto bg-gray-600 bg-opacity-50 sm:justify-start"
        x-data="{ modal: false }" x-show="modal"
        x-on:modal-overlay.window="if ($event.detail.id == 'modal-example') modal=true"
        x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="w-full px-2 my-20 transition-all transform sm:max-w-2xl" role="dialog" aria-modal="true"
            aria-labelledby="modal-headline" x-show="modal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4" x-on:click.away="modal=false">
            <div class="bg-white rounded-sm shadow-sm">
                <p>Modal Content</p>
                <p>Modal Content</p>
                <p>Modal Content</p>
                <p>Modal Content</p>
                <p>Modal
            </div>
        </div>
    </div>

</section>
