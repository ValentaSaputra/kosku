<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private TransactionRepositoryInterface $tranasctionRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        TransactionRepositoryInterface $tranasctionRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->tranasctionRepository = $tranasctionRepository;
    }
    
    public function booking(Request $request, $slug)
    {
        $this->tranasctionRepository->saveTransactionDataToSession($request->all());

        return redirect()->route('booking.information', $slug);
    }

    public function information($slug)
    {
        $transaction = $this->tranasctionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room_id']);

        return view('pages.booking.information', compact('transaction', 'boardingHouse', 'room'));
    }
   

    public function check()
    {
        return view('pages.check-booking');
    }
}
