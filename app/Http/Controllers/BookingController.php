<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Tour\Entities\Tour;

class BookingController extends Controller
{

    public function index(Tour $tour, Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
                $secretKey = config('services.recaptcha.secret_key');
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$value}");
                $responseKeys = json_decode($response, true);
                if (intval($responseKeys["success"]) !== 1) {
                    $fail('The google recaptcha verification failed.');
                }
            }],
        ]);

        $userData = $request->all();    
        $numPerson =
            (int)($userData['Adult'] ?? 0);

        if ($numPerson > 0 && $numPerson < 2) {
            $price = (int)$tour->price_per_person;
            $userData['totalPrice'] = $this->CalculateTotalPrice($price, $userData);
            $userData['price'] = $price;
        } else if ($numPerson > 1 && $numPerson < 6) {
            $price = (int)$tour->price_two_five;
            $userData['totalPrice'] = $this->CalculateTotalPrice($price, $userData);
            $userData['price'] = $price;
        } else {
            $price = (int)$tour->price_six_twenty;
            $userData['totalPrice'] = $this->CalculateTotalPrice($price, $userData);
            $userData['price'] = $price;
        }
        return view('checkout', compact('tour', 'userData'));
    }

    public function confirm(Tour $tour, Request $request)
    {
        $data = $request->input('userData');
        $tourType = $tour->group;
        $tour = $tour->load(['category'])->toArray();
        Mail::to('mahmodaborakika2@gmail.com')->send(new \App\Mail\TourBookingMail($data, $tour));
        Mail::to($data['email'])->send(new \App\Mail\InformUserForBookingMail());

        $text = "Your Tour Is Booked!";
        $thanks = "Thanks For Booking With Us";
        $route = $tourType . '.' . 'index';

        return view('landing.Responding', compact('text', 'thanks', 'route'));
    }

    private function CalculateTotalPrice($price, $userData)
    {
        return $userData['Adult'] * $price + ($userData['Children_under_12'] * +$price + $userData['students'] * $price) * 0.5;
    }
}
