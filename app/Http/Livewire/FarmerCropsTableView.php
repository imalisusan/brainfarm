<?php

namespace App\Http\Livewire;

use App\Models\Farmer;
use App\Models\FarmerCrop;
use App\Actions\DeleteAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class FarmerCropsTableView extends TableView
{
    protected $paginate = 20;

    public $searchBy = ['name', 'amount', 'created_at'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();

        return FarmerCrop::query()->where('farmer_id', $farmer->id);
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Crop Name')->sortBy('crop.name'),
            Header::title('Amount')->sortBy('amount'),
            Header::title('Actions'),
            ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(FarmerCrop $farmercrop): array
    {
        return [
            $farmercrop->crop->name,
            $farmercrop->amount,
            $farmercrop->created_at,
        ];
    }

    protected function actionsByRow()
    {
            return [
                new RedirectAction('farmercrops.show', 'See farmercrop', 'maximize-2'),
                new RedirectAction('farmercrops.edit', 'Edit farmercrop', 'edit-3'),
                new DeleteAction(),
            ];

    }
}
