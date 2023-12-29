<section>
    <form method="POST" action="{{ route('user.edit', $user['id']) }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user['name']" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required autofocus>
                <option value="karyawan" {{ $user['role'] === 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                <option value="kadepartemen" {{ $user['role'] === 'kadepartemen' ? 'selected' : '' }}>Ketua Departemen</option>
                <option value="kahrd" {{ $user['role'] === 'kahrd' ? 'selected' : '' }}>Ketua HRD</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user['email']" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Edit') }}
            </x-primary-button>
        </div>
    </form>
</section>
