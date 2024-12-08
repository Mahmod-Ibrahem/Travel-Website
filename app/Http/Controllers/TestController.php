<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TestController extends Controller
{
    public function testUpload(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $request['image']->getClientOriginalExtension();
        $dir_path = 'Images/'; // Adjusted path

        // Check if directory exists, if not create it
        if (!file_exists(storage_path('app/public/' . $dir_path))) {
            mkdir(storage_path('app/public/' . $dir_path), 0755, true); // Create the directory if it doesn't exist
        }

        // Process and save the image
        try {
            $img = $manager->read($request['image']);
            $img = $img->resize(668, 670.400);
            $img->toWebp()->save(storage_path('app/public/' . $dir_path . $name_gen));
            dd( asset('storage/' . $dir_path . $name_gen));
        } catch (Exception $e) {
            dd($e->getMessage());
            return response()->json(['message' => 'Error processing image: ' . $e->getMessage()], 500);
        }
    }
}
