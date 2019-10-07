<?php
namespace App\Observers;
use App\Notifications\AbsensiItem;

use App\Absensi;
use App\User;

class AbsensiObserver
{
    public function created(Absensi $absensi)
    {
        $author = $absensi->user;
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new AbsensiItem($absensi,$author));
        }
    }
}
