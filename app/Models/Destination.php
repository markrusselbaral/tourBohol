<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use App\Models\Comment;

class Destination extends Model
{
    protected $fillable = ['title','description', 'image', 'like', 'is_liked'];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

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


    public function displayDestinationContent()
    {
        return $this->all();
    }

    public function addDestinationContent($data)
    {
        return $this->create($data);
    }



     public function editDestinationContent($id)
    {
        return $this->whereid($id)->first();
    }


    public function updateDestinationContent($data, $id)
    {
        $content = $this->find($id);
        if (!$content) {
            return;
        }
        if (isset($data['image'])) {
            Storage::delete('public/destination/' . $content->image);
            $content->image = $data['image'];
        }
        $content->title = $data['title'];
        $content->description = $data['description'];
        $content->save();
    }



    public function deleteDestinationContent($id)
    {
        $content = $this->whereid($id)->first();
        if($content)
        {
            Storage::delete('public/destination/'.$content->image);
        }
        $content->delete();
    }



}
