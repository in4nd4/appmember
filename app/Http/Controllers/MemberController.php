<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // jumlah data yang ditampilkan per paginasi halaman
        $maxData = 8;

        if (request('search')) {
            // menampilkan pencarian data
            $members = Member::select('id', 'category_id', 'full_name', 'profile_picture')->with('category:id,name')
                ->where('full_name', 'LIKE', '%' . request('search') . '%')
                ->paginate($maxData)
                ->withQueryString();
        } else {
            // menampilkan semua data
            $members = Member::select('id', 'category_id', 'full_name', 'profile_picture')->with('category:id,name')
                ->latest()
                ->paginate($maxData);
        }

        // tampilkan data ke view
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // get data kategori
        $categories = Category::get(['id', 'name']);

        // tampilkan form add data
        return view('members.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validasi form
        $request->validate([
            'category'        => 'required|exists:categories,id',
            'join_date'       => 'required',
            'full_name'       => 'required',
            'gender'          => 'required|in:Male,Female',
            'address'         => 'required',
            'email'           => 'required|email|unique:members',
            'phone_number'    => 'required|max:13|unique:members',
            'profile_picture' => 'required|image|mimes: jpeg,jpg,png|max: 1024'
        ]);

        // upload profile picture
        $profile_picture = $request->file('profile_picture');
        $profile_picture->storeAs('public/members', $profile_picture->hashName());

        // create data
        Member::create([
            'category_id'     => $request->category,
            'join_date'       => $request->join_date,
            'full_name'       => $request->full_name,
            'gender'          => $request->gender,
            'address'         => $request->address,
            'email'           => $request->email,
            'phone_number'    => $request->phone_number,
            'profile_picture' => $profile_picture->hashName()
        ]);

        // redirect ke halaman index dan tampilkan pesan berhasil simpan data
        return redirect()->route('members.index')->with(['success' => 'The new member has been saved.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // get data by ID
        $member = Member::findOrFail($id);

        // tampilkan form detail data
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        // get data member by ID
        $member = Member::findOrFail($id);
        // get data kategori
        $categories = Category::get(['id', 'name']);

        // tampilkan form edit data
        return view('members.edit', compact('member', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // validasi form
        $request->validate([
            'category'        => 'required|exists:categories,id',
            'join_date'       => 'required',
            'full_name'       => 'required',
            'gender'          => 'required|in:Male,Female',
            'address'         => 'required',
            'email'           => 'required|email|unique:members,email,' . $id,
            'phone_number'    => 'required|max:13|unique:members,phone_number,' . $id,
            'profile_picture' => 'image|mimes: jpeg,jpg,png|max: 1024'
        ]);

        // get data by ID
        $member = Member::findOrFail($id);

        // cek jika profile picture diubah
        if ($request->hasFile('profile_picture')) {
            // upload profile picture baru
            $profile_picture = $request->file('profile_picture');
            $profile_picture->storeAs('public/members', $profile_picture->hashName());

            // delete profile picture lama
            Storage::delete('public/members/' . $member->profile_picture);

            // update data
            $member->update([
                'category_id'     => $request->category,
                'join_date'       => $request->join_date,
                'full_name'       => $request->full_name,
                'gender'          => $request->gender,
                'address'         => $request->address,
                'email'           => $request->email,
                'phone_number'    => $request->phone_number,
                'profile_picture' => $profile_picture->hashName()
            ]);
        }
        // jika profile picture tidak diubah
        else {
            // update data
            $member->update([
                'category_id'     => $request->category,
                'join_date'       => $request->join_date,
                'full_name'       => $request->full_name,
                'gender'          => $request->gender,
                'address'         => $request->address,
                'email'           => $request->email,
                'phone_number'    => $request->phone_number
            ]);
        }

        // redirect ke halaman index dan tampilkan pesan berhasil ubah data
        return redirect()->route('members.show', $member->id)->with(['success' => 'The member has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        // get data by ID
        $member = Member::findOrFail($id);

        // delete profile picture
        Storage::delete('public/members/' . $member->profile_picture);

        // delete data
        $member->delete();

        // redirect ke halaman index dan tampilkan pesan berhasil hapus data
        return redirect()->route('members.index')->with(['success' => 'The member has been deleted!']);
    }
}