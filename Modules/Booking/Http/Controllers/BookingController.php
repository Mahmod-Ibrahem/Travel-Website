<?php


namespace Modules\Booking\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Booking\Http\Requests\BookingRequest;
use Modules\Tour\Entities\Tour;
use Modules\PayPal\Services\PayPalService;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Modules\Booking\Entities\TourBooking;

class BookingController extends Controller
{
    public function store(BookingRequest $request, PayPalService $paypalService)
    {
        $data = $request->validated();
        $tour = Tour::findOrFail($data['tour_id']);

        $data['price_per_adult'] = $this->determinePriceBasedOnPeopleCount($data['adult'], $tour);
        $totalPrice = $this->calculateTotalPrice($data['price_per_adult'], $data['adult'], $data['children']);

        $data['total_price'] = $totalPrice;
        $data['date'] = (new DateTime($data['date']))->modify('+1 day')->format('Y-m-d');

        if ($data['payment_method'] === 'paypal') {
            return $this->handlePayPalPayment($paypalService, $totalPrice, $tour);
        }
        $this->createBooking($data, $tour);
        // Optional: Uncomment if you want to notify
        // Mail::to($data['email'])->send(new \App\Mail\InformUserForBookingMail());
        return view('booking::success', [
            'text' => 'Your tour is booked! We will contact you soon',
            'thanks' => 'Thanks For Booking With Us',
        ]);
    }

    private function calculateTotalPrice(float $pricePerAdult, int $adults, int $children): float
    {
        return ($adults * $pricePerAdult) + ($children * $pricePerAdult * 0.5);
    }

    private function determinePriceBasedOnPeopleCount(int $count, Tour $tour): float
    {
        return match (true) {
            $count < 2 => (float)$tour->price_per_person,
            $count <= 5 => (float)$tour->price_two_five,
            default => (float)$tour->price_six_twenty,
        };
    }

    private function createBooking(array $data, Tour $tour): void
    {
        TourBooking::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'adult' => $data['adult'],
            'children' => $data['children'],
            'country' => $data['country'],
            'hotel' => $data['hotel'],
            'total_price' => $data['total_price'],
            'tour_id' => $tour->id,
            'date' => $data['date'],
        ]);
    }

    private function handlePaypalPayment(PaypalService $paypalService, float $totalPrice, Tour $tour)
    {
        $purchaseUnit = $this->formatPaypalPurchaseUnit($totalPrice, $tour);
        $response = $paypalService->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => redirect()->back()->getTargetUrl(),
            ],
            "purchase_units" => $purchaseUnit,
        ]);

        if (isset($response['id'])) {
            return redirect()->to(($response['links'][1]['href']));
        }
        return redirect()->back()->with('error', 'Something went wrong try again');
    }

    private function formatPaypalPurchaseUnit(float $totalPrice, Tour $tour): array
    {
        return
            [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($totalPrice, 2, '.', ''),
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "USD",
                                "value" => number_format($totalPrice, 2, '.', ''),
                            ],
                        ],
                    ],
                    "items" => [
                        [
                            "name" => $tour->title,
                            "quantity" => 1,
                            "unit_amount" => [
                                "currency_code" => "USD",
                                "value" => number_format($totalPrice, 2, '.', ''),
                            ],
                        ],
                    ],
                ]
            ];
    }
}
