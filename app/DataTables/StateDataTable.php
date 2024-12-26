<?php

namespace App\DataTables;

use App\Models\State;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StateDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->setRowId('id')
        ->addColumn('country_name', function ($row) {
            return e($row->country_name); // Escaped country name
        })
        ->addColumn('state_name', function ($row) {
            // Create clickable HTML for state_name
            return '<a href="#" onclick="handleStateClick(' 
                . $row->id . ', \'' 
                . addslashes($row->state_name) . '\', ' 
                . $row->country_id . ')">' 
                . e($row->state_name) . '</a>';
        })
        ->rawColumns(['state_name']); // Ensure HTML is rendered
            
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(State $model): QueryBuilder
    {
        // return $model->newQuery();
        return $model->newQuery()
        ->join('countries', 'states.country_id', '=', 'countries.id')
        ->select('states.id', 'states.state_name', 'countries.country_name', 'states.country_id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('state-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->addTableClass('table table-striped table-bordered table-hover')
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('id'),
            Column::make('country_name')->title('Country Name'),
            Column::make('state_name')->title('State Name'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'State_' . date('YmdHis');
    }
}