<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Home extends Model
{
    protected $fillable = ['text', 'background_image'];

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




    public function displayHomeContent()
    {
        return $this->all();
    }




    public function addHomeContent($data)
    {
        return $this->create($data);
    }



    public function selectHomeContent($id)
    {
        $selected = $this->where('id', $id);
        $selected->update(['status' => 1]);

        $notSelected = $this->where('id', '<>', $id);
        $notSelected->update(['status' => 0]);
    }





    public function editHomeContent($id)
    {
        return $this->whereid($id)->first();
    }





    public function updateHomeContent($data, $id)
    {
        $content = $this->find($id);
        if (!$content) {
            return;
        }
        if (isset($data['image'])) {
            Storage::delete('public/about/' . $content->background_image);
            $content->image = $data['background_image'];
        }
        $content->text = $data['text'];
        $content->save();
    }





    public function deleteHomeContent($id)
    {
        $content = $this->whereid($id)->first();
        if($content)
        {
            Storage::delete('public/home/'.$content->background_image);
        }
        $content->delete();
    }

}
