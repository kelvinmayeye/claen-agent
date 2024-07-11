<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-1">
                <h4 class="card-title">Service</h4>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-sm no-wrap v-middle mb-0">
                    <thead>

                    <tr class="bg-info-subtle">
                        <th class="">#</th>
                        <th class="font-14 font-weight-medium text-dark">Name</th>
                        <th class="font-14 font-weight-medium text-dark">Description</th>
                        <th class="font-14 font-weight-medium text-dark text-center">Bookings</th>
                        <th class="font-14 font-weight-medium text-dark text-center">Status</th>
                        <th class="font-14 font-weight-medium text-dark"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($no=1)
                    @foreach($adminServices as $s)
                        <tr>
                            <td class="border">{{$no++}}</td>
                            <td class="border-top-0">{{$s->name}}</td>
                            <td class="">{{$s->description}}</td>
                            <td class="text-center fw-bolder text-success">{{$s->booked_services_count}}</td>
                            <td class="font-weight-medium text-center text-dark">{{$s->status}}</td>
                            <td style="text-align: center;"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
