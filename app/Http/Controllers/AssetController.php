<?php

namespace App\Http\Controllers;

use App\Model\Asset;
use App\Model\User;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            //Check if the user is an Admin or Not
            $getUserRole = User::with('roles')->where('id', $request->user()->id)->first();

            $getAssets = Asset::with(['groups'])->get();
        }
        catch (\Exception $exception){
            return $this->errorResponse('Operation failed');
        }
    }


}
