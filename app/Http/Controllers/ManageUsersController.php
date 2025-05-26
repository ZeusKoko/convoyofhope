<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;


class ManageUsersController extends Controller
{
    public function users()
    {
        $users = User::where('usertype', 'user')->get();
        return view('manage-users.users', compact('users'));
    }

    public function role()
    {
        $users = User::whereIn('usertype', ['admin', 'staff'])->get();
        return view('manage-users.role', compact('users'));
    }

    public function index()
    {
        return view('manage-users.index');
    }

    public function admin()
    {
        return view('admin.index');
    }

    // User registration
    public function createUser()
    {
        return view('manage-users.register-user', ['type' => 'user']);
    }

    public function storeUser(Request $request)
   {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'phone' => 'required', // add validation
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone, 
        'password' => bcrypt($request->password),
        'usertype' => 'user',
    ]);

    return redirect()->back()->with('success', 'User registered.');
}

   //staff reg protection
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'phone' => 'required|string',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' =>bcrypt($request->password),
        'usertype' => 'staff', // Force staff role here
    ]);

    return redirect()->back()->with('success', 'Staff user created successfully.');
}





    //export docx
    public function exportUsersToWord()
{
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    $section->addText('User List', ['bold' => true, 'size' => 16]);

    // Optional: Table headers
    $table = $section->addTable();
    $table->addRow();
    $table->addCell()->addText('Name');
    $table->addCell()->addText('Email');
    $table->addCell()->addText('User Type');

    $users = User::all();

    foreach ($users as $user) {
        $table->addRow();
        $table->addCell()->addText($user->name);
        $table->addCell()->addText($user->email);
        $table->addCell()->addText($user->usertype ?? 'N/A');
    }

    // Save to temporary file
    $fileName = 'user-list.docx';
    $tempFile = storage_path($fileName);
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($tempFile);

    // Return download response
    return response()->download($tempFile)->deleteFileAfterSend(true);
}
}
