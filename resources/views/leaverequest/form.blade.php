<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $id &&  auth()->user()->isAdmin() != "" ? __('Edit Data Leave Request') :__('Leave Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($id && auth()->check() && auth()->user()->isAdmin())
                        @include('leaverequest.partials.admin-update-leaverequest-form')
                    @elseif ($id && auth()->check() && auth()->user()->isKadepartemen())
                        @include('leaverequest.partials.kadepartemen-update-leaverequest-form')
                    @elseif ($id && auth()->check() && auth()->user()->isKahrd())
                        @include('leaverequest.partials.kahrd-update-leaverequest-form')
                    @elseif ($id && auth()->check() && auth()->user()->isKaryawan())
                        @include('leaverequest.partials.detail-form')
                    @else
                        @include('leaverequest.partials.insert-form')
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <script src="{{ asset('assets/js/registrationForm.js') }}"></script> --}}
