@extends('layouts.requestor')

@section('content')
    <div>
        <div class="p-4 bg-white shadow-md">
            @livewire('requestor.view-request',[
            'id'=>$id,
            'code'=>$code
            ])
        </div>
    </div>
@endsection
