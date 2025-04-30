@include('layout.header')
        <h3 class="judul-h3">Dokumen</h3>
        <div style="display: flex; justify-content: space-between;align-items:center;">
            <a href="{{ route('document.create') }}" class="tombol-biru">Tambah</a>
            <form action="{{route('document.index')}}" method="get" class="flex items-center">
                <input type="text" name="q" id="" placeholder="Cari Dokumen" class="w-full px-3 py-1 border border-gray-300 rounded">
                <button type="submit" class="tombol-biru ml-2">Cari</button>
            </form>
        </div>
        
        <table class="custom_tabel">
            <thead>
                <tr class="bg-gray-100">
                    <th class="custom_th">No.</th>
                    <th class="custom_th">Judul</th>
                    <!-- <th>Abstrak</th> -->
                    <th class="custom_th">Kategori</th>
                    <th class="custom_th">Tahun</th>
                    <th class="custom_th">Penulis</th>
                    <th width="170px" class="custom_th">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDocument as $key => $r)
                    <tr>
                        <td class="custom_td">{{ $key + $allDocument->firstItem() }}</td>
                        <td class="custom_td">{{ $r->judul }}</td>
                        <!-- <td>{{ $r->abstrak }}</td> -->
                        <td class="custom_td">{{ $r->kategori->nama_kategori }}</td>
                        <td class="custom_td">{{ $r->tahun }}</td>
                        <td class="custom_td">{{ $r->nama_penulis }}</td>
                        <td class="custom_td" width="220px">
                            <form action="{{ route('document.destroy', $r->id) }}" method="POST">
                                <a href="{{ route('document.show', $r->id) }}" class="tombol-hijau">Detail</a>
                                <a href="{{ route('document.edit', $r->id) }}" class="tombol-orange">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tombol-merah">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            <!-- {{ $allDocument->links('vendor.pagination.buatanku')}} -->
            {{ $allDocument->links('')}}
        </div>
@include('layout.footer')