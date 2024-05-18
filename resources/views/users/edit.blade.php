@extends('layouts1.app')
@section('contents')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Form Edit User</h3>
        
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Edit User</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <!-- Basic multiple Column Form section start -->
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card" style="margin-top: 30px;">
          <div class="card-header">
            <h4 class="card-title">Form Edit User</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form action="{{ route('user.update', $user->id) }}" method="POST" class="form" data-parsley-validate>
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group mandatory">
                      <label for="first-name-column" class="form-label">Username</label>
                      <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="name" value="{{ $user->name }}" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column" class="form-label">Email</label>
                      <input type="email" id="email-id-column" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="password-column" class="form-label">Password</label>
                      <input type="password" id="password-column" class="form-control" placeholder="Password" name="password">
                      <small class="text-muted">Isi hanya jika ingin mengubah password.</small>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="role-column" class="form-label">Role</label>
                      <select id="role-column" class="form-select" name="role" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="kasir" {{ $user->role === 'kasir' ? 'selected' : '' }}>Kasir</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="status-column" class="form-label">Status</label>
                      <select id="status-column" class="form-select" name="status" required>
                        <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Basic multiple Column Form section end -->
</div>
@endsection
