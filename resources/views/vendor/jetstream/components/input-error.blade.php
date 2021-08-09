@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 bg-red-100']) }}>{{ $message }}</p>
@enderror
