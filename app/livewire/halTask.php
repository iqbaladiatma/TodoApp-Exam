<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class halTask extends Component
{
  public $pillihanMenu;
  public $task_edit;
  public $title;
  public $description;
  public $status = 'pending';
  public $search = '';

  public function tambahTask()
  {
    $this->pillihanMenu = 'tambahTask';
  }
  public function simpan()
  {
    // biar kalo simpan diedit ngga nambah baru.
    if ($this->task_edit) {
      $simpan = $this->task_edit;
    } else {
      $simpan = new Task();
    }

    $simpan->title = $this->title;
    $simpan->description = $this->description;
    $simpan->status = $this->status;
    $simpan->save();
    $this->reset();
  }

  public function hapusTask($id)
  {
    Task::destroy($id);
  }
  public function editTask($id)
  {
    $this->task_edit = Task::find($id);
    $this->title = $this->task_edit->title;
    $this->description = $this->task_edit->description;
    $this->status = $this->task_edit->status;
    $this->pillihanMenu = 'editTask';
  }
  public function render()
  {
    return view('livewire.halamanTask')->with([
      'semuatask' => Task::filter(['search' => $this->search])->get(),
    ]);
  }
}
