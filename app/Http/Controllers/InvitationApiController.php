<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use Illuminate\Support\Facades\Auth;
use App\Models\CoinStatus;
use App\Models\MDCoins;
use Carbon\Carbon;

class InvitationApiController extends Controller
{
    // public function sendInvitation(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'requested_email' => 'required|email',
    //         // 'customer_email' => 'required|email',
    //         'invitation_link' => 'required|url',
    //     ]);

    //     $requestedEmail = $validatedData['requested_email'];
    //     $customerEmail = 'mplussoftesting@gmail.com';
    //     $coinStatus = CoinStatus::create([
    //         'customer_id' => Auth::user()->id,
    //         'wallet_status' => 'pending_invite'
    //         ]);

    //     $invitationLink = $validatedData['invitation_link'] . '?coin_status_id=' . $coinStatus->id;

    //   $invitation_count= MDCoins::where('status','active')
    //     ->select('invitation_count')
    //     ->where('customer_id', Auth::user()->id)
    //     ->first();

    //     if (Mail::to($requestedEmail)->send(new InvitationMail($invitationLink))) {
    //         // Email sent successfully
    //         return response()->json(['message' => 'Invitation sent successfully'], 200);
    //     } else {
    //         // Email sending failed
    //         return response()->json(['error' => 'Failed to send invitation email'], 404);
    //     }
    // }



    public function sendInvitation(Request $request)
    {
        $validatedData = $request->validate([
            'requested_email' => 'required|email',
            'invitation_link' => 'required|url',
        ]);

        $requestedEmail = $validatedData['requested_email'];
        $customerEmail = 'mplussoftesting@gmail.com';


        // Check if the customer has reached the invitation limit for the month
        $invitation_count = MDCoins::where('status', 'active')
            ->where('customer_id', Auth::user()->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('invitation_count');

        if ($invitation_count >= 10) {
            return response()->json(['error' => 'You have reached the invitation limit for this month'], 404);
        }

        // Create a new coin status
        $coinStatus = CoinStatus::create([
            'customer_id' => Auth::user()->id,
            'wallet_status' => 'pending_invite'
        ]);

        $invitationLink = $validatedData['invitation_link'] . '?coin_status_id=' . $coinStatus->id;

        // Send invitation email
        if (Mail::to($requestedEmail)->send(new InvitationMail($invitationLink))) {
            // Email sent successfully
            return response()->json(['message' => 'Invitation sent successfully'], 200);
        } else {
            // Email sending failed
            return response()->json(['error' => 'Failed to send invitation email'], 500);
        }
    }


    public function send_invitation_link()
    {
        $code = CustomerRegistration::where('status', 'active')
            ->select('customer_unique_no')
            ->where('id', Auth::user()->id)
            ->first();

        $invitationLink = 'https://projects.m-staging.in/md-health-testing/user-account?referral_code=' . $code->customer_unique_no;

        return response()->json(['invitation_link' => $invitationLink], 200);
    }
}
