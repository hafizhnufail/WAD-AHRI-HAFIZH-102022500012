<?php
namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }
    
    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:tabel_data,email',
            'nohp'  => 'required|string|max:20',
            'level' => 'required|in:Basic,Gold,VIP',
        ]);

        Member::create([
            'nama'         => $request->nama,
            'email'        => $request->email,
            'nohp'         => $request->nohp,
            'level_member' => $request->level,
        ]);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:tabel_data,email,' . $member->id,
            'nohp'  => 'required|string|max:20',
            'level' => 'required|in:Basic,Gold,VIP',
        ]);

        $member->update([
            'nama'         => $request->nama,
            'email'        => $request->email,
            'nohp'         => $request->nohp,
            'level_member' => $request->level,
        ]);

        return redirect()->route('members.index')->with('success', 'Data member berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus!');
    }
}