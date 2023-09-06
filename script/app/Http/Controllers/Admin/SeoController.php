<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use Auth;
class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(!Auth()->user()->can('seo.settings'), 401);
        $data = Option::where('key', 'seo_home')->orWhere('key', "seo_blog")->orWhere('key', "seo_service")->orWhere('key', "seo_contract")->orWhere('key', "seo_pricing")->get();


       return view('admin.seo.index',compact('data'));
    }

    public function edit($id)
    {
        abort_if(!Auth()->user()->can('seo.settings'), 401);
        $data = Option::where('id', $id)->first();
        // added by mutaman for languages
        $actives=Option::where('key','active_languages')->first();
        if (!empty($actives)) {
            $actives=json_decode($actives->value);
        }
        else{
            abort(500, 'Active languages not found in database');
        }
        // end added
        return view('admin.seo.edit', compact('data','actives'));
    }

    public function update(Request $request, $id)
    {
        // $option = Option::where('id', $id)->first();

        // $data = [
        //     "site_name"          => $request->site_name,
        //     "matatag"            => $request->matatag,
        //     "twitter_site_title" => $request->twitter_site_title,
        //     "matadescription"    => $request->matadescription,
        // ];

        // $value         = json_encode($data);
        // $option->value = $value;
        // $option->save();
        // return response()->json('Successfully Updated');

        // $data = Option::where('id', $id)->first();

        $data = Option::findOrFail($id);
        $dataValue = json_decode($data->value, true);

        $validatedData = $request->validate([
            'site_name_*' => 'required',
            'matatag_*' => 'required',
            'twitter_site_title_*' => 'required',
            'matadescription_*' => 'required',
        ]);

        foreach ($request->input('locale') as $locale) {

            $dataValue['site_name_'.$locale] = $request->{'site_name_'.$locale};
            $dataValue['matatag_'.$locale] = $request->{'matatag_'.$locale};
            $dataValue['twitter_site_title_'.$locale] = $request->{'twitter_site_title_'.$locale};
            $dataValue['matadescription_'.$locale] = $request->{'matadescription_'.$locale};
        }

        $data->value = json_encode($dataValue);
        $data->save();

        return response()->json(__('SEO Settings Updated Successfully'));

    }

  

}
