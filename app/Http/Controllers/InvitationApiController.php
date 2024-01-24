<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use Illuminate\Support\Facades\Auth;

class InvitationApiController extends Controller
{
    public function sendInvitation(Request $request)
    {

        $validatedData = $request->validate([
            'requested_email' => 'required|email',
            // 'customer_email' => 'required|email',
            'invitation_link' => 'required|url',
        ]);

        $requestedEmail = $validatedData['requested_email'];
        $customerEmail = 'mplussoftesting@gmail.com';
        $invitationLink = $validatedData['invitation_link'];

        if (Mail::to($requestedEmail)->send(new InvitationMail($invitationLink))) {
            // Email sent successfully
            return response()->json(['message' => 'Invitation sent successfully'], 200);
        } else {
            // Email sending failed
            return response()->json(['error' => 'Failed to send invitation email'], 404);
        }
    }

    public function send_invitation_link()
    {
        $code = CustomerRegistration::where('status', 'active')
            ->where('id', Auth::user()->id)
            ->first();

        $invitationLink = 'https://projects.m-staging.in/md-health-testing/';

        return response()->json(['invitation_link' => $invitationLink], 200);
    }
}
