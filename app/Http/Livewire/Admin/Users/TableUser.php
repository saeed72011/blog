<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use App\Models\Role;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TableUser extends BaseDataTableComponent
{
    protected $model = User::class;
    protected $listeners = [
        'refresh' => '$refresh',
        'destroy', 'cancelled'
    ];


    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function columns(): array
    {
        return [
            Column::make("َشناسه", "id"),
            Column::make("نام", "name")->searchable(),
            Column::make("ایمیل", "email")->searchable(),
            Column::make('ویرایش', 'id')
                ->format(
                    fn($value, $row, Column $column) => view('components.modal-edit',
                        ['title' => 'ویرایش', 'value' => $value, 'livewire' => 'admin.users.edit-user', 'param' => 'user', 'id' => 'userEditBlade' . $value])

                ),
            Column::make("حذف", "id")
                ->format(
                    fn($value, $row, Column $column) => "<button class='btn btn-sm btn-outline-danger' wire:click='delete($row->id)'>
                                                            <i class='bx bx-trash'></i>
                                                            </button>"
                )
                ->html()
        ];
    }

}
