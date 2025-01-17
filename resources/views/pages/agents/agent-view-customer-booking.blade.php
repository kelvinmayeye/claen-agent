@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="bg-light border border-secondary border-opacity-25 p-2 rounded d-inline-block mt-1">
                                <div class="d-flex justify-content-between">
                                    <input type="hidden" id="bookingno" value="{{$customerBooking->id}}">
                                    <h6 class="small text-dark fw-bolder">Booking number: {{$customerBooking->id}}</h6>
                                    <h6 class="small text-dark-emphasis fw-bolder">Booking Status: <span class="{{$customerBooking->status == 'expired'?'text-danger-emphasis':''}}">{{strtoupper($customerBooking->status)}}</span></h6>
                                </div>
                                <div class="d-sm-flex align-items-center">
                                    <div class="avatar avatar-xs flex-shrink-0">
                                        <img class="avatar-img rounded-circle" src="{{asset('assets/images/users/3.jpg')}}" width="40px" height="40px" alt="avatar">
                                    </div>
                                    <h6 class="mb-0 ms-2">{{$customerBooking->customer_name}}</h6>
                                </div>
                                <div class="hstack gap-4 gap-md-5 flex-wrap mt-2">
                                    <div>
                                        <small>Date:</small>
                                        <h6 class="fw-normal mb-0">{{$customerBooking->date}}</h6>
                                    </div>
                                    <div>
                                        <small>Time:</small>
                                        <h6 class="fw-normal mb-0">{{$customerBooking->time}}</h6>
                                    </div>
                                    <div>
                                        <small>Place:</small>
                                        <h6 class="text-success mb-0">{{$customerBooking->place}}</h6>
                                    </div>
                                </div>
                                <div class="vstack">
                                    <div><span class="small text-primary-emphasis fw-bold">Customer Descriptions</span></div>
                                    <p>{{$customerBooking->description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div><span class="fw-bolder fs-4">Booked Services</span></div>
                            <div class="table-responsive border-0">
                                <table class="table table-sm align-middle p-2 mb-0 table-hover table-bordered">
                                    <thead class="table-dark">
                                    <tr>
                                        <th style="width: 20px;" scope="col" class="border-0 rounded-start">#</th>
                                        <th scope="col" class="border-0">Service</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0 rounded-end"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=1)
                                    @foreach($customerBooking->service as $s)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$s->service_name}}</td>
                                            <td>{{$s->status}}</td>
                                            <td>&nbsp;</td>
                                            @if($customerBooking->status === 'confirmed')
                                            <td>
                                                @if($s->status !== 'attended')
                                                    <button class="btn btn-sm btn-success" data-bookingid="{{$s->id}}"
                                                            title="mark as done" onclick="markServiceAsDone(this)"><i class="fa fa-check"></i> mark as done</button>
                                                @endif
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($customerBooking->status === 'pending')
                                    <div class="d-flex justify-content-end pt-3 gap-2">
                                        <div><a class="btn btn-danger btn-sm" onclick="cancelBooking()"><i class="fa fa-times-circle"></i> cancel booking</a></div>
                                        <div><a class="btn btn-success btn-sm" onclick="confirmBooking()"><i class="fa fa-check"></i> accept booking</a></div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

        });

        function confirmBooking(){
            let booking_id = $('#bookingno').val();
            $.get(`{{route('ajax.confirm.booking')}}`,{booking_id},result=>{
                if (result.status == 'success'){
                    console.log(result.msg);
                    location.reload();
                }else {
                    console.log(result.msg);
                    location.reload();
                }
            });
        }

        function cancelBooking(){
            let booking_id = $('#bookingno').val();
            $.get(`{{route('ajax.cancel.booking')}}`,{booking_id},result=>{
                if (result.status == 'success'){
                    console.log(result.msg);
                    location.reload();
                }else {
                    console.log(result.msg);
                    location.reload();
                }
            });
        }

        function markServiceAsDone(obj){
            let booked_service_id = $(obj).data('bookingid');
            console.log(booked_service_id);
            $.get(`{{route('ajax.markas.attended')}}`,{booked_service_id},result=>{
                if (result.status === 'success'){
                    console.log(result.msg);
                    location.reload();
                }else{
                    console.log(result.msg);
                    location.reload();
                }
            });
        }
    </script>
@endsection
