@extends('frontend.master')

@section('content')
     <!-- hero section -->
      <section style="background-image: url('/images/hero.png');" class="relative bg-cover bg-center text-white py-12">
      <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
      <div class="relative container max-w-6xl mx-auto text-center">
            <img src="{{url('/images/logo.png')}}" class="center animate-logo" alt="Image"/>
            <h1 class="text-4xl font-bold mb-4 animate-text">Institutional Repository</h1>
            <p class="text-lg animate-text">STKIP PGRI Ponorogo</p>
        </div>
      </section>

      <!-- section filter dan pencarian -->
       <section class="container max-w-6xl mx-auto py-6">
            <form action="{{route('homepage')}}" method="get" class="flex flex-wrap gap-4 items-center">
                <select name="kategori" class="p-2 border rounded bg-gray-200">
                    <option value="">Semua kategori</option>
                    @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                    @endforeach
                </select>

                <input type="text" name="search" class="p-2 border rounded flex-1" placeholder="masukkan kata kunci"
                value="{{request('search')}}">
                <button type="submit" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-yellow-500 transition duration-200">Terapkan</button>
            </form>
       </section>
      
      <!-- section catalog -->
      <section class="container max-w-6xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
            @foreach($document as $d)
            <div class="bg-white shadow-lg p-6 flex rounded-lg items-center space-x-4 py-6">
                <div>
                    <h2 class="text-lg font-semibold text-green-700 hover:text-yellow-500 transition duration-200"><a href="{{route('detail-dokumen', $d->id)}}">{{$d->judul}}</a></h2>
                    <p class="text-gray-600 text-sm py-2">{{ \Illuminate\Support\Str::limit($d->abstrak, 450, '...') }}</p>
                    <p class="text-gray-600 text-sm">Tahun: {{$d->tahun}}</p>
                    
                        <span class="material-icons">person</span>
                        <span>{{$d->nama_penulis}}</span>
                    
                    <td>
                        <span class="material-icons">book</span>
                        <span>{{$d->kategori->nama_kategori}}</span>
                    </td>
                    <td>
                        <span class="material-icons">event</span>
                        <span>{{$d->tahun}}</span>
                    </td>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 py-5">{{$document->links()}}</div>
      </section>
@endsection