<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Option;
use App\Models\Term;
use App\Models\Termmeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Svg\Tag\Rect;
use Auth;

class ThemesettingsController extends Controller
{
    public function general()
    {
        abort_if(!Auth()->user()->can('site.settings'),401);
        $info = get_option('theme',true);
        return view('admin.theme.general',compact('info'));
    }

    public function serviceindex()
    {
         abort_if(!Auth()->user()->can('site.settings'),401);
        $services = Term::where('type','service')->latest()->paginate(20);
        return view('admin.theme.services.index',compact('services'));
    }

    public function servicecreate()
    {
         abort_if(!Auth()->user()->can('site.settings'),401);
        return view('admin.theme.services.create');
    }

    public function servicestore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_content' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);

        $service = new Term();
        $service->title = $request->name;
        $service->slug = Str::slug($request->name);
        $service->type = 'service';
        $service->status = $request->status;
        $service->save();

        if($request->file('image'))
        {
            $image = $request->file('image');
            $image_filename = 'service'.Str::random(10).'.'.$image->extension();
            if(file_exists('uploads/service/'.$image_filename))
            {
                unlink('uploads/service/'.$image_filename);
            }
            $image->move('uploads/service/', $image_filename);
        }

        $data = [
            'short_content' => $request->short_content,
            'description' => $request->description,
            'image' => 'uploads/service/'.$image_filename
        ];

        $servicemeta = new Termmeta();
        $servicemeta->term_id = $service->id;
        $servicemeta->key = 'service';
        $servicemeta->value = json_encode($data);
        $servicemeta->save();


        return response()->json('Service Created');
    }

    public function serviceedit($id)
    {
         abort_if(!Auth()->user()->can('site.settings'),401);
        $service = Term::with('servicemeta')->findOrFail($id);
        return view('admin.theme.services.edit',compact('service'));
    }

    public function serviceupdate(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'short_content' => 'required',
            'description' => 'required',
            'image' => 'image',
            'status' => 'required'
        ]);

        $service = Term::findOrFail($id);
        $service->title = $request->name;
        $service->slug = Str::slug($request->name);
        $service->status = $request->status;
        $service->save();

        $servicemeta = Termmeta::where('term_id',$service->id)->first();

        $info = json_decode($servicemeta->value);

        if($request->file('image'))
        {
            $image = $request->file('image');
            $image_filename = 'service'.Str::random(10).'.'.$image->extension();
            if(file_exists('uploads/service/'.$image_filename))
            {
                unlink('uploads/service/'.$image_filename);
            }
            $image->move('uploads/service/', $image_filename);
            $image_filename = 'uploads/service/'.$image_filename;
        }else{
            $image_filename = $info->image;
        }

        $data = [
            'short_content' => $request->short_content,
            'description' => $request->description,
            'image' => $image_filename
        ];


        $servicemeta->term_id = $service->id;
        $servicemeta->value = json_encode($data);
        $servicemeta->save();

        return response()->json('Service Update');
    }

    public function servicedestroy(Request $request)
    {
        if($request->method == 'delete')
        {
            if($request->ids > 0)
            {
                foreach ($request->ids as $key => $value) {
                    Term::find($value)->delete();
                }
            }
        }

        return response()->json('Service Deleted');
    }

    public function generalupdate(Request $request)
    {

        $request->validate([
            'logo' => 'image',
            'favicon' => 'image|mimes:ico',
            'hero_img' => 'image',
            'market_img' => 'image',
            'sell_img' => 'image',
            'sell_url' => 'required',
            'market_url' => 'required',
        ]);

        $option = Option::where('key','theme')->first();

        $info = json_decode($option->value ?? '');

        if($request->file('logo'))
        {
            $logo = $request->file('logo');
            $logo_img_filename = 'logo.png';

            $logo->move('uploads', $logo_img_filename);
        }else{
            $logo_img_filename = $info->logo_img;
        }

        if($request->file('favicon'))
        {

            $favicon = $request->file('favicon');
            $fileName = 'favicon.ico';

            $logo->move('uploads', $fileName);
        }

        if($request->file('hero_img'))
        {
            $hero_img = $request->file('hero_img');
            $hero_img_filename = 'hero_img'.'.'.$hero_img->extension();
            if(file_exists('uploads/'.$hero_img_filename))
            {
                unlink('uploads/'.$hero_img_filename);
            }
            $hero_img->move('uploads/', $hero_img_filename);
        }else{
            $hero_img_filename = $info->hero_img;
        }

        if($request->file('market_img'))
        {
            $market_img = $request->file('market_img');
            $market_img_filename = 'market_img'.'.'.$market_img->extension();
            if(file_exists('uploads/'.$market_img_filename))
            {
                unlink('uploads/'.$market_img_filename);
            }
            $market_img->move('uploads/', $market_img_filename);
        }else{
            $market_img_filename = $info->market_img;
        }

        if($request->file('sell_img'))
        {
            $sell_img = $request->file('sell_img');
            $sell_img_filename = 'sell_img'.'.'.$sell_img->extension();
            if(file_exists('uploads/'.$sell_img_filename))
            {
                unlink('uploads/'.$sell_img_filename);
            }
            $sell_img->move('uploads/', $sell_img_filename);
        }else{
            $sell_img_filename = $info->sell_img;
        }

        $data = [
            'hero_img' => $hero_img_filename,
            'market_img' => $market_img_filename,
            'logo_img' => $logo_img_filename,
            'sell_img' => $sell_img_filename,
            'sell_url' => $request->sell_url,
            'market_url' => $request->market_url
        ];


        if(!$option)
        {
            $option = new Option();
            $option->key = 'theme';
        }
        $option->value = json_encode($data);
        $option->save();

        return response()->json('Theme Settings Update');


    }

    public function footerindex()
    {
         abort_if(!Auth()->user()->can('site.settings'),401);
        $info = get_option('footer_theme',true);
        return view('admin.theme.footer',compact('info'));
    }

    public function footerupdate(Request $request)
    {
        foreach ($request->social ?? [] as $value) {
            $social[] = [
                'icon' => $value['icon'],
                'link' => $value['link'],
            ];
        };

        $data = [
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'copyright' => $request->copyright,
            'social' => $social
        ];

        $footer = Option::where('key','footer_theme')->first();
        if(!$footer)
        {
            $footer = new Option();
            $footer->key = 'footer_theme';
        }
        $footer->value = json_encode($data);
        $footer->save();

        return response()->json('Footer Settings Updated');

    }

    public function demo_lists()
    {
        $demos = Term::where([
            ['type','theme_demo'],
            ['status',1]
        ])->paginate(20);
        return view('admin.theme.demo.index',compact('demos'));
    }

    public function demo_create()
    {
        return view('admin.theme.demo.create');
    }

    public function demo_store(Request $request)
    {
        $this->validate($request, [
            'theme_name' => 'required',
            'theme_url' => 'required|url',
            'theme_image' => 'required|image'
        ]);

        $theme_demo = new Term();
        $theme_demo->title = $request->theme_name;
        $theme_demo->slug = Str::slug($request->theme_name);
        $theme_demo->type = 'theme_demo';
        $theme_demo->status = $request->status;
        $theme_demo->save();

        if($request->file('theme_image'))
        {
            $logo = $request->file('theme_image');
            $theme_image = uniqid().'.'.$logo->extension();

            $logo->move('uploads/demo/', $theme_image);
        }else{
            $theme_image = '';
        }

        $data = [
            'theme_url' => $request->theme_url,
            'theme_image' => $theme_image
        ];

        $theme_demo_meta = new Termmeta();
        $theme_demo_meta->term_id = $theme_demo->id;
        $theme_demo_meta->key = 'theme_demo';
        $theme_demo_meta->value = json_encode($data);
        $theme_demo_meta->save();

        return response()->json('Theme Demo Created');
    }


    public function demo_edit($id)
    {
        $theme_demo = Term::with('meta')->findOrFail($id);
        return view('admin.theme.demo.edit',compact('theme_demo'));
    }

    public function demo_update(Request $request,$id)
    {
        $this->validate($request, [
            'theme_name' => 'required',
            'theme_url' => 'required|url',
            'theme_image' => 'image'
        ]);

        $theme_demo = Term::findOrFail($id);
        $theme_demo->title = $request->theme_name;
        $theme_demo->slug = Str::slug($request->theme_name);
        $theme_demo->status = $request->status;
        $theme_demo->save();

        $theme_info = json_decode($theme_demo->meta->value);


        if($request->file('theme_image'))
        {
            $logo = $request->file('theme_image');
            $theme_image = uniqid().'.'.$logo->extension();

            $logo->move('uploads/demo/', $theme_image);
        }else{
            $theme_image = $theme_info->theme_image;
        }

        $data = [
            'theme_url' => $request->theme_url,
            'theme_image' => $theme_image
        ];

        $theme_demo_meta = Termmeta::where('term_id',$theme_demo->id)->first();
        $theme_demo_meta->value = json_encode($data);
        $theme_demo_meta->save();

        return response()->json(__('Theme Demo Updated Successfully'));
    }

    public function demo_destroy(Request $request)
    {
        if($request->method == 'delete')
        {
            if($request->ids > 0)
            {
                foreach ($request->ids as $key => $value) {
                    $theme_demo = Term::with('meta')->find($value);
                    $info = json_decode($theme_demo->meta->value);
                    if(file_exists('uploads/demo/'.$info->theme_image))
                    {
                        unlink('uploads/demo/'.$info->theme_image);
                    }
                    $theme_demo->delete();
                }
            }else{
                $errors['errors']['error']=__('Opps something wrong');
                return response()->json($errors,401);
            }
        }else{
            $errors['errors']['error']=__('Please Select Any Status');
            return response()->json($errors,401);
        }

        return response()->json(__('Theme Demo Deleted Successfully'));
    }

    // Added By Mutaman For Testimonials
    public function testimonials_lists()
    {
        $testimonials = Term::where([
            ['type','testimonial'],
            ['status',1]
        ])->paginate(20);
        return view('admin.theme.testimonials.index',compact('testimonials'));
    }

    public function testimonial_create()
    {
        return view('admin.theme.testimonials.create');
    }

    public function testimonial_store(Request $request)
    {
        $this->validate($request, [
            'partner_name' => 'required',
            'partner_position' => 'required',
            'testimonial' => 'required',
            'store_url' => 'required|url',
            'store_image' => 'required|image'
        ]);

        $testimonial = new Term();
        $testimonial->title = $request->partner_name;
        $testimonial->slug = Str::slug($request->partner_name);
        $testimonial->type = 'testimonial';
        $testimonial->status = $request->status;
        $testimonial->save();

        if($request->file('store_image'))
        {
            $logo = $request->file('store_image');
            $store_image = uniqid().'.'.$logo->extension();

            $logo->move('uploads/testimonials/', $store_image);
        }else{
            $store_image = '';
        }

        $data = [
            'partner_position' => $request->partner_position,
            'store_url' => $request->store_url,
            'store_image' => $store_image,
            'testimonial' => $request->testimonial
        ];

        $testimonial_meta = new Termmeta();
        $testimonial_meta->term_id = $testimonial->id;
        $testimonial_meta->key = 'testimonial';
        $testimonial_meta->value = json_encode($data);
        $testimonial_meta->save();

        return response()->json(__('Testimonial Created Successfully'));
    }


    public function testimonial_edit($id)
    {
        $testimonial = Term::with('meta')->findOrFail($id);
        return view('admin.theme.testimonials.edit',compact('testimonial'));
    }

    public function testimonial_update(Request $request,$id)
    {
        $this->validate($request, [
            'partner_name' => 'required',
            'partner_position' => 'required',
            'testimonial' => 'required',
            'store_url' => 'required|url',
            'store_image' => 'image'
        ]);

        $testimonial = Term::findOrFail($id);
        $testimonial->title = $request->partner_name;
        $testimonial->slug = Str::slug($request->partner_name);
        $testimonial->status = $request->status;
        $testimonial->save();

        $theme_info = json_decode($testimonial->meta->value);


        if($request->hasFile('store_image'))
        {
            $logo = $request->file('store_image');
            $store_image = uniqid().'.'.$logo->extension();

            // Delete the old image if it exists
            if (file_exists('uploads/testimonials/'.$theme_info->store_image)) {
                unlink('uploads/testimonials/'.$theme_info->store_image);
            }

            $logo->move('uploads/testimonials/', $store_image);
        }else{
            $store_image = $theme_info->store_image;
        }

        $data = [
            'partner_position' => $request->partner_position,
            'store_url' => $request->store_url,
            'store_image' => $store_image,
            'testimonial' => $request->testimonial

        ];

        $testimonial_meta = Termmeta::where('term_id',$testimonial->id)->first();
        $testimonial_meta->value = json_encode($data);
        $testimonial_meta->save();

        return response()->json(__('Testimonial Updated Successfully'));
    }

    public function testimonial_destroy(Request $request)
    {
        if($request->method == 'delete')
        {
            if($request->ids > 0)
            {
                foreach ($request->ids as $key => $value) {
                    $testimonial = Term::with('meta')->find($value);
                    $info = json_decode($testimonial->meta->value);
                    if(file_exists('uploads/testimonials/'.$info->store_image))
                    {
                        unlink('uploads/testimonials/'.$info->store_image);
                    }
                    $testimonial->delete();
                }
            }else{
                $errors['errors']['error']=__('Opps something wrong');
                return response()->json($errors,401);
            }
        }else{
            $errors['errors']['error']=__('Please Select Any Status');
            return response()->json($errors,401);
        }

        return response()->json(__('Testimonial Deleted Successfully'));
    }
    // end added

}
