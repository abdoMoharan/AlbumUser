<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Requests\AlbumRequeststore;
use App\Http\Requests\AlbumrequestUpdate;
use App\Models\AlbumImage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::query()->with('images')->where('user_id', auth()->user()->id)->paginate(5);
        return view('admin.pages.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequeststore $request)
    {
        $data = $request->validated();
        $user_id = auth()->user()->id;

        try {
            DB::beginTransaction();

            $album = Album::create([
                'name' => $data['name'],
                'user_id' => $user_id,
            ]);

            foreach ($data['albums'] as $item) {
                $album->images()->create([
                    'image_name' => $item['image_name'],
                    'image' => $item['image'],
                ]);
            }

            DB::commit();

            session()->flash('success', 'Album created successfully');
            return redirect()->back();
        } catch (QueryException $e) {
            DB::rollBack();
            return back()->withError('Database error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $album->load('images');
        return view('admin.pages.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumrequestUpdate $request, Album $album)
    {
        $data = $request->validated();
        $album->update($data);
        try {
            DB::beginTransaction();
            $album->update($data);
            if (!is_null($data['albums']) && is_array($data['albums'])) {
                foreach ($data['albums'] as $item) {
                    if (isset($item['image'])) {
                        $album->images()->create([
                            'image_name' => $item['image_name'],
                            'image' => $item['image'],
                        ]);
                    }
                }
            }
            DB::commit();
            session()->flash('success', 'Album Updated successfully');
            return redirect()->back();
        } catch (QueryException $e) {
            DB::rollBack();
            return back()->withError('Database error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete_album($id){
       $album_image= AlbumImage::findOrFail($id)->delete();

       session()->flash('success', 'Album image delete  successfully');
       return redirect()->back();
    }
}
