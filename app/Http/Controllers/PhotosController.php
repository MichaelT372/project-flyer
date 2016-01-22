<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Flyer;
use App\AddPhotoToFlyer;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPhotoRequest;

class PhotosController extends Controller
{
    /**
     * Apply a photo to the referenced flyer.
     * 
     * @param string  $zip     
     * @param string  $street  
     * @param Request $request 
     */
    public function store($zip, $street, AddPhotoRequest $request)
    {   
        $flyer = Flyer::locatedAt($zip, $street);

        $photo = $request->file('photo');

        (new AddPhotoToFlyer($flyer, $photo))->save();
    }

    /**
     * Delete a photo and its associated files
     * 
     * @param  $id
     * @return void
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id)->delete();

        return back();
    }   
}
