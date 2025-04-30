@include('layout.header')
        <h3 class="judul-h3">Detail Dokumen</h3>
        <table class="custom_tabel">
            <tbody>
                    <tr>
                        <td width="130px" class="custom_td px-4 py-2">Judul</td>
                        <td width="2px" class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->judul }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Abstrak</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->abstrak }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Tahun</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->tahun }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Penulis</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->nama_penulis }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Kategori</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->kategori->nama_kategori }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Program Studi</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->program_studi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Volume</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->volume ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Nomor</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->nomor ?? '-' }}</td>
                    </tr>
                    <tr>
    <td class="custom_td px-4 py-2">Link Journal</td>
    <td class="custom_td px-4 py-2">:</td>
    <td class="custom_td px-4 py-2">
        @if($document->link_journal)
            @php
                $link = Str::startsWith($document->link_journal, ['http://', 'https://'])
                    ? $document->link_journal
                    : 'https://' . $document->link_journal;
            @endphp
            <a href="{{ $link }}" target="_blank" class="text-blue-600 underline">
                {{ $link }}
            </a>
        @else
            -
        @endif
    </td>
</tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Tanggal Unggah</td>
                        <td class="custom_td px-4 py-2">:</td>
                        <td class="custom_td px-4 py-2">{{ $document->tanggal_unggah ? \Carbon\Carbon::parse($document->tanggal_unggah)->format('d M Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="custom_td px-4 py-2">Dokumen</td>
                        <td class="custom_td px-4 py-2">:</td>
                        @if($document->upload)
                        <!-- <td>{{ asset('storage/'.$document->upload) }}</td> -->
                         <td class="custom_td px-4 py-2"><a href="{{ asset('storage/'.$document->upload) }}">
                            <button class="tombol-biru" type="button">Download</button></a></td>
                        @endif
                    </tr>
            </tbody>
        </table>
@include('layout.footer')