@extends('layouts.app')

@section('title', 'Data Hewan yang Dititipkan')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Data Hewan yang Dititipkan</h2>

    @if ($message = Session::get('success'))
        <div class="bg-green-300 text-green-800 p-2 mt-4 rounded">
            {{ $message }}
        </div>
    @endif

    <table class="w-full mt-4 border border-gray-300">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Jenis</th>
                <th class="border px-4 py-2">Durasi (Hari)</th>
                <th class="border px-4 py-2">Catatan</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <td class="border px-4 py-2">{{ $pet->name }}</td>
                    <td class="border px-4 py-2">{{ $pet->type }}</td>
                    <td class="border px-4 py-2">{{ $pet->duration }}</td>
                    <td class="border px-4 py-2">{{ $pet->notes }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('pets.edit', $pet->id) }}" class="bg-yellow-500 text-white py-1 px-4 rounded">Edit</a>
                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-1 px-4 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol Cetak PDF -->
    <button onclick="window.print()" class="bg-green-600 text-white py-2 px-4 rounded mt-4">Cetak ke PDF</button>
@endsection
