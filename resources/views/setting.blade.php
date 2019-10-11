@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
  <div class="profile-wrepper" style="padding: 0">
    <div class="content">
      <section class="section">
        <div class="section-header">
          <h1>Setting</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/profile') }}">Profile</a></div>
            <div class="breadcrumb-item">Setting</div>
          </div>
        </div>

        <div class="section-body">
          <h2 class="section-title">Hi, {{ $user->name }}!</h2>
          <p class="section-lead">
            Selamat datang di halaman pengaturan kak.
          </p>
          <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <form enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Photo</label>
                      <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" id="customFile" @if(isset($user)) value="{{ $user->gambar }}" @endif>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      {{-- <label>Photo</label>
                      <input type="file" name="gambar" class="form-control" @if(isset($user)) value="{{ $user->gambar }}" @endif> --}}
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" required="" @if(isset($user)) value="{{ $user->name }}" @endif>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required="" @if(isset($user)) value="{{ $user->email }}" @endif>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="status" class="form-control" @if(isset($user)) value="{{ $user->status }}" @endif>
                    </div>
                    <div class="form-group mb-0">
                      <label>Bio</label>
                      <textarea class="form-control" name="bio">{{ $user->bio }}</textarea>
                    </div>

                    <div class="form-group">
                      <p class="text-danger mt-4"><code>* Jika tidak ingin ganti password, kosongkan saja</code></p>
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Verify Password</label>
                      <input type="password" name="password2" class="form-control">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
  </div>
  </div>
  @endsection