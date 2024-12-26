<?php

namespace App\DataTables;

use App\Models\Dealer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DealerDataTable extends DataTable {
    /**
    * Build the DataTable class.
    *
    * @param QueryBuilder $query Results from query() method.
    */

    public function dataTable( QueryBuilder $query ): EloquentDataTable {
        return ( new EloquentDataTable( $query ) )
        ->setRowId( 'id' )
        ->addIndexColumn()
        ->addColumn('dealer_name', function ($row) {
                // Create clickable HTML for state_name
                return '<a href="#" onclick="handleDealerClick(' 
                    . $row->id . ', \'' 
                    . addslashes($row->dealer_name) . '\',)">' 
                    . e($row->dealer_name) . '</a>';
            })
        ->rawColumns(['dealer_name']);
    }

    /**
    * Get the query source of dataTable.
    */

    public function query( Dealer $model ): QueryBuilder {
        return $model->newQuery();
    }

    /**
    * Optional method if you want to use the html builder.
    */

    public function html(): HtmlBuilder {
        return $this->builder()
        ->setTableId( 'dealer-table' )
        ->columns( $this->getColumns() )
        ->minifiedAjax()
        //->dom( 'Bfrtip' )
        ->orderBy( 1 )
        ->selectStyleSingle()
        ->addTableClass( 'table table-striped table-bordered table-hover text-start' )
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
            // Column::make( 'id' ),
            Column::computed( 'DT_RowIndex' )->title( 'S.No' ),
            Column::make( 'dealer_name' ),
            // Column::make( 'created_at' ),
            // Column::make( 'updated_at' ),
        ];
    }

    /**
    * Get the filename for export.
    */
    protected function filename(): string {
        return 'Dealer_' . date( 'YmdHis' );
    }
}