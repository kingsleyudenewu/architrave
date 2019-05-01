<?php

namespace App\Http\Controllers;

use App\Model\Asset;
use App\Model\Group;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            if($getUserRole->roles[0]->name == 'Admin'){
                $getAssets = User::with(['groups', 'groups.assets'])->get();
                return $this->successResponse('success', $getAssets);
            }
            else{
                $getAssets = User::with('groups.assets')->where('id', $request->user()->id)->first();
                return $this->successResponse('success', $getAssets);
            }

        }
        catch (\Exception $exception){
            return $this->errorResponse('Operation failed');
        }
    }


}
