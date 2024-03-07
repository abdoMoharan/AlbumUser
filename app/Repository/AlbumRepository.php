<?php

namespace App\Repository;

use App\Models\Album;
use App\Models\AlbumImage;
use App\Interface\AlbumInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AlbumRepository implements AlbumInterface
{
    public function index()
    {
        $albums = Album::query()->with('images')->where('user_id', auth()->user()->id)->paginate(5);
        return view('admin.pages.album.index', compact('albums'));
    }
    public function create()
    {
        return view('admin.pages.album.create');
    }
    public function store($request)
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
    public function edit(Album $album)
    {
        $album->load('images');
        return view('admin.pages.album.edit', compact('album'));
    }
    public function update($request, $album)
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
    public function destroy(Album $album)
    {
        $album->delete();
        session()->flash('success', 'Album deleted successfully');
        return redirect()->back();
    }
    public function delete_album($id)
    {
        $album_image = AlbumImage::findOrFail($id)->delete();

        session()->flash('success', 'Album image delete  successfully');
        return redirect()->back();
    }
}
