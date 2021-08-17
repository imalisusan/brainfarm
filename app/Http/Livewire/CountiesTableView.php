<?php

namespace App\Http\Livewire;


use App\Models\County;
use App\Actions\DeleteAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class CountiesTableView extends TableView
{
    protected $paginate = 20;

    public $searchBy = ['name', 'created_at'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return County::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('County code')->sortBy('id'),
            Header::title('Name')->sortBy('name'),
            Header::title('Actions'),
            ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(County $county): array
    {
        return [
            $county->id,
            $county->name,
        ];
    }

    protected function actionsByRow()
    {
            return [
                new RedirectAction('counties.show', 'See crop', 'maximize-2'),
                new RedirectAction('counties.edit', 'Edit crop', 'edit-3'),
                new DeleteAction(),
            ];

    }
}