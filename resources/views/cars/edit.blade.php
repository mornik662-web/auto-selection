@extends('layouts.app')

@section('title', 'Редактирование')

@section('content')
  <h1 class="page-title">Редактирование: {{ $car->name }}</h1>
  @include('cars._form', [
      'car'    => $car,
      'action' => route('cars.update', $car),
      'method' => 'PUT',
  ])
@endsection