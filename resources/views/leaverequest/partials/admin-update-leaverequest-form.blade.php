<section>
    <form method="post" action="{{ route('admin.leave-request.edit', $data['idLR']) }}" class="space-y-6">
        @csrf
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" value="{{ $data['name'] }}" class="mt-1 block w-full" readonly required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="idDivisi" :value="__('Divisi')" />
                <select id="idDivisi" name="idDivisi" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" autofocus>
                    <option value="1" {{ $data['idDivisi'] === 1 ? 'selected' : '' }}>Redaksi</option>
                    <option value="2" {{ $data['idDivisi'] === 2 ? 'selected' : '' }}>IT</option>
                    <option value="3" {{ $data['idDivisi'] === 3 ? 'selected' : '' }} >Iklan</option>
                    <option value="4" {{ $data['idDivisi'] === 4 ? 'selected' : '' }} >Keuangan</option>
                    <option value="5" {{ $data['idDivisi'] === 5 ? 'selected' : '' }} >Video Editor</option>
                </select>
                <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="tanggalMulai" :value="__('Tanggal Mulai')" />
                <x-text-input id="tanggalMulai" name="tanggalMulai" type="date" value="{{ $data['tanggalMulai'] }}" class="mt-1 block w-full"/>
                <x-input-error :messages="$errors->get('tanggalMulai')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="tanggalAkhir" :value="__('Tanggal Akhir')" />
                <x-text-input id="tanggalAkhir" name="tanggalAkhir" type="date" value="{{ $data['tanggalAkhir'] }}" class="mt-1 block w-full"/>
                <x-input-error :messages="$errors->get('tanggalAkhir')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="alamat" :value="__('Alamat')" />
                <textarea id="alamat" name="alamat" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ $data['alamat'] }}</textarea>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="alasanCuti" :value="__('Alasan Cuti')" />
                <textarea id="alasanCuti" name="alasanCuti" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ $data['alasanCuti'] }}</textarea>
                <x-input-error :messages="$errors->get('alasanCuti')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="isAcceptedKadepartemen" :value="__('Verifikasi Ketua Departemen')" />
                <select id="isAcceptedKadepartemen" name="isAcceptedKadepartemen" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" autofocus>
                    <option value="pending" {{ $data['isAcceptedKadepartemen'] === "pending" ? 'selected' : '' }}>Pending</option>
                    <option value="accepted" {{ $data['isAcceptedKadepartemen'] === "accepted" ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $data['isAcceptedKadepartemen'] === "rejected" ? 'selected' : '' }} >Rejected</option>
                </select>
                <x-input-error :messages="$errors->get('isAcceptedKadepartemen')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="isAcceptedKahrd" :value="__('Verifikasi Ketua HRD')" />
                <select id="isAcceptedKahrd" name="isAcceptedKahrd" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" autofocus>
                    <option value="pending" {{ $data['isAcceptedKahrd'] === "pending" ? 'selected' : '' }}>Pending</option>
                    <option value="accepted" {{ $data['isAcceptedKahrd'] === "accepted" ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $data['isAcceptedKahrd'] === "rejected" ? 'selected' : '' }} >Rejected</option>
                </select>
                <x-input-error :messages="$errors->get('isAcceptedKahrd')" class="mt-2" />
            </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="submit-btn">{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</section>
