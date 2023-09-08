<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Domain;
use App\Models\Option;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Mail\DomaintransferOtp;
use App\Jobs\SendEmailJob;
use Auth;
use Str;
use Http;
use Artisan;
use File;
use App\Models\Order;
use App\Models\Plan;
use Crypt;
use Storage;
class DomainController extends Controller
{

    public function index()
    {
    	$posts=Tenant::where('user_id',Auth::id())->with('orderwithplan')->latest()->paginate(10);
    	return view('merchant.domain.index',compact('posts'));
    }

    public function create()
    {
        $file=file_get_contents('theme/themes.json');
        $themes = json_decode($file);
        $defaultTheme = $themes[5]->name;

        if (Session::has('domain_data')) {
           Session::forget('domain_data');
        }
      return view('merchant.domain.create',compact('themes','defaultTheme'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'domain' => 'required|max:20|unique:tenants,id|regex:/^\S*$/u',
        ]);
      $store_name = Str::slug($request->domain);
      $store_name=str_replace('-','',$store_name);
      $tenant = Tenant::where('id',$store_name)->first();
      if($tenant)
      {
        return response()->json(['errors'=>__('Store URL is unavailable')]);
      }else{
        return response()->json('success');
      }
    }


    public function store(Request $request)
    {

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:8|max:20|confirmed',
            'store_name' => 'required|max:20|unique:tenants,id|regex:/^\S*$/u',
            'theme' => 'required',
        ]);

        $name = Str::slug($request->store_name);

        $tenant = Tenant::where('id',$name)->first();

        if($tenant)
        {
          $error['errors']['domain']=__('Store URL is unavailable');
          return response()->json($error,422);
        }

        $data = [
          'store_name'=>$name,
          'email' => $request->email,
          'password' => $request->password,
          'theme'=>$request->theme,

        ];


        Session::put('store_data',$data);

      return response()->json(__('Great! Now you need to select a plan'));

    }

    public function gateway()
    {
        $free_stores_count = Tenant::where('user_id',Auth::id())->whereHas('order', function($query){ $query->where('plan_id', 1);})->count();
        if($free_stores_count > 2)
        {
            $plans = Plan::where([['status', 1], ['is_default', 0], ['is_trial', 0]])->get();
        }
        else
        {
            $plans = Plan::where([['status', 1], ['is_default', 0]])->get();
        }

        $orders = Order::where('user_id', Auth::id())->with('plan', 'getway')->latest()->paginate(25);
        return view('merchant.plan.index',compact('plans','orders'));
    }

    public function edit($id)
    {

    	$info=Tenant::where('user_id',Auth::id())->where('status',1)->findorFail($id);
      $obj=new Plan;
      $arr= $obj->plandata;
    	return view('merchant.domain.edit',compact('info','arr'));
    }

    public function domainConfig($id)
    {
        $info=Tenant::where('user_id',Auth::id())->with('subdomain','customdomain')->where('status',1)->findorFail($id);
        $plan= json_decode($info->plan_info ?? '');

        $dns=Option::where('key','dns_settings')->first();
        $dns=json_decode($dns->value ?? '');
        return view('merchant.domain.config',compact('info','plan','dns'));
    }

    public function update(Request $request,$id)
    {
      $validatedData = $request->validate([
        'name' => 'required|string|max:50',
      ]);
    	$check=Tenant::where([['id',Str::slug($request->name)],['id','!=',$id]])->where('status',1)->first();
    	if(!empty($check)){
    		$error['errors']['domain']=__('Oops store already exists');
    		return response()->json($error,422);
    	}

    	$info=Tenant::where('user_id',Auth::id())->findorFail($id);
    	$info->id=Str::slug($request->name);
      if ($request->auto_renew) {
        $info->auto_renew = 1;
      }
      else{
        $info->auto_renew = 0;
      }
    	$info->save();

    	return response()->json(__('Store name updated successfully'));
    }


    //add new subdomain
    public function addSubdomain(Request $request,$id)
    {
        $info=Tenant::where('user_id',Auth::id())->where('status',1)->findorFail($id);
        $check_before= Domain::where([['tenant_id',$id],['type',2]])->first();
        if (!empty($check_before)) {
            $error['errors']['domain']=__('Oops your subdomain already created....!!');
            return response()->json($error,422);
        }



            if ($info->sub_domain == 'on') {
                 $validatedData = $request->validate([
                    'subdomain' => 'required|string|max:50',
                 ]);

                 $domain=strtolower($request->subdomain).'.'.env('APP_PROTOCOLESS_URL');
                 $input = trim($domain, '/');
                 if (!preg_match('#^http(s)?://#', $input)) {
                    $input = 'http://' . $input;
                 }
                $urlParts = parse_url($input);
                $domain = preg_replace('/^www\./', '', $urlParts['host'] ?? $urlParts['path']);


                $check= Domain::where('domain',$domain)->first();
                if (!empty($check)) {
                    $error['errors']['domain']=__('Oops domain name already taken....!!');
                    return response()->json($error,422);
                }

                $subdomain= new Domain;
                $subdomain->domain= $domain;
                $subdomain->tenant_id= $id;
                if (env('AUTO_SUBDOMAIN_APPROVE') == true) {
                   $subdomain->status=1;
                }
                else{
                    $subdomain->status=2;
                }
                $subdomain->type=2;
                $subdomain->save();

                return response()->json(__('Subdomain created successfully...!!'));
            }

            $error['errors']['domain']=__('Sorry subdomain modules not support in your plan....!!');
            return response()->json($error,422);


    }


    //store custom domain
    public function addCustomDomain(Request $request,$id)
    {
        $checkisvalid=$this->is_valid_domain_name($request->domain);
        if ($checkisvalid == false) {
            $error['errors']['domain']=__('Please enter valid domain....!!');
           return response()->json($error,422);
        }



        $info=Tenant::where('user_id',Auth::id())->where('status',1)->findorFail($id);
        $check_before= Domain::where([['tenant_id',$id],['type',3]])->first();
        if (!empty($check_before)) {
            $error['errors']['domain']=__('Oops you already created customdomain....!!');
            return response()->json($error,422);
        }


            if ($info->custom_domain == 'on') {
                 $validatedData = $request->validate([
                    'domain' => 'required|string|max:50',
                 ]);

                 $domain=strtolower($request->domain);
                 $input = trim($domain, '/');
                 if (!preg_match('#^http(s)?://#', $input)) {
                    $input = 'http://' . $input;
                 }
                $urlParts = parse_url($input);
                $domain = preg_replace('/^www\./', '', $urlParts['host']);

                $checkArecord=$this->dnscheckRecordA($domain);
                $checkCNAMErecord=$this->dnscheckRecordCNAME($domain);
                if ($checkArecord != true) {
                  $error['errors']['domain']=__('A record entered incorrectly.');
                  return response()->json($error,422);
                }

                if ($checkCNAMErecord != true) {
                    $error['errors']['domain']=__('CNAME record entered incorrectly.');
                    return response()->json($error,422);
                }

                $check= Domain::where('domain',$domain)->first();
                if (!empty($check)) {
                    $error['errors']['domain']=__('Oops domain name already taken....!!');
                    return response()->json($error,422);
                }

                $subdomain= new Domain;
                $subdomain->domain= $domain;
                $subdomain->tenant_id= $id;
                $subdomain->status=2;
                $subdomain->type=3;
                $subdomain->save();

                return response()->json(__('Custom Domain Created Successfully...!!'));
            }

            $error['errors']['domain']=__('Sorry customdomain modules not support in your plan....!!');
            return response()->json($error,422);

    }

    //update subdomain
    public function updateSubdomain(Request $request,$id)
    {
        $info=Tenant::where('user_id',Auth::id())->findorFail($id);


            if ($info->sub_domain == 'on') {
                 $validatedData = $request->validate([
                    'subdomain' => 'required|string|max:50',
                 ]);

                 $domain=strtolower($request->subdomain).'.'.env('APP_PROTOCOLESS_URL');
                 $input = trim($domain, '/');
                 if (!preg_match('#^http(s)?://#', $input)) {
                    $input = 'http://' . $input;
                 }
                $urlParts = parse_url($input);
                $domain = preg_replace('/^www\./', '', $urlParts['host']);


                $check= Domain::where('domain',$domain)->where('tenant_id','!=',$id)->first();
                if (!empty($check)) {
                    $error['errors']['domain']=__('Oops domain name already taken....!!');
                    return response()->json($error,422);
                }

                $subdomain= Domain::where([['tenant_id',$id],['type',2]])->first();
                $subdomain->domain= $domain;
                $subdomain->save();

                return response()->json(__('Subdomain updated successfully...!!'));
            }

            $error['errors']['domain']=__('Sorry subdomain modules not support in your plan....!!');
            return response()->json($error,422);

    }

     //update custom domain
    public function updateCustomDomain(Request $request,$id)
    {

        $checkisvalid=$this->is_valid_domain_name($request->domain);
        if ($checkisvalid == false) {
            $error['errors']['domain']=__('Please enter valid domain....!!');
           return response()->json($error,422);
        }

        $info=Tenant::where('user_id',Auth::id())->findorFail($id);


            if ($info->custom_domain == 'on') {
                 $validatedData = $request->validate([
                    'domain' => 'required|string|max:50',
                 ]);

                 $domain=strtolower($request->domain);
                 $input = trim($domain, '/');
                 if (!preg_match('#^http(s)?://#', $input)) {
                    $input = 'http://' . $input;
                 }
                $urlParts = parse_url($input);
                $domain = preg_replace('/^www\./', '', $urlParts['host']);


                $check= Domain::where('domain',$domain)->where('tenant_id','!=',$id)->first();
                if (!empty($check)) {
                    $error['errors']['domain']=__('Oops domain name already taken....!!');
                    return response()->json($error,422);
                }

                $custom_domain= Domain::where([['tenant_id',$id],['type',3]])->first();
                if ($custom_domain->domain != $domain) {
                  $checkArecord=$this->dnscheckRecordA($domain);
                  $checkCNAMErecord=$this->dnscheckRecordCNAME($domain);
                  if ($checkArecord != true) {
                    $error['errors']['domain']=__('A record entered incorrectly.');
                    return response()->json($error,422);
                  }

                  if ($checkCNAMErecord != true) {
                    $error['errors']['domain']=__('CNAME record entered incorrectly.');
                    return response()->json($error,422);
                  }
                }

                $custom_domain->domain= $domain;
                $custom_domain->save();

                return response()->json(__('Custom domain updated successfully...!!'));
            }

            $error['errors']['domain']=__('Sorry subdomain modules not support in your plan....!!');
            return response()->json($error,422);

    }

    //destroy subdomain
    public function destroy($id)
    {
        $info=Tenant::where('user_id',Auth::id())->findorFail($id);
        $subdomain= Domain::where([['tenant_id',$id],['type',2]])->delete();

        return back();
    }

    //destroy custom domain

    public function destroyCustomdomain($id)
    {
        $info=Tenant::where('user_id',Auth::id())->findorFail($id);
        $subdomain= Domain::where([['tenant_id',$id],['type',3]])->delete();
        return back();
    }

    //check is valid domain name
    public function is_valid_domain_name($domain_name)
    {
      if(filter_var(gethostbyname($domain_name), FILTER_VALIDATE_IP))
      {
        return TRUE;
      }
      return false;
   }

   //check A record
   public function dnscheckRecordA($domain)
   {
    if (env('MOJODNS_AUTHORIZATION_TOKEN') != null  && env('VERIFY_IP') == true) {
        try {
          $response=Http::withHeaders(['Authorization'=>env('MOJODNS_AUTHORIZATION_TOKEN')])->acceptJson()->get('https://api.mojodns.com/api/dns/'.$domain.'/A');
          $ip= $response['answerResourceRecords'][0]['ipAddress'];

          if ($ip == env('SERVER_IP')) {
              $ip= true;
          }
          else{
            $ip=false;
          }

        } catch (Exception $e) {
          $ip=false;
        }

        return $ip;
    }

     return true;
   }


   //check crecord name
   public function dnscheckRecordCNAME($domain)
   {
    if (env('MOJODNS_AUTHORIZATION_TOKEN') != null) {
        if (env('VERIFY_CNAME') === true) {
        try {
          $response=Http::withHeaders(['Authorization'=>env('MOJODNS_AUTHORIZATION_TOKEN')])->acceptJson()->get('https://api.mojodns.com/api/dns/'.$domain.'/CNAME');
          if ($response->successful()) {
            $cname= $response['reportingNameServer'];

            if ($cname === env('CNAME_DOMAIN')) {
              $cname= true;
          }
          else{
           $cname=false;
        }

        }
        else{
            $cname=false;
        }

          }
          catch (Exception $e) {
              $cname=false;
          }


        return $cname;
       }
      }

     return true;
   }

   //domain transfer view
   public function transferView($id)
   {
      Session::forget('domain_transfer_info');
      $info=Tenant::where('user_id',Auth::id())->where('status',1)->findorFail($id);
      return view('merchant.domain.transferview',compact('info'));
   }

   //send otp to the user
   public function sendOtp(Request $request,$id)
   {
       Session::forget('domain_transfer_info');
       $validatedData = $request->validate([
        'email' => 'required|email|max:50',
       ]);
       $info=Tenant::where('user_id',Auth::id())->findorFail($id);

       $user=User::where([['email',$request->email],['role_id',2],['status',1]])->first();
       if (empty($user)) {
        $error['errors']['email']='Opps invalid email...!!';
         return response()->json($error,422);
       }

       $data = [
            'name'    => Auth::user()->name,
            'otp' => rand(10000,30000),
            'tenant_id' => $id,
            'email'=>$request->email,
            'type'=>'otp'
        ];

        Session::put('domain_transfer_info',$data);
        if (env('QUEUE_MAIL') == 'on') {
            dispatch(new SendEmailJob($data));
        } else {
           Mail::to(Auth::user()->email)->send(new DomaintransferOtp($data));
        }


       return response()->json(__('The OTP code send successfully to your email'));

   }

   //verify otp and change the owner
   public function verifyOtp(Request $request,$id)
   {
      abort_if(!Session::has('domain_transfer_info'),422);
      $validatedData = $request->validate([
          'otp' => 'required|numeric',
      ]);

      $info=Tenant::where('user_id',Auth::id())->findorFail($id);

      $data=Session::get('domain_transfer_info');

      if ($data['otp'] != $request->otp) {
          $error['errors']['otp']=__('Opps... invalid OTP');
          return response()->json($error,422);
      }

      if ($data['tenant_id'] != $id) {
        $error['errors']['otp']='Invalid request';
        return response()->json($error,422);
      }

      $user=User::where([['email',$data['email']],['role_id',2],['status',1]])->first();

      if (empty($user)) {
        $error['errors']['email']=__('Sorry user does not exists');
        return response()->json($error,422);
      }
      $info->user_id=$user->id;
      $info->save();

      return response()->json(__('Store ownership successfully transferred'));

   }


   //developer view
   public function developerView($id)
   {
      $info=Tenant::where('user_id',Auth::id())->where('status',1)->findorFail($id);

      $plan=json_decode($info->plan_info);
      $instruction=Option::where('key','developer_instruction')->first();
      $instruction=json_decode($instruction->value ?? '');
      return view('merchant.domain.dev',compact('info','plan','instruction'));
   }


    //database migration fresh with seed
    public function migrateWithSeed($id, Request $request)
    {
        $startTime = microtime(true) * 1000; // Start time in milliseconds

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:8|max:20|confirmed',
        // ]);

        if (Session::has('store_data'))
        {
            Session::forget('store_data');
        }

        $info = Tenant::where('user_id', Auth::id())->where('status', 1)->findorFail($id);
        $theme = ucfirst(explode('/', $info->theme)[1]);

        $email = $request->email;
        $name = explode('@', $email)[0];
        // Capitalize the first letter of each word
        $capitalizedName = ucwords(str_replace('.', ' ', $name));
        // remove any special characters or numbers from the name
        $cleanedName = preg_replace('/[^A-Za-z ]/', '', $capitalizedName);

        $data = [
            'store_name'=>$cleanedName,
            'email' => $request->email,
            'password' => $request->password,
            'theme'=>$theme
            ];

        Session::put('store_data',$data);

        // Set the app environment to 'local' only during the migration and seeding process
        // to prevent any potential security issues
        // $originalEnv = config('app.env');
        // config(['app.env' => 'local']);
        Artisan::call('tenants:migrate-fresh --tenants=' . $id);
        Artisan::call('tenants:seed --tenants='.$id);
        // Artisan::call('tenants:seed --tenants=' . $id . ' --class= ' .$theme . 'DataBaseSeeder' );
        // config(['app.env' => $originalEnv]);

        $endTime = microtime(true) * 1000; // End time in milliseconds
        $totalTimeInMilliseconds = $endTime - $startTime;
        logger('Total time taken: ' . $totalTimeInMilliseconds . ' milliseconds');

        return response()->json(__('Database migration process succeed'));
    }

   //database new table migrate
   public function migrate($id)
   {
        // Set the app environment to 'local' only during the migration and seeding process
        // to prevent any potential security issues
        // $originalEnv = config('app.env');
        // config(['app.env' => 'local']);

        // $info=Tenant::where('user_id',Auth::id())->findorFail($id);
        Artisan::call('tenants:migrate --tenants='.$id);
        // config(['app.env' => $originalEnv]);
        return response()->json(__('Database migration process succeed'));
   }

    // added by mutaman
    //database fresh migrate
    public function freshMigrate($id, Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        if (Session::has('store_data'))
        {
            Session::forget('store_data');
        }

        $info = Tenant::where('user_id', Auth::id())->where('status', 1)->findorFail($id);
        $theme = ucfirst(explode('/', $info->theme)[1]);

        $email = $request->email;
        $name = explode('@', $email)[0];
        // Capitalize the first letter of each word
        $capitalizedName = ucwords(str_replace('.', ' ', $name));
        // remove any special characters or numbers from the name
        $cleanedName = preg_replace('/[^A-Za-z ]/', '', $capitalizedName);

        $data = [
            'store_name'=>$cleanedName,
            'email' => $request->email,
            'password' => $request->password,
            'theme'=>$theme
            ];

        Session::put('store_data',$data);

        // Set the app environment to 'local' only during the migration and seeding process
        // to prevent any potential security issues
        // $originalEnv = config('app.env');
        // config(['app.env' => 'local']);
        // $info=Tenant::where('user_id',Auth::id())->findOrFail($id);

        // Artisan::call('tenants:migrate-fresh --tenants='.$id);
        // Fresh migrate the tenant's database
        Artisan::call('tenants:migrate-fresh', ['--tenants' => $id]);
        Artisan::call('tenants:seed', [
            '--tenants' => $id,
            '--class' => 'TenantfreshDataBaseSeeder'
        ]);
        // config(['app.env' => $originalEnv]);

        return response()->json(__('Database is now fresh, without any data'));
    }
    // end added

   //cache clear for spesific tenant
   public function cacheClear($id)
   {
        $info=Tenant::where('user_id',Auth::id())->findorFail($id);
        if (env('CACHE_DRIVER') == 'memcached' || env('CACHE_DRIVER') == 'redis') {
            \Config::set('app.env', 'local');
            Artisan::call('cache:clear --tags='.$id);
        }
        $info->cache_version=rand(10,20);
        $info->save();

        return response()->json(__('Store cache cleared successfully'));
   }

   //remove with storage directory
   public function removeStorage($id)
   {
        $info=Tenant::where('user_id',Auth::id())->findorFail($id);

        Storage::disk(env('STORAGE_TYPE'))->deleteDirectory('uploads/'.$info->uid);
        Storage::disk('public')->deleteDirectory('uploads/'.$info->uid);


        return response()->json(__('Store storage cleared successfully'));
   }

    // added by mutaman
    //enable maintenance mode
    public function enableMaintenance($id)
    {
          $info=Tenant::where('user_id',Auth::id())->findorFail($id);

          $maintenanceMode = [
              'allowed' => ['127.0.0.1'], // replace with your allowed IP addresses
              'time' => now()->addMinutes(30)->getTimestamp(),
              'retry' => 60,
              'message' => 'The application is currently in maintenance mode. Please try again later.',
              'secret' => '1930', // add a new key-value pair for the secret

          ];

          $info->update(['maintenance_mode' => $maintenanceMode]);

          return response()->json(__('Maintenance Mode Enabled successfully'));
    }

    //disable maintenance mode
    public function disableMaintenance($id)
    {
        $info=Tenant::where('user_id',Auth::id())->findorFail($id);

        $info->update(['maintenance_mode' => Null]);

        return response()->json(__('Maintenance Mode Disabled successfully'));
    }
    // end added by mutaman

   public function login($id)
   {
        $data=Tenant::where([['user_id',Auth::id()],['status',1],['will_expire','>',now()]])->whereHas('active_domains')->with('active_domains')->findorFail($id);
        $data->auth_token=Str::random(40).Auth::id();
        $data->save();

        $count=count($data->domains);
        $domain='';
        if ($count > 0) {
        foreach ($data->domains as $key => $value) {
            if ($key+1 == $count) {
            $domain=$value->domain;
            }
        }
        }



        return redirect(env('APP_PROTOCOL').$domain.'/make-login/'.Crypt::encryptString($data->auth_token));

   }

   //login with real domain

   public function loginByDomain($id)
   {
        $domain=Domain::where('status',1)->whereHas('tenant',function($q){
        return $q->where('user_id',Auth::id())->where('status',1);
        })->findorFail($id);

        $data=Tenant::where([['user_id',Auth::id()],['status',1],['will_expire','>',now()]])->findorFail($domain->tenant_id);
        $data->auth_token=Str::random(40).Auth::id();
        $data->save();
        return redirect(env('APP_PROTOCOL').$domain->domain.'/make-login/'.Crypt::encryptString($data->auth_token));
   }

}
