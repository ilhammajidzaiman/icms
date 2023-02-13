<?php

namespace App\Http\Controllers\Private\SuperAdmin;

use App\Models\UserMenu;
use App\Models\UserLevel;
use App\Models\UserAccess;
use Illuminate\Http\Request;
use App\Models\UserAccessChild;
use App\Http\Controllers\Controller;

class UserAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'levels'        => UserLevel::orderBy('id')->get(),
        ];
        return view('private.menu-access.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/superadmin/master/access');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/superadmin/master/access');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAccess $userAccess
     * @return \Illuminate\Http\Response
     */
    public function show(UserLevel $access)
    {
        $data = [
            'level'         => $access,
        ];
        return view('private.menu-access.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAccess $userAccess
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLevel $access)
    {
        $data = [
            'level'         => $access,
            'menus'         => UserMenu::where('parent_id', 0)->orderBy('order')->get(),
        ];
        return view('private.menu-access.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAccess $userAccess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLevel $access)
    {
        return redirect('/superadmin/master/access');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAccess $userAccess
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAccess $access)
    {
        return redirect('/superadmin/master/access');
    }

    public function updateParent($id1, $id2, $id3)
    {
        $userAccess = UserAccess::where('level_id', $id1)->where('menu_id', $id2)->where('order', $id3)->first();
        if ($userAccess) :
            UserAccess::where('level_id', $id1)->where('menu_id', $id2)->where('order', $id3)->delete();
        else :
            $data =
                [
                    'level_id'      => $id1,
                    'menu_id'       => $id2,
                    'order'         => $id3,
                ];
            UserAccess::create($data);
        endif;
    }

    public function updateChild($id1, $id2, $id3)
    {
        $userChild = UserAccessChild::where('menu_id', $id1)->where('child_id', $id2)->where('order', $id3)->first();
        if ($userChild) :
            UserAccessChild::where('menu_id', $id1)->where('child_id', $id2)->where('order', $id3)->delete();
        else :
            $data =
                [
                    'menu_id'       => $id1,
                    'child_id'      => $id2,
                    'order'         => $id3,
                ];
            UserAccessChild::create($data);
        endif;
    }
}
