<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('image.create');
    }
    public function store(StoreImageRequest $request)
    {
        $data = $request->validated();
        $data['image_path'] = $request->file('image')->store('image', 'public');

        auth()->user()->images()->create($data);

        return back()->with('success', __('image uploaded'));
    }

    public function show(Image $image)

    {
        return view('image.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('image.edit', compact('image'));
    }
    public function update(UpdateImageRequest $request, Image $image)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            $data['image_path'] = $request->file('image')->store('image', 'public');

            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        $image->update($data);
        return back()->with('success', __('Image update'));
    }

    public function destroy(Image $image)
    {
        abort_unless($image->isEditable(), 403);

        $image->delete();

        return back()->with('success', __('Image deleted'));
    }



    public function restore(Image $image)
    {
        abort_unless($image->isEditable(), 403);

        $image->restore();

        return back()->with('success', __('Image restored'));
    }
}
