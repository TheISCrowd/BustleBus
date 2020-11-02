<table class="table">
    <tr>
        <th><strong>Booking ID<strong></th>
        <th><strong>Client ID<strong></th>
        <th><strong>Date<strong></th>
        <th><strong>Passengers<strong></th>
        <th><strong>Collection<strong></th>
        <th><strong>Arrival<strong></th>
        <th><strong>Vehicle<strong></th>
        <th><strong>Driver<strong></th>

    </tr>
    @foreach ($bookings as $booking)
    <tr>
        <td>{{$booking->bookingID}}</td>
        <td><button type="button" id="clientbtn" class="btn btn-primary viewclient" data-toggle="modal" data-target="#openClient">{{$booking->clientID}}</button></td>
        <td>{{$booking->startDate}}</td>
        <td>{{(($booking->infants)+($booking->children)+($booking->adults)+($booking->elderly))}}</td>
        <td>{{$booking->initalCollectionPoint}}</td>
        <td>{{$booking->dropOff}}</td>
        <td>{{$booking->vehicleType}}</td>
        @if($booking->driverID == "")
        <td><button type="button" id="assign" class="btn btn-warning assign" data-toggle="modal" data-target="#assignDriver">Assign</button></td>
        @else
        <td><button type="button" class="btn btn-success view" data-toggle="modal" data-target="#viewDrivers">{{$booking->driverID}}</button></td>
        @endif
    </tr>
    @endforeach
</table>

<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script>
    $(document).ready(function() {
        let row = null
        let bookingID = null;
        let bookingDate = null;


        $('.assign').click(function() {
            row = $(this).closest('tr');

            bookingID = row.find('td:eq(0)').text();
            bookingDate = row.find('td:eq(2)').text();

            $.ajax({
                type: 'POST',
                url: "{{ route('list.drivers.post') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookingID": bookingID,
                    "bookingDate": bookingDate
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var drivers = data;
                    $.each(drivers, function(index, value) {
                        $('#queryTable tbody').append("<tr><td>" + value.driverID + "</td><td>" + value.firstName + "</td><td>" + value.contactNumber + "</td><td>" + "<button type=\"button\" class=\"btn btn-success add\">Select</button></tr>");
                        console.log(index + ': ' + value.driverID);
                        console.log(index + ': ' + value.firstName);
                    });
                }
            });
        });

        $('#assignDriver').on('hidden.bs.modal', function() {
            $("#queryTable  td").parent().remove();
        })

        let driverID = null;
        $(document.body).on('click', '.add', function() {
            row = $(this).closest('tr');
            driverID = row.find('td:eq(0)').text();

            $.ajax({
                type: 'POST',
                url: "{{ route('assign.driver.post') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookingID": bookingID,
                    "driverID": driverID
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        });

        $('.view').click(function() {
            row = $(this).closest('tr');

            driverID = row.find('td:eq(7)').text();

            $.ajax({
                type: 'POST',
                url: "{{ route('get.drivers.post') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "driverID": driverID
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $.each(data, function(index, value) {
                        $('#driverDetailsTable tbody').append("<tr><td>" + value.driverID + "</td><td>" + value.firstName + "</td><td>" + value.contactNumber + "</td><td>" + "<button type=\"button\" class=\"btn btn-success unassign\">Select</button></tr>");
                    });
                }
            });
        });

        $('#viewDrivers').on('hidden.bs.modal', function() {
            $("#driverDetailsTable  td").parent().remove();
        })

        $(document.body).on('click', '.unassign', function() {
            bookingID = row.find('td:eq(0)').text();
            $.ajax({
                type: 'POST',
                url: "{{ route('unassign.driver.post') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookingID": bookingID
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        });

        $('.viewclient').click(function() {
            row = $(this).closest('tr');
            let clientID = row.find('td:eq(1)').text();

            $.ajax({
                type: 'POST',
                url: "{{ route('get.clients.post') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "clientID": clientID
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    $.each(data, function(index, value) {
                        $('#clientDetailsTable tbody').append("<tr><td>" + value.name + "</td><td>" + value.surname + "</td><td>" + value.cell + "</td><td>" + value.email + "</td></tr>");
                    });
                }
            });
        });

        $('#openClient').on('hidden.bs.modal', function() {
            $("#clientDetailsTable  td").parent().remove();
        })
    });
</script>


<div class="modal fade" id="assignDriver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table" id="queryTable">
                        <caption>List of Drivers</caption>
                        <thead>
                            <tr>
                                <th><strong>Driver ID<strong></th>
                                <th><strong>First Name<strong></th>
                                <th><strong>Cell<strong></th>
                                <th><strong>Select Driver</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="viewDrivers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Driver Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="driverDetailsTable">
                    <thead>
                        <tr>
                            <th><strong>Driver ID<strong></th>
                            <th><strong>First Name<strong></th>
                            <th><strong>Cell<strong></th>
                            <th><strong>Unselect Driver<strong></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="openClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="clientDetailsTable">
                    <thead>
                        <tr>
                            <th><strong>Name<strong></th>
                            <th><strong>Surname<strong></th>
                            <th><strong>Cell<strong></th>
                            <th><strong>Email<strong></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>