<section>
    <form method="post" action="{{ route('leave-request.store') }}" class="space-y-6">
        @csrf

        <x-text-input id="idUser" name="idUser" value="{{ Auth::user()->id }}" type="hidden" class="mt-1 block w-full" />

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" name="name" type="text" value="{{ Auth::user()->name }}" class="mt-1 block w-full" readonly required/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="idDivisi" :value="__('Divisi')" />
            <select id="idDivisi" name="idDivisi" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required autofocus>
                <option value="1">Redaksi</option>
                <option value="2">IT</option>
                <option value="3" >Iklan</option>
                <option value="4" >Keuangan</option>
                <option value="5" >Video Editor</option>
            </select>
            <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tanggalMulai" :value="__('Tanggal Mulai')" />
            <x-text-input id="tanggalMulai" name="tanggalMulai" type="date" value="{{ old('tanggalMulai') }}" class="mt-1 block w-full" required/>
            <x-input-error :messages="$errors->get('tanggalMulai')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tanggalAkhir" :value="__('Tanggal Akhir')" />
            <x-text-input id="tanggalAkhir" name="tanggalAkhir" type="date" value="{{ old('tanggalAkhir') }}" class="mt-1 block w-full" required/>
            <x-input-error :messages="$errors->get('tanggalAkhir')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" name="alamat" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="alasanCuti" :value="__('Alasan Cuti')" />
            <textarea id="alasanCuti" name="alasanCuti" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>{{ old('alasanCuti') }}</textarea>
            <x-input-error :messages="$errors->get('alasanCuti')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="submit-btn">{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</section>
