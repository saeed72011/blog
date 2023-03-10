<?php


namespace App\Http\Livewire\Admin;


use Illuminate\Database\Eloquent\Model;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class BaseDataTableComponent extends DataTableComponent
{
    use LivewireAlert;

    protected $model;
    public $idModal;


    public function configure(): void
    {
        // TODO: Implement configure() method.
    }


    public function columns(): array
    {
        // TODO: Implement columns() method.
    }



    public function sortBase($value, $id)
    {
        $this->validate(['sorts.' . $id => 'nullable|numeric|max:100000']);
        $model = $this->model::query()->find($id);
        $model->update([
            'sort' => $value
        ]);
        $this->alert('success', 'ذخیره شد.', [
            'position' => 'top-start',
            'timer' => 3000,
            'toast' => true,
        ]);
    }


    public function delete($idModel)
    {
        $this->idModal = $idModel;
        $this->confirm('حذف شود؟', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'cancelButtonText' => 'خیر',
            'confirmButtonText' => 'بله',
        ]);
    }


    public function destroy()
    {
        $model = $this->model::query()->find($this->idModal);
        $model->delete();
        $this->alert('warning', 'حذف شد.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
        $this->emitSelf('refresh');
    }


    public function cancelled()
    {
        $this->alert('info', 'تغییری ایجاد نشد.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
