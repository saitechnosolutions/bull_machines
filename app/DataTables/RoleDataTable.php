<?php

namespace App\DataTables;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable {
    /**
    * Build the DataTable class.
    *
    * @param QueryBuilder $query Results from query() method.
    */

    public function dataTable( QueryBuilder $query ): EloquentDataTable {
        return ( new EloquentDataTable( $query ) )
        ->setRowId( 'id' )
        ->addColumn('name', function ($row) {
                // Create clickable HTML for state_name
                return '<a href="#" onclick="handleRoleNameClick(' 
                    . $row->id . ', \'' 
                    . addslashes($row->name) . '\',)">' 
                    . e($row->name) . '</a>';
            })
        ->addColumn('assign_permission', function ($row) {
            // Add Assign Permission button
            return '<button class="btn btn-dark" onclick="assignPermissionTrigger(' 
            . $row->id . ', \'' . addslashes($row->name) . '\')">Assign / Edit Permission</button>';
        })    
        ->rawColumns(['name','assign_permission']);
    }

    /**
    * Get the query source of dataTable.
    */

    public function query( Role $model ): QueryBuilder {
        return $model->newQuery();
    }

    /**
    * Optional method if you want to use the html builder.
    */

    public function html(): HtmlBuilder {
        return $this->builder()
        ->setTableId( 'role-table' )
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
            //       ->exportable( false )
            //       ->printable( false )
            //       ->width( 60 )
            //       ->addClass( 'text-center' ),
            Column::make( 'id' ),
            Column::make( 'name' ),
            Column::computed( 'assign_permission' )
                  ->exportable( false )
                  ->printable( false )
                  ->width( 150 )
                  ->addClass( 'text-center' ),
        ];
    }

    /**
    * Get the filename for export.
    */
    protected function filename(): string {
        return 'Role_' . date( 'YmdHis' );
    }
}