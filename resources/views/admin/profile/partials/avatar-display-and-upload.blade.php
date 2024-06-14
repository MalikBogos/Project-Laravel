<!-- avatar-display-and-upload.blade.php -->

<!-- Display Avatar -->
<div class="flex items-center">
    @if(Auth::user()->avatar)
        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar" class="rounded-full h-20 w-20 object-cover">
    @else
        <!-- Default Avatar Image -->
        <img src="{{ asset('avatars/default_avatar.png') }}" alt="Default Avatar" class="rounded-full h-20 w-20 object-cover">
    @endif
</div>

<!-- Upload Avatar Form -->
<form method="post" action="{{ url('/profile/avatar-upload') }}" enctype="multipart/form-data" class="mt-4">
    @csrf

    <div>
        <x-input-label for="avatar" :value="__('Avatar')" />
        <x-file-input id="avatar" name="avatar" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
    </div>

    <div class="flex items-center gap-4 mt-4">
        <x-primary-button>{{ __('Upload Avatar') }}</x-primary-button>
    </div>
</form>

<!-- Reset Avatar Form -->
<form method="post" action="{{ url('/profile/avatar-reset') }}" class="mt-4">
    @csrf
    @method('DELETE')

    <div class="flex items-center gap-4">
        <x-secondary-button type="submit">{{ __('Reset to Default Avatar') }}</x-secondary-button>
    </div>
</form>
