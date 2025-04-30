@include('layout.header')
        <h3 class="judul-h3">Edit Document</h3>
        <form action="{{route('document.update', $document->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Judul</label>
                <input type="text" name="judul" id="" value="{{$document->judul}}" class="input-biasa">
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Abstrak</label>
                <textarea type="text" name="abstrak" id="" class="input-biasa">{{$document->abstrak}}</textarea>
                <!-- <input type="text" name="abstrak" id="" value="{{$document->abstrak}}" class="input-biasa"> -->
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Tahun</label>
                <input type="text" name="tahun" id="" value="{{$document->tahun}}" class="input-biasa">
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Nama Penulis</label>
                <input type="text" name="nama_penulis" id="" value="{{$document->nama_penulis}}" class="input-biasa">
            </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Kategori</label>
                <select name="kategori_id" id="" class="input-biasa">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ ($k->id == $document->kategori_id) ? 'selected':'' }}>{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
        <label class="block font-bold mb-2">Program Studi</label>
        <input type="text" name="program_studi" value="{{ $document->program_studi }}" class="input-biasa">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Volume</label>
        <input type="text" name="volume" value="{{ $document->volume }}" class="input-biasa">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Nomor</label>
        <input type="text" name="nomor" value="{{ $document->nomor }}" class="input-biasa">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Link Journal</label>
        <input type="text" name="link_journal" value="{{ $document->link_journal }}" class="input-biasa">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Tanggal Unggah</label>
        <input type="date" name="tanggal_unggah" value="{{ $document->tanggal_unggah }}" class="input-biasa">
    </div>
            <div class="mb-4">
                <label for="" class="block font-bold mb-2">Upload File</label>
                @if($document->upload)
                    <a href="{{ asset('storage/'.$document->upload) }}" alt="Upload Lama">Dokumen</a>
                @endif
                <input type="file" name="file_upload" id="" class="input-biasa">
            </div>
            <input type="hidden" name="upload_lama" value="{{$document->upload}}">
            <button type="submit" class="tombol-biru">Update</button>
        </form>
@include('layout.footer')