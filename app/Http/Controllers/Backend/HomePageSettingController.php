<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use App\Models\Image;
use App\Models\Video;
use App\Traits\fileUploadTrait;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    use fileUploadTrait;

    public function update(Request $request)
    {
        $data = $request->validate([
            'main_image' => ['image'],
            'main_title' => ['array', 'max:4000'],
            'main_description' => ['array', 'max:4000'],
            'sub_title' => ['array', 'max:4000'],
            'sub_description' => ['array', 'max:4000'],
        ]);

        $currentData = HomePageSetting::where('group', 'home_page_settings')->where('name', 'header')->first()?->payload;

        if ($request->has('main_image')) {
            $data['main_image'] = $this->fileUpdate($request, 'myDisk', 'homePageImage', 'main_image', @$currentData['main_image']);
        } else {
            $data['main_image'] = @$currentData['main_image'];
        }

        HomePageSetting::updateOrCreate(
            ['group' => 'home_page_settings', 'name' => 'header'],
            ['group' => 'home_page_settings', 'name' => 'header', 'payload' => $data]
        );

        toastr('Updated successfully!', 'success', 'success');

        return redirect()->back();
    }

    public function mediaOnHomePageUpdate(Request $request)
    {
        $request->validate([
            'image.*' => ['image', 'max:20000'],
            'video_thumbnail' => ['image', 'max:20000'],
            'video' => ['mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4'],
        ]);

        if ($request->has('video_thumbnail')) {
            $video_thumbnail = $this->fileUplaod($request, 'myDisk', 'video_thumbnail', 'video_thumbnail');
        }

        if ($request->has('video')) {
            $video = $this->fileUplaod($request, 'myDisk', 'videos', 'video');
            Video::create([
                'design_id' => null,
                'name' => $video,
                'video_thumbnail' => $video_thumbnail,
                'at_home' => 'yes',
            ]);
        }

        if ($request->has('image')) {
            $images = $this->filesUplaod($request, 'myDisk', 'images', 'image');
            foreach ($images as $image) {
                Image::create([
                    'design_id' => null,
                    'name' => $image,
                    'at_home' => 'yes',
                ]);
            }
        }

        toastr('Added successfully');

        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $setting = HomePageSetting::first();

        $request->status == 'true' ? $setting->banner_at_home = 'active' : $setting->banner_at_home = 'inactive';
        $setting->save();

        return response(['message' => 'Status has been updated']);
    }
}
