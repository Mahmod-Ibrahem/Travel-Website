<?php

namespace Modules\Booking\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Modules\Booking\Entities\TourBooking;
use Modules\Booking\Transformers\BookingListResource;
use Modules\Booking\Transformers\BookingResource;

class BookingController extends Controller
{
    public function index()
    {
        $search = request('search');
        $perPage = request('perPage', 20);
        $bookings = TourBooking::query()
            ->orderBy('date', 'asc')
            ->orderBy('created_at', 'desc');

        if ($search) {
            $bookings->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%");
            });
        }
        return BookingListResource::collection($bookings->paginate($perPage));
    }

    public function show(string $id)
    {
        $booking = TourBooking::with('tour')->find($id);
        return $booking ? new BookingResource($booking) : response()->json(['message' => 'Booking not found'], 404);
    }

    public function update(Request $request, string $id)
    {
        $booking = TourBooking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $data = $request->all();

        if (isset($data['date'])) {
            $date = new DateTime($data['date']);
            $data['date'] = $date->modify('+1 day')->format('Y-m-d');
        }

        $booking->update($data);

        return response()->json([
            'message' => 'Booking updated successfully',
            'data' => new BookingResource($booking)
        ], 200);
    }

    public function destroy(string $id)
    {
        $booking = TourBooking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully'], 200);
    }
}
