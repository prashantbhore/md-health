<?php

namespace App\Http\Controllers\Front\MedicalProvider;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller {
    public function __construct( ApiService $apiService ) {
        $this->apiService = $apiService;
    }

    public function index() {
        $token = Session::get( 'login_token' );
        $apiUrl1 = url( '/api/md-provider-system-user-list' );
        $body = null;
        $method = 'GET';

        $responseData = $this->apiService->getData( $token, $apiUrl1, $body, $method );
        // dd( $responseData );
        $system_users = $responseData[ 'system_user' ];
        $html = '';

        foreach ( $system_users as $system_user ) {
            $html .= '<div class="roles-card df-start w-100 mb-3" id="div_' . $system_user[ 'id' ] . '">';
            $html .= '<h6 class="mb-0">' . ( !empty( $system_user[ 'email' ] ) ? $system_user[ 'email' ] : '' ) . '| ' . ( !empty( $system_user[ 'role_name' ] ) ? $system_user[ 'role_name' ] : '' ) . '</h6>';
            $html .= ' <div class="roles-card-footer">';
            $html .= '<a href="' . url( 'edit-role/' . Crypt::encrypt( $system_user[ 'id' ] ) ) . '" class="mt-auto view-detail-btn">';
            $html .= '<svg width="19" height="19" viewBox="0 0 19 19" fill="none"xmlns="http://www.w3.org/2000/svg">';
            $html .= ' <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1099 3.4397C18.2009 3.5779 18.2415 3.74329 18.2248 3.90793C18.208 4.07258 18.1349 4.22639 18.0179 4.34341L9.20793 13.1524C9.11781 13.2425 9.00535 13.307 8.8821 13.3393L5.21264 14.2976C5.09134 14.3293 4.96388 14.3286 4.84291 14.2958C4.72194 14.2629 4.61166 14.199 4.52302 14.1104C4.43438 14.0217 4.37046 13.9114 4.33762 13.7905C4.30477 13.6695 4.30413 13.542 4.33577 13.4207L5.2941 9.75224C5.32207 9.64212 5.37485 9.53985 5.44839 9.45324L14.2909 0.616451C14.4257 0.481853 14.6084 0.40625 14.7988 0.40625C14.9893 0.40625 15.172 0.481853 15.3068 0.616451L18.0179 3.32662C18.0523 3.36112 18.0831 3.39901 18.1099 3.4397ZM16.4932 3.83453L14.7988 2.14116L6.63577 10.3042L6.03681 12.5975L8.3301 11.9986L16.4932 3.83453Z" fill="#111111" />';
            $html .= ' <path d="M16.3712 14.6963C16.6331 12.4576 16.7167 10.2016 16.6213 7.94965C16.6192 7.89659 16.6281 7.84368 16.6474 7.79421C16.6667 7.74475 16.696 7.69979 16.7334 7.66215L17.6764 6.71915C17.7022 6.69323 17.7349 6.67531 17.7706 6.66754C17.8063 6.65976 17.8435 6.66246 17.8777 6.67532C17.9119 6.68817 17.9417 6.71063 17.9634 6.74C17.9852 6.76936 17.998 6.80439 18.0003 6.84086C18.1778 9.51579 18.1105 12.2014 17.7991 14.864C17.5729 16.8018 16.0166 18.3207 14.0875 18.5364C10.7384 18.9072 7.35866 18.9072 4.00962 18.5364C2.08145 18.3207 0.524161 16.8018 0.297994 14.864C-0.0993313 11.4671 -0.0993313 8.0355 0.297994 4.63861C0.524161 2.70086 2.08049 1.1819 4.00962 0.966274C6.55147 0.684411 9.11248 0.61613 11.6657 0.762149C11.7023 0.764772 11.7373 0.777813 11.7667 0.799727C11.796 0.82164 11.8185 0.851508 11.8314 0.885793C11.8443 0.920079 11.8471 0.957345 11.8395 0.993179C11.8319 1.02901 11.8141 1.06191 11.7884 1.08798L10.8368 2.03865C10.7995 2.07578 10.755 2.10489 10.7061 2.12417C10.6571 2.14346 10.6047 2.15251 10.5522 2.15077C8.42155 2.07835 6.28849 2.16002 4.16966 2.39515C3.55052 2.46368 2.97256 2.73893 2.52914 3.17643C2.08572 3.61394 1.80274 4.18815 1.72591 4.80632C1.34167 8.09179 1.34167 11.4108 1.72591 14.6963C1.80274 15.3145 2.08572 15.8887 2.52914 16.3262C2.97256 16.7637 3.55052 17.039 4.16966 17.1075C7.38487 17.4669 10.7122 17.4669 13.9284 17.1075C14.5475 17.039 15.1255 16.7637 15.5689 16.3262C16.0123 15.8887 16.2943 15.3145 16.3712 14.6963Z" fill="#111111" />';
            $html .= '</svg> </a>';
            $html .= '<a href="#" onclick="delete_role(\'' . $system_user['id'] . '\')" class="mt-auto view-detail-btn">';
            $html .= '<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">';
            $html .= '<path d="M7.57433 12.2245L10.0497 9.75M10.0497 9.75L12.5242 7.2755M10.0497 9.75L7.57433 7.2755M10.0497 9.75L12.5242 12.2245M10.0488 18.5C14.8815 18.5 18.7988 14.5826 18.7988 9.75C18.7988 4.91738 14.8815 1 10.0488 1C5.2162 1 1.29883 4.91738 1.29883 9.75C1.29883 14.5826 5.2162 18.5 10.0488 18.5Z" stroke="#F24E1E" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round" />';
            $html .= '</svg></a></div></div>';

        }
        if ( $html == '' ) {
            $html = "<div class='no-data'>No Data Available</div>";
        }

        return view( 'front/mdhealth/medical-provider/medical-roles', compact( 'html' ) );
    }

    public function roles_add( Request $request ) {
        $token = Session::get( 'login_token' );
        // dd( $request );
        if ( empty( $request->id ) ) {
            $apiUrl = url( '/api/md-provider-add-system-user' );
        } else {
            $apiUrl = url( '/api/md-provider-update-system-user' );
        }

        $method = 'post';
        $body = $request->all();

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        // dd( $responseData );
        if ( ( $responseData[ 'status' ] == '200' ) ) {
            return redirect( '/medical-roles' )->with( 'success', $responseData[ 'message' ] );
        } else {
            return redirect( '/medical-roles' )->with( 'error', $responseData[ 'message' ] );
        }
    }

    public function edit_role( Request $request ) {
        $token = Session::get( 'login_token' );

        $apiUrl = url( '/api/md-provider-system-user-edit' );
        $encryptedId = $request->id;
        $decryptedId = Crypt::decrypt( $encryptedId );
        $body = [ 'id' => $decryptedId ];
        $method = 'POST';

        $responseData = $this->apiService->getData( $token, $apiUrl, $body, $method );
        // dd( $responseData );
        $system_users = $responseData[ 'system_user' ];

        $token = Session::get( 'login_token' );
        $apiUrl1 = url( '/api/md-provider-system-user-list' );
        $body1 = null;
        $method1 = 'GET';

        $responseData = $this->apiService->getData( $token, $apiUrl1, $body1, $method1 );
        // dd( $responseData );
        $system_userslist = $responseData[ 'system_user' ];
        $html = '';

        foreach ( $system_userslist as $system_user ) {
            $html .= '<div class="roles-card df-start w-100 mb-3" id="div_' . $system_user[ 'id' ] . '">';
            $html .= '<h6 class="mb-0">' . ( !empty( $system_user[ 'email' ] ) ? $system_user[ 'email' ] : '' ) . '| ' . ( !empty( $system_user[ 'role_name' ] ) ? $system_user[ 'role_name' ] : '' ) . '</h6>';
            $html .= ' <div class="roles-card-footer">';
            $html .= '<a href="' . url( 'edit-role/' . Crypt::encrypt( $system_user[ 'id' ] ) ) . '" class="mt-auto view-detail-btn">';
            $html .= '<svg width="19" height="19" viewBox="0 0 19 19" fill="none"xmlns="http://www.w3.org/2000/svg">';
            $html .= ' <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1099 3.4397C18.2009 3.5779 18.2415 3.74329 18.2248 3.90793C18.208 4.07258 18.1349 4.22639 18.0179 4.34341L9.20793 13.1524C9.11781 13.2425 9.00535 13.307 8.8821 13.3393L5.21264 14.2976C5.09134 14.3293 4.96388 14.3286 4.84291 14.2958C4.72194 14.2629 4.61166 14.199 4.52302 14.1104C4.43438 14.0217 4.37046 13.9114 4.33762 13.7905C4.30477 13.6695 4.30413 13.542 4.33577 13.4207L5.2941 9.75224C5.32207 9.64212 5.37485 9.53985 5.44839 9.45324L14.2909 0.616451C14.4257 0.481853 14.6084 0.40625 14.7988 0.40625C14.9893 0.40625 15.172 0.481853 15.3068 0.616451L18.0179 3.32662C18.0523 3.36112 18.0831 3.39901 18.1099 3.4397ZM16.4932 3.83453L14.7988 2.14116L6.63577 10.3042L6.03681 12.5975L8.3301 11.9986L16.4932 3.83453Z" fill="#111111" />';
            $html .= ' <path d="M16.3712 14.6963C16.6331 12.4576 16.7167 10.2016 16.6213 7.94965C16.6192 7.89659 16.6281 7.84368 16.6474 7.79421C16.6667 7.74475 16.696 7.69979 16.7334 7.66215L17.6764 6.71915C17.7022 6.69323 17.7349 6.67531 17.7706 6.66754C17.8063 6.65976 17.8435 6.66246 17.8777 6.67532C17.9119 6.68817 17.9417 6.71063 17.9634 6.74C17.9852 6.76936 17.998 6.80439 18.0003 6.84086C18.1778 9.51579 18.1105 12.2014 17.7991 14.864C17.5729 16.8018 16.0166 18.3207 14.0875 18.5364C10.7384 18.9072 7.35866 18.9072 4.00962 18.5364C2.08145 18.3207 0.524161 16.8018 0.297994 14.864C-0.0993313 11.4671 -0.0993313 8.0355 0.297994 4.63861C0.524161 2.70086 2.08049 1.1819 4.00962 0.966274C6.55147 0.684411 9.11248 0.61613 11.6657 0.762149C11.7023 0.764772 11.7373 0.777813 11.7667 0.799727C11.796 0.82164 11.8185 0.851508 11.8314 0.885793C11.8443 0.920079 11.8471 0.957345 11.8395 0.993179C11.8319 1.02901 11.8141 1.06191 11.7884 1.08798L10.8368 2.03865C10.7995 2.07578 10.755 2.10489 10.7061 2.12417C10.6571 2.14346 10.6047 2.15251 10.5522 2.15077C8.42155 2.07835 6.28849 2.16002 4.16966 2.39515C3.55052 2.46368 2.97256 2.73893 2.52914 3.17643C2.08572 3.61394 1.80274 4.18815 1.72591 4.80632C1.34167 8.09179 1.34167 11.4108 1.72591 14.6963C1.80274 15.3145 2.08572 15.8887 2.52914 16.3262C2.97256 16.7637 3.55052 17.039 4.16966 17.1075C7.38487 17.4669 10.7122 17.4669 13.9284 17.1075C14.5475 17.039 15.1255 16.7637 15.5689 16.3262C16.0123 15.8887 16.2943 15.3145 16.3712 14.6963Z" fill="#111111" />';
            $html .= '</svg> </a>';
            $html .= '<a href="#" onclick="delete_role(\'' . $system_user['id'] . '\', \'deactive\')" class="mt-auto view-detail-btn">';
            $html .= '<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">';
            $html .= '<path d="M7.57433 12.2245L10.0497 9.75M10.0497 9.75L12.5242 7.2755M10.0497 9.75L7.57433 7.2755M10.0497 9.75L12.5242 12.2245M10.0488 18.5C14.8815 18.5 18.7988 14.5826 18.7988 9.75C18.7988 4.91738 14.8815 1 10.0488 1C5.2162 1 1.29883 4.91738 1.29883 9.75C1.29883 14.5826 5.2162 18.5 10.0488 18.5Z" stroke="#F24E1E" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round" />';
            $html .= '</svg></a></div></div>';

        }
        if ( $html == '' ) {
            $html = "<div class='no-data'>No Data Available</div>";
        }

        return view( 'front/mdhealth/medical-provider/medical-roles', compact( 'html', 'system_users' ) );
    }
}
