<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Mail\ReservationAccept;
use App\Mail\ReservationAdmin;
use Illuminate\Support\Facades\Mail;
use App\User;
class ReservationController extends Controller
{
   public function create() {
     return view('reservation.create');
   }
   public function store(StoreReservationRequest $request) {
     $reservation = new Reservation();
     $reservation->user_id = $request->user()->id;
     $reservation->person_count = $request->person_count;
     $reservation->time = $request->time;
     $reservation->date = $request->date;
     $reservation->save();
     Mail::to($request->user())->send(new ReservationAccept($reservation));
     // Mail::to('tomas.aukstolis@gmail.com')->send(new ReservationAdmin($reservation));
     return redirect('/')->with(['message'=>'Reservation successful']);
   }

}
