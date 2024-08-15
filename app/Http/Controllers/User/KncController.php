<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Notification;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class KncController extends Controller
{
    /**
     * Show the KYC form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.knc', ['page' => 'knc.index']);
    }

    /**
     * Handle the KYC form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Get the user ID from cookies
        $userId = Cookie::get('id');

        // Find the user by ID
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            return back()->with('Error', 'User not found');
        }

        if (Hash::check($request->password, $user->password)) {
            // Check if both files are uploaded
            if ($request->hasFile('identityCard') && $request->hasFile('closeUpPhoto')) {
                // Get the files
                $identity = $request->file('identityCard');
                $closeUp = $request->file('closeUpPhoto');

                // Generate filenames
                $filenameIdentity = 'identity-card-' . $user->username . '-' . time() . '.' . $identity->extension();
                $filenameCloseUp = 'close-up-' . $user->username . '-' . time() . '.' . $closeUp->extension();

                // Store files
                $identity->storeAs('public/identity-card', $filenameIdentity);
                $closeUp->storeAs('public/close-up', $filenameCloseUp);

                // Update the profile with new file paths and address
                Profile::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'closeUpPhoto' => $filenameCloseUp,
                        'identityCard' => $filenameIdentity,
                    ]
                );

                $user->status = 'pending';
                $user->save();

                Notification::create('Account Actived', 'Account Success Activated');

                return back()->with('success', 'Verification Proccess');
            }
            // If files are not uploaded
            return back()->with('error', 'Verification Error, Files not found');
        }

        return back()->with('error', 'Password wrong');
    }
}
