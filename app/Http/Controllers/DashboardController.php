<?php
namespace App\Http\Controllers;


use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $albums_count = Album::where('user_id', auth()->user()->id)->count();
        return view('admin.pages.index' , compact('albums_count'));
    }
}
