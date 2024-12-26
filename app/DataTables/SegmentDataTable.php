<?php

namespace App\DataTables;

use App\Models\Segment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SegmentDataTable extends DataTable {
    /**
    * Build the DataTable class.
    *
    * @param QueryBuilder $query Results from query() method.
    */

    public function dataTable( QueryBuilder $query ): EloquentDataTable {
        return ( new EloquentDataTable( $query ) )
        ->setRowId( 'id' )
        ->addIndexColumn()
        ->addColumn('segment_name', function ($row) {
                // Create clickable HTML for state_name
                return '<a href="#" onclick="handleSegmentClick(' 
                    . $row->id . ', \'' 
                    . addslashes($row->segment_name) . '\',)">' 
                    . e($row->segment_name) . '</a>';
            })
        ->rawColumns(['segment_name']);
    }

    /**
    * Get the query source of dataTable.
    */

    public function query( Segment $model ): QueryBuilder {
        return $model->newQuery();
    }

    /**
    * Optional method if you want to use the html builder.
    */

    public function html(): HtmlBuilder {
        return $this->builder()
        ->setTableId( 'segment-table' )
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
            Column::make( 'segment_name' ),
        ];
    }

    /**
    * Get the filename for export.
    */
    protected function filename(): string {
        return 'Segment_' . date( 'YmdHis' );
    }
}