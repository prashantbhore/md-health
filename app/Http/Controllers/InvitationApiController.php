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
            ->select('invitation_count')->first()->invitation_count;



        if ($invitation_count >= 0) {
            // Create a new coin status
            $coinStatus = CoinStatus::create([
                'customer_id' => Auth::user()->id,
                'wallet_status' => 'pending_invite',
                'invited_email' => $requestedEmail
            ]);

            // Decrement invite_count by 1
            $invitation = MDCoins::where('status', 'active')
                ->where('customer_id', Auth::user()->id)
                ->first();



            if ($invitation && $invitation->invitation_count > 0) {
                // Decrement the invite_count by 1
                $invitation->decrement('invitation_count');
            }



            $invitationLink = $validatedData['invitation_link'] . '&coin_status_id=' . $coinStatus->id;

            // Send invitation email
            if (Mail::to($requestedEmail)->send(new InvitationMail($invitationLink))) {
                // Email sent successfully
                return response()->json([
                    'status' => 200,
                    'message' => 'Invitation sent successfully.',
                ]);
            } else {
                // Email sending failed

                return response()->json([
                    'status' => 404,
                    'message' => 'Failed to send invitation email.',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'You have reached the invitation limit for this month.',
            ]);
        }
    }


    public function send_invitation_link()
    {
        $code = CustomerRegistration::where('status', 'active')
            ->select('customer_unique_no')
            ->where('id', Auth::user()->id)
            ->first();

        // $invitationLink = 'https://projects.m-staging.in/md-health-testing/user-account?referral_code=' . $code->customer_unique_no;

        $invitationLink = url('user-account') . '?referral_code=' . urlencode($code->customer_unique_no);

        // return response()->json(['invitation_link' => $invitationLink], 200);
        if (!empty($invitationLink)) {
            return response()->json([
                'status' => 200,
                'message' => 'Link found.',
                'invitation_link' => $invitationLink,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Link is not found.',
            ]);
        }
    }

    public function md_customer_coins(Request $request)
    {
        $MDCoins = MDCoins::where('status', 'active')
            ->select('coins')
            ->where('customer_id', Auth::user()->id)
            ->first();

        if (!empty($MDCoins)) {
            return response()->json([
                'status' => 200,
                'message' => 'MD coins found.',
                'data' => $MDCoins,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Coins is empty.',
            ]);
        }
    }


    public function customer_coins_count()
    {
        $your_network_count = CoinStatus::where('customer_id', Auth::user()->id)
            ->where('wallet_status', 'your_network')
            ->count();

        $pending_invite_count = CoinStatus::where('customer_id', Auth::user()->id)
            ->where('wallet_status', 'pending_invite')
            ->count();

        $left_invite_count = MDCoins::where('customer_id', Auth::user()->id)
            ->where('status', 'active')->select('invitation_count')->first();

        if (empty($your_network_count)) {
            return response()->json([
                'status' => 200,
                'message' => 'Here is your coin counts.',
                'your_network_count' => $your_network_count,
                'pending_invite_count' => $pending_invite_count,
                'left_invite_count' => $left_invite_count,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong.',
            ]);
        }
    }
}
