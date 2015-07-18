@extends('layouts.master')

<a href='/poll/create'>Add New Poll</a>
<table class='table' border='1'>
    <tr>
        <th>Due Date</th>
        <th>Status</th>
        <th>Options</th>
    </tr>
    @foreach ($organization->polls as $poll)
        <tr>
            <td>{{ date('F j, Y g:ia',strtotime($poll->closed_by)) }}</td>
            <td>{{ $poll->displayStatus() }}</td>
            <td>
                @foreach ($poll->restaurants as $restaurant)
                    {{ $restaurant->name }} <br>
                @endforeach
                @if ($poll->displayStatus() == 'Open')
                <a href='/poll/{{$poll->id}}/restaurant/add'>Add Restaurant</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>