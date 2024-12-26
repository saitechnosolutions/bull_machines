<?php

namespace App\DataTables;

use App\Models\Panchayat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PanchayatDataTable extends DataTable {
    /**
    * Build the DataTable class.
    *
    * @param QueryBuilder $query Results from query() method.
    */

    public function dataTable( QueryBuilder $query ): EloquentDataTable {
        return ( new EloquentDataTable( $query ) )
        ->setRowId( 'panchayat_id' )
        ->addColumn('country_name', function ($row) {
            return e($row->country_name); // Escaped country name
        })
        ->addColumn('state_name', function ($row) {
            return e($row->state_name); // Escaped country name
        })
        ->addColumn('district_name', function ($row) {
            return e($row->district_name); // Escaped country name
        })
        ->addColumn('panchayat_name', function ($row) {
            // Create clickable HTML for state_name
            return '<a href="#" onclick="handlePanchayatClick(' 
                . $row->panchayat_id . ', \'' 
                . addslashes($row->panchayat_name) . '\', ' 
                . $row->district_id .')">' 
                . e($row->panchayat_name) . '</a>';
        })
        ->rawColumns(['panchayat_name']);
    }

    /**
    * Get the query source of dataTable.
    */

    public function query( Panchayat $model ): QueryBuilder {
        return $model->newQuery()
        ->join( 'countries', 'panchayats.country_id', '=', 'countries.id' )
        ->join( 'states', 'panchayats.state_id', '=', 'states.id' )
        ->join( 'districts', 'panchayats.district_id', '=', 'districts.id' )
        ->select(
            'districts.id as district_id',
            'states.state_name',
            'countries.country_name',
            'states.id as state_id',
            'districts.district_name',
            'districts.id as district_id',
            'panchayats.id as panchayat_id',
            'panchayats.panchayat_name',
        );
    }

    /**
    * Optional method if you want to use the html builder.
    */

    public function html(): HtmlBuilder {
        return $this->builder()
        ->setTableId( 'panchayat-table' )
        ->columns( $this->getColumns() )
        ->minifiedAjax()
        //->dom( 'Bfrtip' )
        ->orderBy( 1 )
        ->selectStyleSingle()
        ->addTableClass('table table-striped table-bordered table-hover')
        ->buttons( [
            Button::make( 'excel' ),
            Button::make( 'csv' ),
            Button::make( 'pdf' ),
            Button::make( 'print' ),
            Button::make( 'reset' ),
            Button::make( 'reload' )
        ] );
    }

    /**
    * Get the dataTable columns definition.
    */

    public function getColumns(): array {
        return [
            // Column::computed( 'action' )
            // ->exportable( false )
            // ->printable( false )
            // ->width( 60 )
            // ->addClass( 'text-center' ),
            Column::make( 'panchayat_id' )->title('ID'),
            Column::make( 'country_name' )->title('Country name'),
            Column::make( 'state_name' )->title('State name'),
            Column::make( 'district_name' )->title('District name'),
            Column::make( 'panchayat_name' )->title('Panchayat name'),
        ];
    }

    /**
    * Get the filename for export.
    */
    protected function filename(): string {
        return 'Panchayat_' . date( 'YmdHis' );
    }
}