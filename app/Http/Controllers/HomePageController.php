<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Http\Requests\HomeRequest;

class HomePageController extends Controller
{
    function __construct()
    {
        $this->home = new Home;
    }


    public function index()  
    {
        $content = $this->home->displayHomeContent();
        return view('admin.home', compact('content'));
    }


    public function save(HomeRequest $request)
    {
        $imageName = $this->home->uploadImage($request, 'image', 'public/home');
        $data = [
            'text' => $request->text,
            'background_image' => $imageName
        ];

        $this->home->addHomeContent($data);
        return redirect()->back()->with('success', 'Successfully Added');
    }




    public function select(Request $request)
    {
        $id = $request->id;
        $this->home->selectHomeContent($id);

        return redirect()->back()->with('success', 'Successfully Selected');
    }



    public function edit($id)
    {
        $content = $this->home->editHomeContent($id);
        return response()->json($content);
    }



    public function update(Request $request)
    {
        $imageName = $this->home->uploadImage($request, 'image', 'public/home');
        $id = $request->id;

        $data = [
            'text' => $request->text,
            'background_image' => $imageName
        ];

        $this->home->updateHomeContent($data, $id);
        return redirect()->back()->with('success', 'Successfully Updated');
    }



    public function delete(Request $request)
    {
        $id = $request->id;
        $this->home->deleteHomeContent($id);

        return redirect()->back()->with('success', 'Successfully Deleted');
    }
}
