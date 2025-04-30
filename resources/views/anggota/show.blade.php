@include('layout.header')
        
        <div class="flex items-center justify-between">
            <h3 class="judul-h3">Detail Angota</h3>
            <a href="{{route('anggota.index')}}" class="tombol-abu">Kembali</a> 
        </div>
        <table class="custom_tabel">
            <tbody>
                    <tr>
                        <td width="150px" class="px-4 py-2">Nama Anggota</td>
                        <td width="2px" class="px-4 py-2">:</td>
                        <td class="px-4 py-2">{{ $anggota->user->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Alamat</td>
                        <td class="px-4 py-2">:</td>
                        <td class="px-4 py-2">{{ $anggota->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Nomor Telepon</td>
                        <td class="px-4 py-2">:</td>
                        <td class="px-4 py-2">{{ $anggota->nomor_tlp }}</td>
                    </tr>
            </tbody>
        </table>
@include('layout.footer')