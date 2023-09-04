<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\AboutRequest;

class AboutPageController extends Controller
{
    function __construct()
    {
        $this->about = new About;
    }

    public function index()
    {
        $content = $this->about->displayAboutContent();
        return view('admin.about', compact('content'));
    }


    public function save(AboutRequest $request)
    {
        $imageName = $this->about->uploadImage($request, 'image', 'public/about');
        $data = [
            'text' => $request->text,
            'image' => $imageName
        ];

        $this->about->addAboutContent($data);
        return redirect()->back()->with('success', 'Successfully Added');;
    }


    public function edit($id)
    {
        $content = $this->about->editAboutContent($id);
        return response()->json($content);
    }



    public function update(Request $request)
    {
        $imageName = $this->about->uploadImage($request, 'image', 'public/about');
        $id = $request->id;

        $data = [
            'text' => $request->text,
            'image' => $imageName
        ];

        $this->about->updateAboutContent($data, $id);
        return redirect()->back()->with('success', 'Successfully Updated');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $this->about->deleteAboutContent($id);

        return redirect()->back()->with('success', 'Successfully Deleted');;
    }

}
