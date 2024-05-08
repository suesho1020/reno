<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\User;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DateTime;

class AdminGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $guest_list = Guest::get();
        return view('admin.guest_list', compact('guest_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.guest_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Guest();
        $post->name = $request->input('name');
        $post->company_name = $request->input('company_name');
        $post->email = $request->input('email');
        $post->password = Hash::make($request->input('password'));
        $post->save();

        return redirect(route('admin.guest.index'))->with('success', '更新しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $guest = Guest::find($id);
        return view('admin.guest_edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Guest::find($id);
        $post->name = $request->input('name');
        $post->company_name = $request->input('company_name');
        $post->email = $request->input('email');
        if(isset($request->password) && $request->password != '') {
            $post->password = Hash::make($request->input('password'));
        }
        $post->save();

        return redirect(route('admin.guest.index'))->with('success', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $achievement = Achievement::find($id);
        $name = $achievement->target_name;
        $achievement->delete();

        return response()->json(['name' => $name]);
    }

    public function updateSort(Request $request)
    {
        //
        $id_list = $request->id_list;
        if($id_list != '') {
            $id_array = explode(',', $id_list);
            $sort = 1;
            foreach($id_array as $row) {
                $obj = Achievement::find($row);
                $obj->sort = $sort;
                $obj->save();
                $sort++;
            }
        }
        return true;
    }
}
