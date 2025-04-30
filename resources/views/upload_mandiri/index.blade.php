@include('layout.header')
<h3 class="judul-h3">Dokumen Saya</h3>

<table class="custom_tabel w-full">
    <thead>
        <tr>
            <th class="custom_td px-4 py-2">Judul</th>
            <th class="custom_td px-4 py-2">Tahun</th>
            <th class="custom_td px-4 py-2">Tanggal Unggah</th>
            <th class="custom_td px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($documents as $doc)
        <tr>
            <td class="custom_td px-4 py-2">{{ $doc->judul }}</td>
            <td class="custom_td px-4 py-2">{{ $doc->tahun }}</td>
            <td class="custom_td px-4 py-2">{{ $doc->tanggal_unggah ?? '-' }}</td>
            <td class="custom_td px-4 py-2 " width="200px">
                <a href="{{ route('document.show', $doc->id) }}" class="tombol-hijau">Detail</a>
                <a href="{{ asset('storage/'.$doc->upload) }}" target="_blank" class="tombol-biru">Lihat</a>
                <a href="{{ route('document.edit', $doc->id) }}" class="tombol-orange">Edit</a>
                {{-- Tambah aksi edit/hapus jika diperlukan --}}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center py-4">Belum ada dokumen</td>
        </tr>
        @endforelse
    </tbody>
</table>
@include('layout.footer')