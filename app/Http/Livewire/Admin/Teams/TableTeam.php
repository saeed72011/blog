<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Team;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class TableTeam extends BaseDataTableComponent
{
    protected $model = Team::class;

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
            Column::make("شناسه", "id"),
            Column::make("سمت", "position"),
            Column::make("نام و نام خانوادگی", "name"),
            Column::make("تصویر", "image")->hideIf(true),
            ImageColumn::make("تصویر", "image")
                ->location(
                    fn($row) => assetFile($row->image)
                ),
            Column::make("ترتیب", "sort"),
            BooleanColumn::make("وضعیت", "status"),
            Column::make("آقا/خانوم", "gender")
                ->format(
                    fn($value, $row, Column $column) => Team::GENDER_FA[$value]
                )
                ->html(),
            Column::make('ویرایش', 'id')
                ->format(
                    fn($value, $row, Column $column) => view('components.modal-edit',
                        ['title' => 'ویرایش', 'value' => $value, 'livewire' => 'admin.teams.edit-team', 'param' => 'team', 'id' => 'teamEditBlade' . $value])

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
