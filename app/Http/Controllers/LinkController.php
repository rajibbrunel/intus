<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //0  not safe
        //1 success
        //2 short url exist 
        // 3 not valid url
        // 4 undefined error /system error
        //5 response status issues
        //10 initial
        $url_input = $request->link;
        $url = Str::lower($url_input);
        $short_url = "";
        $safe = false;
        $hash_match = false;
        $protocol = "";
        $plain_url = "";
        $success = 10;
        $status_code = 200;  // validation   
        $alternative_short_url = "";
        $message = "";

        // safe api related variables 
        $safe_apikey = 'AIzaSyDMepvOdJRNNHXuHG8Xb12hi18oNFkPAxU';
        $platform_type = ["ANY_PLATFORM", "WINDOWS", "LINUX", "OSX", "ANDROID", "OSX", "IOS", "CHROME", "PLATFORM_TYPE_UNSPECIFIED"];
        $threatTypes = ["MALWARE", "SOCIAL_ENGINEERING", "UNWANTED_SOFTWARE", "POTENTIALLY_HARMFUL_APPLICATION", "THREAT_TYPE_UNSPECIFIED"];
        $threatEntryTypes = ["URL", "EXECUTABLE", "IP_RANGE", "THREAT_ENTRY_TYPE_UNSPECIFIED"];

        $data_for_safe_api = array(
            "client" => [
                "clientId" => "intuswindow",
                "clientVersion" => "1.0.0"
            ],
            "threatInfo" => [
                "threatTypes" => $threatTypes,
                "platformTypes" => $platform_type,
                "threatEntryTypes" => $threatEntryTypes,
                "threatEntries" => ["url" =>  $url_input]
            ]

        );
        $jsondata = json_encode($data_for_safe_api);
        $api_link_with_key = 'https://safebrowsing.googleapis.com/v4/threatMatches:find?key=' . $safe_apikey;

        $validator = Validator::make($request->all(), [
            'link' => "regex:/^[a-z](?:[-a-z0-9\+\.])*:(?:\/\/(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:])*@)?(?:\[(?:(?:(?:[0-9a-f]{1,4}:){6}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|::(?:[0-9a-f]{1,4}:){5}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|(?:[0-9a-f]{1,4})?::(?:[0-9a-f]{1,4}:){4}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|(?:(?:[0-9a-f]{1,4}:){0,1}[0-9a-f]{1,4})?::(?:[0-9a-f]{1,4}:){3}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|(?:(?:[0-9a-f]{1,4}:){0,2}[0-9a-f]{1,4})?::(?:[0-9a-f]{1,4}:){2}(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|(?:(?:[0-9a-f]{1,4}:){0,3}[0-9a-f]{1,4})?::[0-9a-f]{1,4}:(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|(?:(?:[0-9a-f]{1,4}:){0,4}[0-9a-f]{1,4})?::(?:[0-9a-f]{1,4}:[0-9a-f]{1,4}|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3})|(?:(?:[0-9a-f]{1,4}:){0,5}[0-9a-f]{1,4})?::[0-9a-f]{1,4}|(?:(?:[0-9a-f]{1,4}:){0,6}[0-9a-f]{1,4})?::)|v[0-9a-f]+\.[-a-z0-9\._~!\$&'\(\)\*\+,;=:]+)\]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}|(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=])*)(?::[0-9]*)?(?:\/(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@]))*)*|\/(?:(?:(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@]))+)(?:\/(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@]))*)*)?|(?:(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@]))+)(?:\/(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@]))*)*|(?!(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@])))(?:\?(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@])|[\x{E000}-\x{F8FF}\x{F0000}-\x{FFFFD}\x{100000}-\x{10FFFD}\/\?])*)?(?:\#(?:(?:%[0-9a-f][0-9a-f]|[-a-z0-9\._~\x{A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}\x{10000}-\x{1FFFD}\x{20000}-\x{2FFFD}\x{30000}-\x{3FFFD}\x{40000}-\x{4FFFD}\x{50000}-\x{5FFFD}\x{60000}-\x{6FFFD}\x{70000}-\x{7FFFD}\x{80000}-\x{8FFFD}\x{90000}-\x{9FFFD}\x{A0000}-\x{AFFFD}\x{B0000}-\x{BFFFD}\x{C0000}-\x{CFFFD}\x{D0000}-\x{DFFFD}\x{E1000}-\x{EFFFD}!\$&'\(\)\*\+,;=:@])|[\/\?])*)?$/iu",
        ]);



        if ($validator->fails()) {
            $success = 3;
            $message = "provided " . $url . " is not valid url by regex. ";
            return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
        } else {

            if (Str::is('*.*', $url)) {
                $message = "provided " . $url . " need to have atleast 1 .(dots) ";
                return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
            }
        }


        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $success = 3;
            $message = "provided " . $url . " is not valid URL. ";
            return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
        }

        // Separating protocol
        if (Str::startsWith($url, 'https://www.')) {
            $protocol = "https://www.";
        } elseif (Str::startsWith($url, 'http://www.')) {
            $protocol = "http://www.";
        } elseif (Str::startsWith($url, 'https://')) {
            $protocol = "https://";
        } elseif (Str::startsWith($url, 'http://')) {
            $protocol = "http://";
        } else {
            $success = 3;
            $message = "provided " . $url . " should start with http/https:// ";
            return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
        }

        $plain_url = Str::replaceFirst($protocol, '', $url); // strip the protocol

        /*check url already exist in system as it is striped away the protocol so http and https 
        consider as same url if rest content same*/
        try {
            $link = Link::where('originalurl', $plain_url)->first();
        } catch (\Exception $e) {
            $message = " crucial error at database level a. check database server is on 2.env database user credntial is ok 3. Table exist ";
            $success = 4;
            return response()->json(["success" => $success, "message" =>  $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode(500);
        }

        $hashed  = Hash::make($plain_url);                  // plain url's hash value save
        if (!is_null($link)) {
            $current_time = Carbon::now();
            $gapBetweentwocheck = $current_time->diffInSeconds($link->last_check);

            $status_code = 222;  // already exist  
            $full_url = $link->protocol . $link->originalurl;
            $alternative_short_url = $request->baseUrl . "/something/" . $link->shortcode;
            $short_url = $link->short_url;
            $message = "url already exist. ";
            $success = 2;
            $hash_match = $this->hashcheck($link->originalurl, $hashed);
            error_log($hash_match);

            // check safe url api only if user last check 1 hr before
            //otherwise show from database field and update database field as well
            if ($gapBetweentwocheck > 180) {
                try {
                    $response_safe_url_api = Http::accept('application/json')->withBody(
                        $jsondata,
                        'json'
                    )->post($api_link_with_key);
                    $response_data = json_decode($response_safe_url_api, true);

                    // if safe api returned json decoded data empty means it is safe t use    
                    if (empty($response_data)) {
                        $safe = true;
                        $message .= "Url is safe to use. ";
                    } else {
                        $safe = false;
                        $message .= "Url is unsafe to use. ";
                    }
                    // update safe api flag
                    $link->safe = $safe;
                    $link->last_check = $current_time;
                    $link->safe_api_response = $response_data;
                    $link->save();
                    error_log($link->last_check);
                } catch (\Exception $e) {
                    $message .= " crucial error at system level Please check a. internet is working 2.Firewall/anti virus is not making issue for checking safe api. ";
                    $success = 4;
                    $safe = false;
                    return  response()->json(["success" => $success, "message" => $message, "full_url" => $full_url, "short_url" => $short_url, "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
                }
                return  response()->json(["success" => $success, "message" => $message, "full_url" => $full_url, "short_url" => $short_url, "alternative_short_url" => $alternative_short_url, "api_response" => $response_data, "safe" => $safe])->setStatusCode($status_code);
            } else {

                $safe = $link->safe;
                $message .= "showing safe url data from last safe api call at " . $link->last_check;
                if ($safe) {
                    $message .= " Url is safe to use. ";
                    return  response()->json(["success" => $success, "message" => $message, "full_url" => $full_url, "short_url" => $short_url, "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
                } else {
                    $message .= " Url is unsafe to use. ";
                    $response_data = json_decode($link->safe_api_response, true);
                    return  response()->json([
                        "success" => $success, "message" => $message, "full_url" => $full_url, "short_url" => $short_url, "alternative_short_url" => $alternative_short_url, "api_response" => $response_data, "safe" => $safe
                    ])->setStatusCode($status_code);
                }
            }
        }

        // ------- check url is safe or not for creating new url----------

        try {
            $response_safe_url_api = Http::accept('application/json')->withBody(
                $jsondata,
                'json'
            )->post($api_link_with_key);
            $response_data = json_decode($response_safe_url_api, true);

            // if safe api returned json decoded data empty means it is safe t use    
            if (empty($response_data)) {
                $success = 10; // it is still on going
                $safe = true;
                $message .= "Url is safe to use. ";
            } else {
                $success = 0;
                $safe = false;
                $message .= "Url is not safe to use. ";
            }
        } catch (\Exception $e) {
            $message .= "crucial error at system level Please check a. internet is working 2.Firewall/anti virus is not making issue for checking safe api";
            $success = 4;
            $safe = false;
        }
        $errormessage = "";
        $unique_short_code = "";
        $base = 36;
        //$
        if ($success == 4) { // check any other kind of error return
            $status_code = 500;
            if (isset($response_data)) {
                if (array_key_exists("error", $response_data)) {
                    if (array_key_exists("message", $response_data["error"])) {
                        $message .= $response_data["error"]["message"];
                    }
                }
            }
            $full_url = $url_input;
            return response()->json(["success" => $success, "message" => $message,  "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode($status_code);
        } else if ($success == 10 || $success == 0) { // both safe and unsafe will be save

            //----------- if url is safe check url request response status ---------------
            // we will only save the link if there is not 400 , 500+ and text respose status code

            // check url reachable  
            try {
                $response_url_is_working = Http::get($url); // it would be faster to check
            } catch (\Exception $e) {
                $message = " crucial error at system level a. check url is reachable ";
                return response()->json(["success" => $success, "message" =>  $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  null, "safe" => $safe])->setStatusCode(500);
            }


            if ($response_url_is_working->status() == 400) {
                $success = 5;
                $status_code = 200;
                $message .= " Provided " . $url . " returend Bad request ";
                return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  $response_data, "safe" => $safe])->setStatusCode($status_code);
            } elseif ($response_url_is_working->status() > 499) {
                $success = 5;
                $status_code = 200;
                $message .=  " Provided " . $url . " internal server error";
                return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" =>  $response_data, "safe" => $safe])->setStatusCode($status_code);
            } elseif (!is_numeric($response_url_is_working->status())) {
                $success = 5;
                $status_code = 200;
                $message .= " Provided " . $url . " connection failed";
                return response()->json(["success" => $success, "message" => $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url,  "api_response" =>  $response_data, "safe" => $safe])->setStatusCode($status_code);
            }

            $link = new Link;
            $link->short_url = "";
            $link->shortcode = "";
            $link->hashvalue = $hashed; // hash value of original url stripped without protocol
            $link->protocol = $protocol;
            $link->originalurl = $plain_url;
            $link->safe = $safe;
            // $link->errormessage = $errormessage;

            $current_time = Carbon::now();
            $link->last_check = $current_time;
            //$link->safe_api_response=$response_safe_url_api;	
            $link->safe_api_response = $response_safe_url_api->getBody();

            try {
                $link->save();

                // Now using unique row id I will create 6 digit alphanumeric unique code 
                $i = $link->id;  // save items id
                // generating length 6  alphanumeric unique value  from id
                // calling function to generate short code based unique id
                $unique_short_code = $this->convertBase36($i, $base);

                $link->short_url = $request->baseUrl . "/" . $unique_short_code; //as it is api base call need to use passed url from axois 
                $short_url = $link->short_url;
                $link->shortcode =  $unique_short_code;
                $success = $link->save();
            } catch (\Exception $e) {
                $message .= " Error at database level a. check database server is on 2.env database user credntial is ok 3. Table exist " . $e->getMessage();
                $success = 4;
                return response()->json(["success" => $success, "message" =>  $message, "full_url" => $url_input, "short_url" => "", "alternative_short_url" => $alternative_short_url, "api_response" => null, "safe" => $safe])->setStatusCode(500);
            }
            // following value required to show
            $message .= " Successfully generate short url. ";
            $full_url = $link->protocol . $link->originalurl;
            $alternative_short_url = $request->baseUrl . "/something/" . $unique_short_code;
        }

        return response()->json(["success" => $success, "message" => $message, "full_url" => $full_url, "short_url" => $short_url, "alternative_short_url" => $alternative_short_url, "api_response" => $response_data, "safe" => $safe])->setStatusCode($status_code);
    }

    private function hashcheck($originalurl_db, $hashed)
    {
        if (Hash::check($originalurl_db, $hashed)) { //  cecking existinng url from db with inputed url
            $hash_match = true;
            error_log($hash_match);
            return true;
        } else {
            return false;
        }
    }
    // API Call to check whether url is safe or not 

    // generating unique 6 length alphanumeric this will be used for unique code generation
    // following algorithom can cover  26X36X36X36X36X36 unique codes
    private function convertBase36($i, $base)
    {

        $left_first = $i % $base;
        $result = $i / $base;

        $left_second = $result % $base;
        $result = $result / $base;

        $left_third = $result % $base;
        $result = $result / $base;

        $left_fourth = $result % $base;
        $result = $result / $base;

        $left_fifth = $result % $base;
        $result = $result / $base; // left most key

        $res = [];

        $values = array(
            "0", "1", "2", "3", "4",
            "5", "6", "7", "8", "9",
            "A", "b", "C", "d", "E",
            "F", "g", "H", "i", "J",
            "k", "L", "m", "N", "o",
            "P", "q", "R", "s", "T",
            "u", "V", "w", "X", "y",
            "Z",
        );

        // alternate characters are capital in this two array
        //left most not using 0-9 for beauticiation
        //  I,O,l avoided for confusion
        $values_left = array(
            "a", "B", "c", "D",
            "e", "f", "G", "h", "i",
            "j", "K", "L", "M", "n",
            "o", "p", "Q", "r", "S",
            "t", "U", "v", "W", "x",
            "Y", "z"
        );
        $res[0] = $values[$left_first];
        $res[1] = $values[$left_second];
        $res[2] = $values[$left_third];
        $res[3] = $values[$left_fourth];
        $res[4] = $values[$left_fifth];
        $output = '';

        if ($result < $base - 10) { // left most value less than 26 then we assign value 
            $res[5] = $values_left[$result]; // left most set from there
            $output = $res[5] . $res[4] . $res[3] . $res[2] . $res[1] . $res[0];
        } else {
            $res[5] = '';
            $output = '';
        }

        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $message = "";



        if (Str::length(trim($request->hash)) <= 6) { // hash should be 6 
            $LinkObj = Link::where('shortcode', $request->hash)->first();
            if (is_null($LinkObj)) {
                $message = "No such url found";
                $success = 0;
                //   response()->json(["success"=>$success,"linkObj"=> null,'message'=>$message]);
                return view('show', ["message" => $message, "success" => $success]);
            } else {

                $success = 1;
                $full_url = $LinkObj->protocol . $LinkObj->originalurl;
                return redirect()->away($full_url);
            }

            // return view('show',["success"=>$success,"linkObj"=> $LinkObj,'message'=>$message]);

        } else {
            $message = "provide url is not correct";
            $success = 3;
            return view('show', ["message" => $message, "success" => $success]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(link $link)
    {


        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(link $link)
    {
        //
    }
}
