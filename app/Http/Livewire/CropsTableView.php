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
            Header::title('Lowest Temp')->sortBy('lowest_temperature'),
            Header::title('Highest Temp')->sortBy('highest_temperature'),
            Header::title('Lowest Humidity')->sortBy('lowest_humidity'),
            Header::title('Highest Humidity')->sortBy('highest_humidity'),
            Header::title('Lowest Atmospheric Pressure')->sortBy('lowest_atmospheric_pressure'),
            Header::title('Highest Atmospheric Pressure')->sortBy('highest_atmospheric_pressure'),
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
            $crop->lowest_temperature,
            $crop->highest_temperature,
            $crop->lowest_humidity,
            $crop->highest_humidity,
            $crop->lowest_atmospheric_pressure,
            $crop->highest_atmospheric_pressure,
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
