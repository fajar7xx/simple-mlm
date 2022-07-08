<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
// use App\Http\Requests\UpdatememberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->cari;
        $wildSearch = "%$search%";

        $query = Member::query()->with(['downline', 'upline']);

        $query->when($search, function ($q) use ($wildSearch) {
            $q->where('nama', 'LIKE', $wildSearch)
                ->orWhere('nomor_telepon', 'LIKE', $wildSearch)
                ->orWhere('no_id', 'LIKE', $wildSearch);
        });

        $members = $query->get();
        // return $members;
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uplines = Member::has('downline', '<', 2)->get();
        return view('members.create', compact('uplines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorememberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $member = Member::create([
            'no_id'         => $request->noid,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'nomor_telepon' => $request->telepon,
            'member_id'     => $request->upline
        ]);

        return redirect()->route('members.index')->with('success', 'Member has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return $member->load('upline', 'downline');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatememberRequest  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
