<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex($id){
        $catalog=Catalog::where('id', $id)->first();
        return view('catalog', compact('catalog'));
    }
}
