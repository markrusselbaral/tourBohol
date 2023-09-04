<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Http\Requests\DestinationRequest;

class DestinationPageController extends Controller
{
    function __construct()
    {
        $this->destination = new Destination;
    }


    public function index()
    {
        $content = $this->destination->displayDestinationContent();
        return view('admin.destination', compact('content'));
    }


    public function save(DestinationRequest $request)
    {
        $imageName = $this->destination->uploadImage($request, 'image', 'public/destination');
        $data = [
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description
        ];

        $this->destination->addDestinationContent($data);
        return redirect()->back()->with('success', 'Successfully Added');;
    }


    public function edit($id)
    {
        $content = $this->destination->editDestinationContent($id);
        return response()->json($content);
    }



    public function update(Request $request)
    {
        $imageName = $this->destination->uploadImage($request, 'image', 'public/destination');
        $id = $request->id;

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ];

        $this->destination->updateDestinationContent($data, $id);
        return redirect()->back()->with('success', 'Successfully Updated');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $this->destination->deleteDestinationContent($id);

        return redirect()->back()->with('success', 'Successfully Deleted');;
    }
}
