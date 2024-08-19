<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlistId)
    {
        $wishlistId = Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        //session()->flash('message','Wishlist Item Removed Successfully');
        $this->emit('wishistAddedUpdated');
        $this->dispatchBrowserEvent('message',
        ['text'=> 'Wishlist Item Removed Successfully',
        'type'=> 'success',
        'status' => 200
    ]);
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
}
