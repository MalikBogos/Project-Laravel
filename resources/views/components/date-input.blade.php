<!-- views/components/date-input.blade.php -->

<div>
    <x-input-label :for="$id" :value="$attributes['label']" />

    <input type="date" id="{{ $id }}" name="{{ $name }}" class="{{ $class }}" value="{{ $value }}"
           {{ $attributes->merge(['class' => 'mt-1 block w-full', 'max' => '2012-12-31']) }} autocomplete="off">

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>

