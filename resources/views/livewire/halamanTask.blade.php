<div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary text-white">Todo App</div>
          <div class="card-body">
            <div class="py-4 px-4 mx-auto container-lg">
              <div class="text-center">
                <div class="row g-0 justify-content-center">
                  <!-- Input Pencarian -->
                  <div class="col-md-8">
                    <div class="input-group">
                      <input type="search"
                        class="form-control border-secondary"
                        placeholder="Search your task"
                        wire:model.live="search"
                        autocomplete="off" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button class="btn btn-primary" wire:click="tambahTask">Tambah Task</button>
            <i wire:loading>Loading ...</i>
            @if ($pillihanMenu == 'tambahTask' || $pillihanMenu == 'editTask')
            <form wire:submit="simpan" autocomplete="off">
              <div class="form-group mt-3">
                <label for="title">Title Todo</label>
                <!-- wire/name -->
                <input type="text" class="form-control" id="title" wire:model="title">
              </div>
              <div class="form-group mt-3">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" wire:model="description"></textarea>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" wire:model="status">
                  <option value="pending">Pending</option>
                  <option value="in_progress">In Progress</option>
                  <option value="completed">Completed</option>
                </select>
              </div>
              <button class="btn btn-primary mt-4" type="submit">Simpan</button>
            </form>
            @endif
            <br>

            <hr />
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title Todo</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $semuatask as $task )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $task->title }}</td>
                  <td>{{ $task->description }}</td>
                  <td>{{ $task->status }}</td>
                  <td>{{ $task->updated_at }}</td>
                  <td>
                    <button class="btn btn-warning" wire:click="editTask({{ $task->id }})">Edit</button>
                    <button class="btn btn-danger" wire:click="hapusTask({{ $task->id }})" wire:confirm='Anda Yakin ???'>Hapus</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>