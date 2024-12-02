<div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary text-white">Buku</div>

          <div class="card-body">
            <a href="/buku" class="btn btn-primary">Buku</a>
            <a href="/member" class="btn btn-warning">Member</a>
            <a href="/pinjam" class="btn btn-success">Pinjam</a>
            <hr />
            <button class="btn btn-primary" wire:click="tambahBuku">Tambah Buku</button>
            <i wire:loading>Loading ...</i>
            @if ($pillihanMenu == 'tambahBuku' || $pillihanMenu == 'editBuku')
            <form wire:submit="simpan" autocomplete="off">
              <div class="form-group mt-3">
                <label for="judul">Judul buku</label>
                <!-- wire/name -->
                <input type="text" class="form-control" id="judul" wire:model="judul">
              </div>
              <div class="form-group">
                <label for="penulis">Penulis</label>
                <!-- wire/name -->
                <input type="text" class="form-control" id="penulis" wire:model="penulis">
              </div>
              <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <!-- wire/name -->
                <input type="text" class="form-control" id="penerbit" wire:model="penerbit">
              </div>
              <div class="form-group">
                <label for="tahun">Tahun</label>
                <!-- wire/name -->
                <input type="text" class="form-control" id="tahun" wire:model="tahun">
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah Buku</label>
                <!-- wire/name -->
                <input type="text" class="form-control" id="jumlah" wire:model="jumlah">
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
                  <th>Judul Buku</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $semuabuku as $buku )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $buku->judul }}</td>
                  <td>{{ $buku->penulis }}</td>
                  <td>{{ $buku->penerbit }}</td>
                  <td>{{ $buku->tahun }}</td>
                  <td>{{ $buku->jumlah }}</td>
                  <td>
                    <button class="btn btn-warning" wire:click="editBuku({{ $buku->id }})">Edit</button>
                    <button class="btn btn-danger" wire:click="hapusBuku({{ $buku->id }})" wire:confirm='Anda Yakin ???'>Hapus</button>
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