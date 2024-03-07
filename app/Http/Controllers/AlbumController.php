<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use App\Interface\AlbumInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Requests\AlbumRequeststore;
use App\Http\Requests\AlbumrequestUpdate;

class AlbumController extends Controller
{
    public  AlbumInterface $album;
    public function __construct(AlbumInterface $album)
    {
        $this->album = $album;
    }
    public function index()
    {
        return $this->album->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->album->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequeststore $request)
    {
        return $this->album->store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return $this->album->edit($album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumrequestUpdate $request, Album $album)
    {
        return $this->album->update($request,$album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        return $this->album->destroy($album);
    }

    public function delete_album($id){
        return $this->album->delete_album($id);
    }
}
