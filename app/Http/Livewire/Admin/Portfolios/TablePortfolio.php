<?php

namespace App\Http\Livewire\Admin\Portfolios;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Portfolio;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class TablePortfolio extends BaseDataTableComponent
{
    protected $model = Portfolio::class;

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
            Column::make("عنوان", "title"),
            BooleanColumn::make("وضعیت", "status"),
            Column::make("اسلاگ", "slug"),
            Column::make('ویرایش', 'slug')
                ->format(
                    fn($value, $row, Column $column) => view('components.modal-edit',
                        ['title' => 'ویرایش', 'value' => $value, 'livewire' => 'admin.portfolios.edit-portfolio', 'param' => 'portfolio', 'id' => 'portfolioEditBlade' . $value])
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
