@include('layout.header')
        <h3 class="judul-h3">Anggota</h3>
        <a href="{{ route('anggota.create') }}" class="tombol-biru">Tambah</a>
        <table class="custom_tabel">
            <thead>
                <tr class="bg-gray-100">
                    <th class="custom_th">No.</th>
                    <th class="custom_th">Nama Anggota</th>
                    <th class="custom_th">Alamat</th>
                    <th class="custom_th">Nomor Telepon</th>
                    <th width="210px" class="custom_th">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allAnggota as $key => $r)
                    <tr>
                        <td class="custom_td">{{ $key + 1 }}</td>
                        <td class="custom_td">{{ $r->user->name ?? '-' }}</td>
                        <td class="custom_td">{{ $r->alamat }}</td>
                        <td class="custom_td">{{ $r->nomor_tlp }}</td>
                        <td class="custom_td">
                            <form action="{{ route('anggota.destroy', $r->id) }}" method="POST">
                                <a href="{{ route('anggota.show', $r->id) }}" class="tombol-hijau">Detail</a>
                                <a href="{{ route('anggota.edit', $r->id) }}" class="tombol-orange">Edit</a>
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