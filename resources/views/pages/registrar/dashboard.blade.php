@extends('layouts.registrar')

@section('content')

    <div class="flex space-x-3">
        @livewire('registrar.dashboard')


        @livewire('registrar.component.notification-panel')

    </div>
@endsection
