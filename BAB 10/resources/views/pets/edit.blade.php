@extends('layouts.app')

@section('content')
<form method="POST" action="{{ isset($pet) ? route('pets.update', $pet->id) : route('pets.store') }}">
    @csrf
    @isset($pet)
        @method('PUT')
    @endisset
    <input type="text" name="name" value="{{ $pet->name ?? '' }}" placeholder="Nama Hewan" class="p-2 border rounded" required>
    <input type="text" name="type" value="{{ $pet->type ?? '' }}" placeholder="Jenis Hewan" class="p-2 border rounded" required>
    <input type="number" name="duration" value="{{ $pet->duration ?? '' }}" placeholder="Durasi" class="p-2 border rounded" required>
    <textarea name="notes" placeholder="Catatan" class="p-2 border rounded">{{ $pet->notes ?? '' }}</textarea>
    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">
        {{ isset($pet) ? 'Simpan Perubahan' : 'Tambah Hewan' }}
    </button>
</form>
@endsection
