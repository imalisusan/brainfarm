<?php

namespace App\Http\Livewire;

use App\Models\Farmer;
use App\Actions\DeleteAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;


class SuspendedAccountsTableView extends TableView
{
    protected $paginate = 20;

    public $searchBy = ['name', 'email', 'phone', 'address', 'created_at'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Farmer::query()->where('status', "Suspended");
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
            Header::title('Email')->sortBy('email'),
            Header::title('Phone')->sortBy('phone'),
            Header::title('Address')->sortBy('address'),
            Header::title('Joined')->sortBy('created_at'),
            Header::title('Actions'),
            ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Farmer $farmer): array
    {
        return [
            $farmer->name,
            $farmer->email,
            $farmer->phone,
            $farmer->address,
            $farmer->created_at,
        ];
    }

    protected function actionsByRow()
    {
            return [
                new RedirectAction('farmers.approve', 'Approve farmer', 'check-square'),
                new RedirectAction('farmers.show', 'See farmer', 'maximize-2'),
                new RedirectAction('farmers.edit', 'Edit farmer', 'edit-3'),
                new DeleteAction(),
            ];

    }
}
