@extends('frontend.master')

@section('title', 'Detail Dokumen')

@section('content')

      <!-- section detail Dokumen -->
       <section class="container max-w-6xl mx-auto py-6">
       <!-- <div class="bg-white shadow-lg p-6 flex rounded-lg items-center space-x-4 py-6">
                <div>
                    <h2 class="text-lg font-semibold text-green-700">{{$document->judul}}</h2>
                    <p class="text-gray-600 text-sm py-2">{{$document->abstrak}}</p>
    
                    <p class="text-gray-600 text-sm">Tahun: {{$document->tahun}}</p>
                    <p class="text-gray-600 text-sm">Kategori: {{$document->kategori->nama_kategori}}</p>

                    <a href="{{route('homepage')}}" class="mt-6 inline-block bg-green-800
                    text-white px-4 py-2 rounded-lg hover:bg-yellow-500">Kembali ke Homepage</a>
                </div>
            </div> -->
        <table class="custom_tabel">
            <tbody>
                    <tr>
                        <td width="130px" class="custom_td px-4 py-2">Judul</td>
                        <td width="2px" class="custom_td px-4 py-2">:</td>
                        <td class="text-lg font-semibold text-green-700 px-4 py-2">{{ $document->judul }}</td>
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
                        <td class="custom_td px-4 py-2">Dokumen</td>
                        <td class="custom_td px-4 py-2">:</td>
                        @if($document->upload)
                        @auth
                            <td class="custom_td px-4 py-2">
                                <a href="{{ asset('storage/'.$document->upload) }}">
                                    <button class="tombol-biru" type="button">Download</button>
                                </a>
                            </td>
                            @else
                            <td class="custom_td px-4 py-2 text-red-500">
                                Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk mengunduh dokumen.
                            </td>
                            @endauth
                        @endif
                    </tr>
            </tbody>
        </table>
      </section>
@endsection