@include('layout.header')
        <h3 class="judul-h3">Buat Penulis</h3>
        <form action="{{route('writer.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Nama Penulis</label>
                <input type="text" name="nama_writer" id="" placeholder="Masukkan Nama Penulis" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="tombol-biru">Submit</button>
        </form>
@include('layout.footer')