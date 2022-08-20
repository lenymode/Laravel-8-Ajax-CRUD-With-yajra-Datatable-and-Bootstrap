<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
 

class UserController extends Controller

{

    public function index(Request $request)

    {

        if ($request->ajax()) {

            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){ 
                        return ' <div class="btn-group">
                           
                           <button class="btn btn-sm btn-info" data-id="'.$row['id'].'">Edit</button>
                           <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deletebtn">Delete</button>
                           
                           </div>';
    
                           
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('users');

    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

}