@include('layout.header')
        <h3 class="judul-h3">Penulis</h3>
        <a href="{{ route('writer.create') }}" class="tombol-biru">Tambah</a>
        <table class="custom_tabel">
            <thead>
                <tr class="bg-gray-100">
                    <th class="custom_th">No.</th>
                    <th class="custom_th">Nama Penulis</th>
                    <th class="custom_th">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allWriter as $key => $r)
                    <tr>
                        <td class="custom_td">{{ $key + 1 }}</td>
                        <td class="custom_td">{{ $r->nama_writer }}</td>
                        <td class="custom_td">
                            <form action="{{ route('writer.destroy', $r->id) }}" method="POST">
                                <a href="{{ route('writer.show', $r->id) }}" class="tombol-hijau">Detail</a>
                                <a href="{{ route('writer.edit', $r->id) }}" class="tombol-orange">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tombol-merah">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@include('layout.footer')