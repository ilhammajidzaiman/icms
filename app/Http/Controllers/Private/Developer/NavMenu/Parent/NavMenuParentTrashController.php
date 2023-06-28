<?php

namespace App\Http\Controllers\Private\Developer\NavMenu\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NavMenu\NavMenuParent;

class NavMenuParentTrashController extends Controller
{
    public function index()
    {
        $data['navMenuParents']         = NavMenuParent::onlyTrashed()->orderByDesc('order')->get();
        return view('private.level.developer.nav-menu.parent.trash', $data);
    }

    public function restore(Request $request, $id)
    {
        // data detail...
        $data['navMenuParent']          = NavMenuParent::onlyTrashed()->where('uuid', $id)->first();
        $message                        = $data['navMenuParent']->name;

        // restore data...
        NavMenuParent::withTrashed()->where('uuid', $id)->restore();

        // flashdata...
        $flashData = [
            'message'                   => 'Data "' . $message . '" dipulihkan!',
            'alert'                     => 'info',
            'icon'                      => 'fa-fw fas fa-recycle',
        ];
        return redirect()->route($request->segment(1) . '.nav-menu.parent.trash.index')->with($flashData);
    }

    public function destroy(Request $request, $id)
    {
        // data detail...
        $data['navMenuParent']          = NavMenuParent::onlyTrashed()->where('uuid', $id)->first();
        $message                        = $data['navMenuParent']->name;

        // delete data on table...
        NavMenuParent::withTrashed()->where('uuid', $id)->forceDelete();

        // flashdata...
        $flashData = [
            'message'                   => 'Data "' . $message . '" dihapus permanen!',
            'alert'                     => 'danger',
            'icon'                      => 'fa-fw fas fa-trash',
        ];
        return redirect()->route($request->segment(1) . '.nav-menu.parent.trash.index')->with($flashData);
    }
}
