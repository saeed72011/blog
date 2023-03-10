<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Http\Livewire\Admin\BaseDataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Comment;

class TableComment extends BaseDataTableComponent
{
    protected $model = Comment::class;

    public $status;

    protected $listeners = [
        'refresh' => '$refresh',
        'destroy', 'cancelled'
    ];


    public function mount()
    {
        $this->status = Comment::query()->pluck('status', 'id')->toArray();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function updatedStatus($value, $id)
    {
        $this->validate(['status.' . $id => 'required|boolean']);
        $model = $this->model::query()->find($id);
        $model->update([
            'status' => $value
        ]);
        $this->alert('success', 'ذخیره شد.', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("شناسه", "id"),
            Column::make("نام(بازدید کننده)", "name"),
            Column::make("مقاله", "article.slug"),
            Column::make("متن", "desc"),
            Column::make("وضعیت", "status")
                ->format(
                    fn($value, $row, Column $column) => 'فعال' . '<input type="radio" class="form-control-sm " value="' . 1 . '" wire:model="status.' . $row->id . '" >' .
                        'غیر فعال' . '<input type="radio" class="form-control-sm" value="' . 0 . '" wire:model="status.' . $row->id . '" >'
                )
                ->html(),
            Column::make("تاریخ ارسال", "created_at"),
            Column::make("حذف", "id")
                ->format(
                    fn($value, $row, Column $column) => "<button class='btn btn-sm btn-outline-danger' wire:click='delete($row->id)'>
                                                            <i class='fa fa-trash'></i>
                                                            </button>"
                )
                ->html()
        ];
    }
}
