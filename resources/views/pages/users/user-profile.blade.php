@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('users.update.profile')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <div class="fw-bolder text-dark">Personal information</div>
                                    <div class="fw-bolder text-dark">User role <span class="fw-bolder text-danger">{{$user->role}}</span></div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Firstname</label>
                                    <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Middlename</label>
                                    <input type="text" class="form-control" value="{{$user->middle_name}}" name="middle_name">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Lastname</label>
                                    <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">sex</label>
                                    <select class="form-control" name="sex">
                                        <option value="" selected disabled>-- choose gender --</option>
                                        <option value="female" {{$user->sex == 'female' ? 'selected':''}}>Female
                                        </option>
                                        <option value="male" {{$user->sex == 'male' ? 'selected':''}}>Male</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Date of Birth</label><!-- validated user cant select more than 18 years -->
                                    <input type="date" class="form-control" value="{{$user->dob}}" max="{{now()->subYears(18)->format('Y-m-d')}}" name="dob">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control" value="{{$user->phone_number}}" name="phone_number">
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{$user->email}}" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div>
                                    <button type="submit" class="btn btn-primary">save changes</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('change.password')}}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="fw-bolder text-dark">Change Password</div>
                                <div class="col-md-4">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div>
                                    <button type="submit" class="btn btn-danger">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
