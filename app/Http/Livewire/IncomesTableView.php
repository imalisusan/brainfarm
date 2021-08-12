<?php

namespace App\Http\Livewire;

use App\Models\Farmer;
use App\Models\Income;
use App\Actions\DeleteAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class IncomesTableView extends TableView
{
    protected $paginate = 20;

    public $searchBy = ['date', 'amount', 'description'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
        return Income::query()->where('farmer_id', $farmer->id);
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Date')->sortBy('date'),
            Header::title('Amount')->sortBy('amount'),
            Header::title('Description')->sortBy('description'),
            Header::title('Farmer')->sortBy(''),
            Header::title('Actions'),
            ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Income $income): array
    {
        return [
            $income->date,
            $income->amount,
            $income->description,
            $income->farmer->name,
        ];
    }

    protected function actionsByRow()
    {
            return [
                new RedirectAction('incomes.show', 'See income', 'maximize-2'),
                new RedirectAction('incomes.edit', 'Edit income', 'edit'),
                new DeleteAction(),
            ];

    }
}
