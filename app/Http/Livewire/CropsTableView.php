<?php

namespace App\Http\Livewire;


use App\Models\Crop;
use App\Actions\DeleteAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class CropsTableView extends TableView
{
    protected $paginate = 20;

    public $searchBy = ['name', 'description', 'created_at'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Crop::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Name')->sortBy('name'),
            Header::title('Description')->sortBy('description'),
            Header::title('Joined')->sortBy('created_at'),
            Header::title('Actions'),
            ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Crop $crop): array
    {
        return [
            $crop->name,
            $crop->description,
            $crop->created_at,
        ];
    }

    protected function actionsByRow()
    {
            return [
                new RedirectAction('crops.show', 'See crop', 'maximize-2'),
                new RedirectAction('crops.edit', 'Edit crop', 'edit-3'),
                new DeleteAction(),
            ];

    }
}
