<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class About extends Model
{
    protected $fillable = ['text', 'image'];


    public function uploadImage($request, $fieldName, $storagePath)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::putFileAs($storagePath, $image, $imageName);
            return $imageName;
        }
        return null;
    }

    public function displayAboutContent()
    {
        return $this->all();
    }

    public function addAboutContent($data)
    {
        return $this->create($data);
    }


    public function editAboutContent($id)
    {
        return $this->whereid($id)->first();
    }


    public function updateAboutContent($data, $id)
    {
        $content = $this->find($id);
        if (!$content) {
            return;
        }
        if (isset($data['image'])) {
            Storage::delete('public/about/' . $content->image);
            $content->image = $data['image'];
        }
        $content->text = $data['text'];
        $content->save();
    }





    public function deleteAboutContent($id)
    {
        $content = $this->whereid($id)->first();
        if($content)
        {
            Storage::delete('public/about/'.$content->image);
        }
        $content->delete();
    }
}
