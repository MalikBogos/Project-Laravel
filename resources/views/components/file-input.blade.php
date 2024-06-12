<!-- file-input.blade.php -->

@props(['name'])

<input type="file" {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}">
