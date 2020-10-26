<table class = "table">
    <tr>
        <th><strong>Booking ID<strong></th>
        <th><strong>Client ID<strong></th>
        <th><strong>Date Starting<strong></th>
        <th><strong>Collection Time<strong></th>
        <th><strong>No. Occupants<strong></th>
        <th><strong>Pick Up Point<strong></th>
        <th><strong>Driver ID Employed<strong></th>
        
    </tr>
    @foreach ($bookings as $booking)
    <tr>
        <td>{{$booking->BookingID}}</td>
        <td>{{$booking->clientID}}</td>
        <td>{{$booking->startDate}}</td>
        <td>{{$booking->time}}</td>
        <td>{{(($booking->infants)+($booking->children)+($booking->adults)+($booking->elderly))}}</td>
        <td>{{$booking->initalCollectionPoint}}</td>
        <td>{{$booking->driverID}}</td>
    </tr>
    @endforeach
</table>