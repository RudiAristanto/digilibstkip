@include('layout.header')
        <h3 class="judul-h3">Tambah Anggota</h3>
        <form action="{{route('anggota.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-2">Nama</label>
                <input type="text" name="name" placeholder="Masukkan Nama Lengkap" class="w-full px-3 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-2">Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" class="w-full px-3 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-2">Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" class="w-full px-3 py-2 border border-gray-300 rounded " required>
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Alamat</label>
                <input type="text" name="alamat" id="" placeholder="Masukkan Alamat" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Nomor Telepon</label>
                <input type="text" name="nomor_tlp" id="" placeholder="Masukkan Nomor Telepon" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="tombol-biru">Submit</button>
        </form>
@include('layout.footer')