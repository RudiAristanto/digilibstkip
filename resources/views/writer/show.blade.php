@include('layout.header')
        <h3 class="judul-h3">Detail Penulis</h3>
        <table class="custom_tabel">
            <tbody>
                    <tr>
                        <td width="130px" class="px-4 py-2">Nama Writer</td>
                        <td width="2px" class="px-4 py-2">:</td>
                        <td class="px-4 py-2">{{ $writer->nama_writer }}</td>
                    </tr>
            </tbody>
        </table>
@include('layout.footer')