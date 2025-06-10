<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;


class DonationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'national_id'  => 'required',
            'nationality'  => 'required',
            'event_id'     => 'required|exists:events,id',
            'amount'       => 'required|numeric|min:1',
            
        ]);

        Donation::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'national_id' => $request->national_id,
            'nationality' => $request->nationality,
            'event_id'    => $request->event_id,
            'amount'      => $request->amount,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Thank you! Your donation was received successfully.');

    }
   
public function event()
{
    return $this->belongsTo(\App\Models\Event::class);
}

}
