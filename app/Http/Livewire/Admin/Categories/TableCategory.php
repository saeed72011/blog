<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class TableCategory extends BaseDataTableComponent
{
    protected $model = Category::class;
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
                        ['title' => 'ویرایش', 'value' => $value, 'livewire' => 'admin.categories.edit-category', 'param' => 'category', 'id' => 'categoryEditBlade' . $value])

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
