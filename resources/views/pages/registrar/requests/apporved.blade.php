@extends('layouts.registrar')

@section('content')
    <div>
        <div class="pb-5">
            <h1 class="text-xl font-semibold text-gray-800">Approved requests</h1>
        </div>
        <div>
            <!-- This example requires Tailwind CSS v2.0+ -->
            @livewire('registrar.request.approved',[
            'id' => $id
            ])
        </div>
    </div>
@endsection
