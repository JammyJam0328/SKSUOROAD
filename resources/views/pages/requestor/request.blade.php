@extends('layouts.requestor')

@section('content')
    <div>
        <div class="p-4 bg-white shadow-md">
            @livewire('requestor.create-request')
        </div>
    </div>
@endsection
