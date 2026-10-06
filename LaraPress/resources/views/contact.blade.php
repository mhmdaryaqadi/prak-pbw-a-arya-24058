<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <h3 class="font-bold text-lg text-gray-800">Kontak Kami</h3>
                    
                    <p>
                        Silahkan hubungi kami melalui telepon di: <strong>08123456789</strong>
                    </p>

                    <p class="text-sm text-gray-600">
                        Jam operasional layanan kami adalah Senin - Jumat, 09:00 - 17:00 WIB.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
