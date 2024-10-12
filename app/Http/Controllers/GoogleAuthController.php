<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use JoelButcher\Socialstream\Http\Controllers\OAuthController;

class GoogleAuthController extends Controller
{
      // Redirect to Google for authentication
      public function redirectToGoogle()
      {
          return Socialite::driver('google')->redirect();
      }
  
      // Handle the callback from Google
      public function handleGoogleCallback(Request $request)
      {
          try {
              // Get the Google user
              $googleUser = Socialite::driver('google')->stateless()->user();
  
              // Update or create the user in your local database
              $user = User::updateOrCreate(
                  ['google_id' => $googleUser->id],
                  [
                      'name' => $googleUser->name,
                      'email' => $googleUser->email,
                      'password' => bcrypt(Str::random(16)), // Hash the password
                      'email_verified_at' => now(), // Mark email as verified
                      'active' => true,
                  ]
              );
  
              // Create a personal team for the user
              $trial_days = null; // Set to a valid date if needed
              $user->ownedTeams()->save(Team::forceCreate([
                  'user_id' => $user->id,
                  'name' => explode(' ', $user->name, 2)[0] . "'s Team",
                  'personal_team' => true,
                  'trial_ends_at' => $trial_days,
              ]));
  
              // Log the user in
              Auth::login($user);
  
              // Redirect to the dashboard
              return redirect('/dashboard');
  
          } catch (\Exception $e) {
              // Handle the error (log it or return an error response)
              return redirect('/login')->withErrors(['error' => 'Authentication failed.']);
          }
      }
}
