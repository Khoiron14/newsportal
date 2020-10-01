<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestWriter;
use App\User;
use App\Video;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']); 
    }

    public function index()
    {
        $requests = RequestWriter::all();
        $videos = Video::all();

        return view('admin.index', compact('requests', 'videos'));
    }

    public function acceptWriter(User $user)
    {
        $user->assignRole('writer');
        $user->requestWriter()->delete();

        return redirect()->back();
    }

    public function declineWriter(User $user)
    {
        $user->requestWriter()->delete();

        return redirect()->back();
    }
}
