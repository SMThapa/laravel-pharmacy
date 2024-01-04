@extends('auth.layouts.app')
@section('content')

<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="{{url('public/AdminPanel/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">Pharmacy</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">
                @include('layout._message')
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                  <p class="text-center small">Enter new Password</p>
                </div>

                <form method="post" action="{{url('reset/'.$token)}}" class="row g-3 needs-validation" novalidate>
                  @csrf()

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required value="{{old('password')}}">
                    <span style="color: red;">{{$errors->first('password')}}</span>
                    <div class="invalid-feedback">Password cannot be empty.</div>
                  </div>
                  <div class="col-12">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                    <span style="color: red;">{{$errors->first('confirm_password')}}</span>
                    <div class="invalid-feedback">Password cannto be empty.</div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                  </div>
                  {{-- <div class="col-6">
                      <p class="small mb-0"> <a class="small" href="{{url('register')}}">Create an account</a></p>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
</main><!-- End #main -->  

@endsection
