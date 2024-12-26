<?php

namespace App\DataTables;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CountryDataTable extends DataTable {
    /**
    * Build the DataTable class.
    *
    * @param QueryBuilder $query Results from query() method.
    */

    public function dataTable( QueryBuilder $query ): EloquentDataTable {
        return ( new EloquentDataTable( $query ) )
        ->setRowId( 'id' )
        ->addColumn('country_name', function ($row) {
                // Create clickable HTML for country_name
                return '<a href="#" onclick="handleCountryClick(' . $row->id . ', \'' . addslashes($row->country_name) . '\')">' . e($row->country_name) . '</a>';
            })
        ->rawColumns(['country_name']); // Ensure HTML is rendered
    }

    /**
    * Get the query source of dataTable.
    */

    public function query( Country $model ): QueryBuilder {
        // return $model->newQuery();
        return $model->newQuery()->select( 'id', 'country_name' );
    }

    /**
    * Optional method if you want to use the html builder.
    */

    public function html(): HtmlBuilder {
        return $this->builder()
        ->setTableId( 'country-table' )
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
            Column::make( 'id' ),
            Column::make( 'country_name' )->title( 'Country Name' ),
            // Column::computed( 'action' )
            // ->exportable( false )
            // ->printable( false )
            // ->width( 100 )
            // ->addClass( 'text-start' ),
        ];
    }

    /**
    * Get the filename for export.
    */
    protected function filename(): string {
        return 'Country_' . date( 'YmdHis' );
    }
}