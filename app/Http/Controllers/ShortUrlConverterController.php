<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortUrlConverterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Function to list all records
     */
    public function getAllShortUrl() {
        try {
            //Get top 100 records
            $data['urls'] = ShortUrl::orderBy('hit_count', 'DESC')
                                        ->take(100)
                                        ->paginate(10);
            //Render view to show records
            return view('url-convert.index', $data);
        } catch (\Exception $exception) {
            //Handel exception
            return redirect()->to('url-convert')->with('failure', $exception->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show the form
     */
    public function createUrlConvert() {
        try{
            //Render the form
            return view('url-convert.convert-url');
        }catch (\Exception $exception){
            //Handel exception
            return redirect()->to('url-convert')->with('failure', $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\RedirectResponse
     * Save the record
     */
    public function saveUrlConvert(Request $request) {
        try {
            //Get form values
            $longUrl = $request->url_value;
            //Encrypt the url
            $shortUrl = substr(md5($longUrl.mt_rand()),0,8);
            //Check if url is exist in id db or not
            $urlCount = ShortUrl::where('long_url', $longUrl)
                                    ->orWhere('short_url', $shortUrl)
                                    ->count();
            if($urlCount > 0) {
                //Redirect if url is already exist in db
                return redirect()->to('url-convert')->with('failure', 'URL already exist');
            }else{
                //Create new, if url doesn't exist
                $urlObj = new ShortUrl();
                $urlObj->long_url = $longUrl;
                $urlObj->short_url = $shortUrl;
                //Save record in db
                if($urlObj->save()){
                    //Redirect with success message
                    return redirect()->to('url-convert')->with('success', 'URL saved');
                }
            }
        }catch (\Exception $exception) {
            //Handel exception
            return redirect()->to('url-convert')->with('failure', $exception->getMessage());
        }
    }

    /**
     * @param $url
     * @return \Illuminate\Http\RedirectResponse
     * This function is used to get encoded url and redirect to respective url
     */
    public function getUrl($url) {
        try {
            //Get url from db based on encoded url
            $urlObj = ShortUrl::where('short_url', $url)->first(['id', 'long_url']);
            //Get actual url if record found
            if (count($urlObj) > 0) {
                //When user hit the url the hit the counter value by one
                DB::table('short_urls')->where('id', $urlObj->id)->increment('hit_count', 1);
                //Redirect to respective url
                return redirect()->to($urlObj->long_url);
            } else {
                //Show failure message
                return redirect()->to('/')->with('failure', 'Invalid url');
            }
        } catch (\Exception $exception) {
            //Handel exception
            return redirect()->to('url-convert')->with('failure', $exception->getMessage());
        }
    }
}
