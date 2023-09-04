<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Gallery extends Model
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

    public function displayGalleryContent()
    {
        return $this->all();
    }

    public function addGalleryContent($data)
    {
        return $this->create($data);
    }


    public function editGalleryContent($id)
    {
        return $this->whereid($id)->first();
    }


    public function updateGalleryContent($data, $id)
    {
        $content = $this->find($id);
        if (!$content) {
            return;
        }
        if (isset($data['image'])) {
            Storage::delete('public/gallery/' . $content->image);
            $content->image = $data['image'];
        }
        $content->text = $data['text'];
        $content->save();
    }


    public function deleteGalleryContent($id)
    {
        $content = $this->whereid($id)->first();
        if($content)
        {
            Storage::delete('public/gallery/'.$content->image);
        }
        $content->delete();
    }
}
