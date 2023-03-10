<?php

namespace App\Http\Livewire\Admin\Messages;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Message;

class TableMessage extends BaseDataTableComponent
{
    protected $model = Message::class;

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
            Column::make("شناسه", "id")
                ->sortable(),
            Column::make("عنوان", "title")
                ->sortable(),
            Column::make("نام فرستنده", "name")
                ->sortable(),
            Column::make("توضیحات", "desc")
                ->sortable(),
            Column::make("تاریخ ارسال", "created_at")
                ->sortable(),
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
