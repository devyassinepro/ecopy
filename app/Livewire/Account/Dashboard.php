<?php

namespace App\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Stripe;
use App\Models\stores;
use App\Models\Storeuser;
use App\Models\Product;
use App\Models\Team;
use App\Models\User;
use App\Models\Shopifystores;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{

    public function render()
    {

        if (!(currentTeam()->Subscribed('default') || currentTeam()->onTrial())) {
            $this->redirect('/plans'); 
        }

        $user_id = Auth::user()->id;
        $storelimit = check_store_limit();
        // get user's stores
        // $totalstores = Storeuser::where('user_id', $user_id)->pluck('store_id');

        // $stores = Shopifystores::where('user_id', '=', $user_id)->get();
        $stores = Shopifystores::where('user_id', $user_id)
                                    //   ->where('status', 'active')
                                      ->get();
        $totalstores = Shopifystores::where('user_id', $user_id)->count();

        return view('livewire.account.dashboard',compact('stores','storelimit','totalstores'));
    }
}
