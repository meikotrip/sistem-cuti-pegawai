<section>
    <header>
        <h2 class="text-lg font-semibold text-gray-900 mb-5">
            {{ __('User Division') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('admin.user.addUserDivision', $user['id']) }}">
        @csrf

        <x-text-input id="idUser" name="idUser" value="{{ $user['id'] }}" type="hidden" class="mt-1 block w-full" />

        @if (!empty($user_division) && isset($user_division[0]['idUser']) && $user_division[0]['idUser'] === $user['id'])
            <div>
                <x-input-label for="idDivisi" :value="__('Divisi')" />
                <select id="idDivisi" name="idDivisi" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required autofocus>
                    <option value="" disabled selected>Pilih Divisi</option>
                    <option value="1" {{ $user_division[0]['idDivisi'] === 1 ? 'selected' : '' }}>Redaksi</option>
                    <option value="2" {{ $user_division[0]['idDivisi'] === 2 ? 'selected' : '' }}>IT</option>
                    <option value="3" {{ $user_division[0]['idDivisi'] === 3 ? 'selected' : '' }}>Iklan</option>
                    <option value="4" {{ $user_division[0]['idDivisi'] === 4 ? 'selected' : '' }}>Keuangan</option>
                    <option value="5" {{ $user_division[0]['idDivisi'] === 5 ? 'selected' : '' }}>Video Editor</option>
                </select>
                <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
            </div>
        @else
        <div>
            <x-input-label for="idDivisi" :value="__('Divisi')" />
            <select id="idDivisi" name="idDivisi" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required autofocus>
                <option value="" disabled selected>Pilih Divisi</option>
                <option value="1">Redaksi</option>
                <option value="2">IT</option>
                <option value="3">Iklan</option>
                <option value="4">Keuangan</option>
                <option value="5">Video Editor</option>
            </select>
            <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
        </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Tambah') }}
            </x-primary-button>
        </div>
    </form>
</section>
