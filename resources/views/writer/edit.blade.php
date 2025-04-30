@include('layout.header')
        <h3 class="judul-h3">Buat Penulis</h3>
        <form action="{{route('writer.update', $writer->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Nama Penulis</label>
                <input type="text" name="nama_writer" id="" value="{{$writer->nama_writer}}" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="tombol-biru">Update</button>
        </form>
@include('layout.footer')