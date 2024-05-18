@extends('layouts1.app')
@section('contents')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Form Tambah User</h3>
        
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav
          aria-label="breadcrumb"
          class="breadcrumb-header float-start float-lg-end"
        >
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Form Tambah User
            </li>
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
            <h4 class="card-title">Form Tambah User</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST" class="form" data-parsley-validate>
                @csrf
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group mandatory">
                      <label for="first-name-column" class="form-label">Username</label>
                      <input type="text" id="first-name-column" class="form-control" placeholder="Username" name="name" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column" class="form-label">Email</label>
                      <input type="email" id="email-id-column" class="form-control" placeholder="Email" name="email" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="password-column" class="form-label">Password</label>
                      <input type="password" id="password-column" class="form-control" placeholder="Password" name="password" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="role-column" class="form-label">Role</label>
                      <select id="role-column" class="form-select" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="status-column" class="form-label">Status</label>
                      <select id="status-column" class="form-select" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
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
