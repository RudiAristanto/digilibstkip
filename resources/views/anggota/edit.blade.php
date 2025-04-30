@include('layout.header')
        <h3 class="judul-h3">Edit Anggota</h3>
        <form action="{{route('anggota.update', $anggota->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Nama anggota</label>
                <input type="text" value="{{ $anggota->user->name ?? '-' }}" readonly class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded">
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Alamat</label>
                <input type="text" name="alamat" id="" value="{{$anggota->alamat}}" placeholder="Masukkan Alamat" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Nomor Telepon</label>
                <input type="text" name="nomor_tlp" id="" value="{{$anggota->nomor_tlp}}" placeholder="Masukkan Nomor Telepon" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="tombol-biru">Update</button>
        </form>
@include('layout.footer')