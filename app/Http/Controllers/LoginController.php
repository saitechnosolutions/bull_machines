<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {

    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {

    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }

    public function loginIndex() {
        try {
            return view( 'pages.auth.authlayout' );
        } catch ( \Throwable $th ) {
            Log::error( 'Error opening login page', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function login( Request $request ) {
        try {

            $username = $request->userid;
            $password = $request->password;

            $user = User::where( 'emp_login_id', $username )->first();

            if ( $user ) {
                if ( $user->emp_status == 1 ) {
                    $credentials = [
                        'emp_login_id' => $username,
                        'password' => $password,
                    ];

                    if ( Auth::attempt( $credentials ) ) {
                        $user = User::where( 'emp_login_id', $username )->first();
                        Auth::login( $user );

                        // return response()->json( [ 'status'=>'success', 'User Login Successfully', 200 ] );
                        return response()->json( [
                            'status' => 200,
                            'message' => 'Logged in successfully',
                        ], 200 );
                    } else {
                        // return back()->with( 'error', 'Username or Password Incorrect....' );
                        return response()->json( [ 'status'=>'error', 'Invalid Credentials', 500 ] );
                    }
                } else {
                    // return back()->with( 'success', 'User Not Activated...' );
                    return response()->json( [ 'status'=>'error', 'User Not Activated', 500 ] );
                }
            } else {
                // return back()->with( 'success', 'User Not Available...' );
                return response()->json( [ 'status'=>'error', 'User Not Available', 500 ] );
            }

        } catch ( \Throwable $th ) {
            Log::error( 'Error logging in', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function logout( Request $request ) {
        try {

            Auth::logout();

            // Invalidate the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json( [
                'status' => 200,
                'message' => 'Logged out successfully',
            ], 200 );

        } catch ( \Throwable $th ) {

            Log::error( 'Error during logout', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json( [
                'status' => 500,
                'error' => 'An error occurred during logout.',
                'details' => $th->getMessage(),
            ], 500 );
        }
    }

}