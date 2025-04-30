@include('layout.header')
<h3 class="judul-h3">Upload Dokumen Mandiri</h3>
<form action="{{ route('upload-mandiri.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="block font-bold mb-2">Judul</label>
        <input type="text" name="judul" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Abstrak</label>
        <textarea name="abstrak" class="input-biasa"></textarea>
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Tahun</label>
        <input type="text" name="tahun" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Penulis</label>
        <input type="text" name="nama_penulis" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Program Studi</label>
        <input type="text" name="program_studi" class="input-biasa">
    </div>
    <div class="mb-3">
    <label for="" class="block font-bold mb-2">Kategori</label>
    <select name="kategori_id" id="" class="input-biasa" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        @endforeach
    </select>
</div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Volume</label>
        <input type="text" name="volume" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Nomor</label>
        <input type="text" name="nomor" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Link Journal</label>
        <input type="text" name="link_journal" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Tanggal Unggah</label>
        <input type="date" name="tanggal_unggah" class="input-biasa">
    </div>
    <div class="mb-3">
        <label class="block font-bold mb-2">Upload File</label>
        <input type="file" name="file_upload" class="input-biasa">
    </div>
    <button type="submit" class="tombol-biru">Upload</button>
</form>
@include('layout.footer')