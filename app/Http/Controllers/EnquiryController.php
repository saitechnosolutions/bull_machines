<?php

namespace App\Http\Controllers;

use App\DataTables\ApplicationDataTable;
use App\DataTables\HorsepowerDataTable;
use App\DataTables\LeadSourceDataTable;
use App\DataTables\SegmentDataTable;
use App\Models\Application;
use App\Models\Horsepower;
use App\Models\Segment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Termwind\render;

class EnquiryController extends Controller {

    // ===  === SEGMENT ===  === //

    public function segmentIndex( SegmentDataTable $datatable ) {
        try {
            return $datatable->render( 'pages.masters.enquiry.segment' );
        } catch ( \Throwable $th ) {
            Log::error( 'Error opening Segments', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function segmentStore( Request $request ) {
        try {
            $segmentName = $request->segmentName;
            Segment::create( [
                'segment_name'=>$segmentName,
            ] );
            return response()->json( [
                'status' => 200,
                'message' => 'Segment created successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error storing Segments', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function segmentUpdate( Request $request ) {
        try {
            $segmentName = $request->segmentName;
            $segmentID = $request->segmentID;

            $segment = Segment::find( $segmentID );

            $segment->update( [
                'segment_name'=> $segmentName,
            ] );
            return response()->json( [
                'status' => 200,
                'message' => 'Segment Updated successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating Segments', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    //  ===  == APPLICATION ===  == //

    public function applicationIndex( ApplicationDataTable $datatable ) {
        try {
            $segments = Segment::all();
            return $datatable->render( 'pages.masters.enquiry.application', compact( 'segments' ) );
        } catch ( \Throwable $th ) {
            Log::error( 'Error opening Application', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function applicationStore( Request $request ) {
        try {
            $applicationName = $request->applicationName;
            $segment = $request->segment;

            Application::create( [
                'application_name'=>$applicationName,
                'segment_id'=>$segment,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Application created successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error storing Application', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function applicationUpdate( Request $request ) {
        try {
            $applicationName = $request->applicationName;
            $segmentId = $request->segmentId;
            $applicationId = $request->applicationId;

            $application = Application::find( $applicationId );

            $application->update( [
                'application_name'=>$applicationName,
                'segment_id'=>$segmentId,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Application updated successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating Application', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    // ===  === HORSEPOWER ===  === //

    public function horsepowerindex( HorsepowerDataTable $datatable ) {
        try {
            return $datatable->render( 'pages.masters.enquiry.horsepower' );
        } catch ( \Throwable $th ) {
            Log::error( 'Error opening Horsepower', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function horsepowerStore( Request $request ) {
        try {
            $horsepowerName = $request->horsepowerName;

            Horsepower::create( [
                'horsepower_name'=>$horsepowerName,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Horsepower created successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error creating Horsepower', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function horsepowerUpdate( Request $request ) {
        try {

            $horsepowerName = $request->horsepowerName;
            $horsepowerID = $request->horsepowerID;

            $horsepower = Horsepower::find( $horsepowerID );

            $horsepower->update( [
                'horsepower_name'=>$horsepowerName,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Horsepower updated successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating Horsepower', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    // ===  == LEADSOURCE ===  == //

    public function leadsourceindex( LeadSourceDataTable $datatable ) {
        try {
            return $datatable->render( 'pages.masters.enquiry.leadsource' );
        } catch ( \Throwable $th ) {
            Log::error( 'Error opening leadsource', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

}