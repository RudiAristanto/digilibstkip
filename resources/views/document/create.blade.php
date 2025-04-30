@include('layout.header')
        <h3 class="judul-h3">Buat Dokumen</h3>
        <form action="{{route('document.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="block font-bold mb-2">Judul</label>
                <input type="text" name="judul" id="" placeholder="Masukkan Judul" class="input-biasa">
            </div>
            <div class="mb-3">
                <label for="" class="block font-bold mb-2">Abstrak</label>
                <textarea type="text" name="abstrak" id="" placeholder="Masukkan Abstrak" class="input-biasa"></textarea>
                <!-- <input type="text" name="abstrak" id="" placeholder="Masukkan Abstrak" class="input-biasa"> -->
            </div>
            <div class="mb-3">
                <label for="" class="block font-bold mb-2">Tahun</label>
                <input type="text" name="tahun" id="" placeholder="Masukkan Tahun" class="input-biasa">
            </div>
            <div class="mb-3">
                <label for="" class="block font-bold mb-2">Penulis</label>
                <input type="text" name="nama_penulis" id="" placeholder="Masukkan Nama lengkap" class="input-biasa">
            </div>
            <div class="mb-3">
                <label for="" class="block font-bold mb-2">Kategori</label>
                <select name="kategori_id" id="" class="input-biasa">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
        <label class="block font-bold mb-2">Program Studi</label>
        <input type="text" name="program_studi" placeholder="Masukkan Program Studi" class="input-biasa">
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Volume</label>
        <input type="text" name="volume" placeholder="Masukkan Volume" class="input-biasa">
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Nomor</label>
        <input type="text" name="nomor" placeholder="Masukkan Nomor" class="input-biasa">
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Link Journal</label>
        <input type="text" name="link_journal" placeholder="Masukkan Link Jurnal (opsional)" class="input-biasa">
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Tanggal Unggah</label>
        <input type="date" name="tanggal_unggah" class="input-biasa">
    </div>
            <div class="mb-3">
                <label for="" class="block font-bold mb-2">Upload File</label>
                <input type="file" name="file_upload" id="" class="input-biasa">
            </div>
            <button type="submit" class="tombol-biru">Submit</button>
        </form>
@include('layout.footer')