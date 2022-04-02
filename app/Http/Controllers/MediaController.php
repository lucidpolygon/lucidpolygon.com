<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function index()
    {
        $files = Media::paginate(15);
        return view('website.media.index', ['files' => $files]);
    }

    public function edit($id)
    {
        $file = Media::find($id);
        return view('website.media.index', ['file' => $file]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable'
        ]);
        $file = Media::find($id);
        if ($request->name != null) {
            $file->name = $request->name;
            $file->order_column = $request->order_column;
            $file->save();
        }
        return redirect()->route('media.index')->with('success', 'Media Updated');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|max:1024',
            'model_id' => 'required|exists:posts,id',
            'name' => 'nullable'
        ]);
        $file = Post::find($request->model_id)->addMedia($request->file)->toMediaCollection();
        if ($request->name != null) {
            $file->name = $request->name;
            $file->save();
        }
        return redirect()->route('media.index')->with('success', 'Media Stored');
    }

    public function destroy($id)
    {
        $file = Media::find($id)->delete();
        return redirect()->back()->with('success', 'Media Deleted');
    }
}
