<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', ['owners' => $owners]);
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(OwnerRequest $request)
    {
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->user_id = $request->user()->id;
        $owner->save();
        return redirect()->route('owners.index');
    }

    public function edit(Owner $owner, Request $request)
    {
        if (!$request->user()->can('modifyOwner', $owner)) {
            return redirect()->route('owners.index');
        }
        return view('owners.edit', ['owner' => $owner]);
    }

    public function update(OwnerRequest $request, Owner $owner)
    {
        if (!$request->user()->can('modifyOwner', $owner)) {
            return redirect()->route('owners.index');
        }
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('owners.index');
    }

    public function destroy(Owner $owner, Request $request)
    {
        if (!$request->user()->can('modifyOwner', $owner)) {
            return redirect()->route('owners.index');
        }
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
