<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;

class GalleryPageController extends Controller
{
    function __construct()
    {
        $this->gallery = new Gallery;
    }


    public function index()
    {
        $content = $this->gallery->displayGalleryContent();
        return view('admin.gallery', compact('content'));
    }


    public function save(GalleryRequest $request)
    {
        $imageName = $this->gallery->uploadImage($request, 'image', 'public/gallery');
        $data = [
            'text' => $request->text,
            'image' => $imageName
        ];

        $this->gallery->addGalleryContent($data);
        return redirect()->back()->with('success', 'Successfully Added');;
    }


    public function edit($id)
    {
        $content = $this->gallery->editGalleryContent($id);
        return response()->json($content);
    }



    public function update(Request $request)
    {
        $imageName = $this->gallery->uploadImage($request, 'image', 'public/gallery');
        $id = $request->id;

        $data = [
            'text' => $request->text,
            'image' => $imageName
        ];

        $this->gallery->updateGalleryContent($data, $id);
        return redirect()->back()->with('success', 'Successfully Updated');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $this->gallery->deleteGalleryContent($id);

        return redirect()->back()->with('success', 'Successfully Deleted');;
    }
}
