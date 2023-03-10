<?php

namespace App\Http\Livewire\Admin\Socials;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Social;

class TableSocial extends BaseDataTableComponent
{
    protected $model = Social::class;

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
            Column::make("شماره", "id"),
            Column::make("عنوان", "title"),
            Column::make("آیکون", "icon")
                ->format(
                    fn($value, $row, Column $column) => "<i class='$value'> </i>"

                )
                ->html(),
            Column::make("آدرس", "url"),
            Column::make('ویرایش', 'id')
                ->format(
                    fn($value, $row, Column $column) => view('components.modal-edit',
                        ['title' => 'ویرایش', 'value' => $value, 'livewire' => 'admin.socials.edit-social', 'param' => 'social', 'id' => 'socialEditBlade' . $value])

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
