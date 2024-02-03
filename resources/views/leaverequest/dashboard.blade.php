<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leave Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (auth()->check() && auth()->user()->isKaryawan())
                <div class="flex flex-row">
                    <h2 class="text-xl font-bold pr-2 py-2">Tambah Data</h2>
                    <a href="{{ route('leave-request.form') }}" class="inline-flex items-center px-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 text-lg">+</a>
                </div>
                @endif
                <div class="mt-4">
                    @include('leaverequest.partials.table-leaverequest')
                </div>
            </div>
            @if (auth()->check() && auth()->user()->isKahrd())
                <a href="{{ route("kahrd.leave-request.download") }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Download Report</a>
            @elseif (auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route("admin.leave-request.download") }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Download Report</a>
            @endif
        </div>
    </div>

</x-app-layout>
