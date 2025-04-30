<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FDocumentController extends Controller
{
    public function index()
    {
        // $document = Document::latest()->paginate(6);

        $query = Document::query();

        //filter kategori
        if(request()->has('kategori') && request('kategori') != ''){
            $query->where('kategori_id', request('kategori'));
        }
        //filter penulis
        // if(request()->has('writer') && request('writer') != ''){
        //     $query->where('writer_id', request('writer'));
        // }

        //search
        if(request()->has('search')){
            $query->where(function($q){
                $q->where('judul', 'like', '%'. request('search').'%')
                ->orWhere('judul', 'like', '%'. request('search').'%');
            });
        }

        $document = $query->paginate(6);
        $kategori = Kategori::all();
        // $writer = Writer::all();
        return view('frontend.index', compact('document', 'kategori'));
    }

    public function detail_document(Document $document)
    {
        return view('frontend.detail_document', compact('document'));
    }
}
