<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Slider;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class TableSlider extends BaseDataTableComponent
{
    protected $model = Slider::class;

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
            Column::make("تصویر", "image")->hideIf(true),
            ImageColumn::make("تصویر", "image")
                ->location(
                    fn($row) => assetFile($row->image)
                ),
            Column::make("آدرس", "url"),
            Column::make("عنوان", "title"),
            Column::make("توضحات", "desc"),
            Column::make('ویرایش', 'id')
                ->format(
                    fn($value, $row, Column $column) => view('components.modal-edit',
                        ['title' => 'ویرایش', 'value' => $value, 'livewire' => 'admin.sliders.edit-slider', 'param' => 'slider', 'id' => 'sliderEditBlade' . $value])

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
