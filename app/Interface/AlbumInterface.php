<?php

namespace App\Interface;

use App\Models\Album;
use App\Http\Requests\AlbumRequeststore;


interface AlbumInterface
{
public function index();
public function create();
public function store($request);
public function edit(Album $album);
public function update($request, $album);
public function destroy(Album $album);
public function delete_album($id);
}

