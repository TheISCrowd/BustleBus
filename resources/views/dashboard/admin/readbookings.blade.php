<table class="table">
    <tr>
        <th><strong>Booking ID<strong></th>
        <th><strong>Client ID<strong></th>
        <th><strong>Date Starting<strong></th>
        <th><strong>No. Occupants<strong></th>
        <th><strong>Pick Up Point<strong></th>
        <th><strong>Driver<strong></th>

    </tr>
    @foreach ($bookings as $booking)
    <tr>
        <td>{{$booking->bookingID}}</td>
        <td><button type="button" id="clientbtn" class="btn btn-primary" data-toggle="modal" data-target="#openClient">{{$booking->clientID}}</button></td>
        <td>{{$booking->startDate}}</td>
        <td>{{(($booking->infants)+($booking->children)+($booking->adults)+($booking->elderly))}}</td>
        <td>{{$booking->initalCollectionPoint}}</td>
        @if($booking->driverID == "")
        <td><button type="button" id="assign" class="btn btn-warning" data-toggle="modal" data-target="#assignDriver">Assign</button></td>
        @else
        <td>{{$booking->driverID}}</td>
        @endif

        <td>{{$booking->complete}}</td>
    </tr>
    @endforeach
</table>


<form method="POST" action="{{ route('new.driver.post') }}">

    @csrf

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
                        <table class="table">
                            <caption>List of Drivers</caption>
                            <tr>
                                <th><strong>Driver ID<strong></th>
                                <th><strong>First Name<strong></th>
                                <th><strong>Cell<strong></th>
                                <th><strong>Home Town<strong></th>
                            </tr>
                            @foreach ($drivers as $driver)

                            <tr>
                                <td>{{$driver->driverID}}</td>
                                <td>{{$driver->firstName}}</td>
                                <td>{{$driver->contactNumber}}</td>
                                <td>{{$driver->hometown}}</td>
                                <td>
                                    <button type="submit" id="set" class="btn btn-success">Assign</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>