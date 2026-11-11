@extends('layouts.app')

@section('title', 'Новый автомобиль')

@section('content')
  <h1 class="page-title">Новый автомобиль</h1>
  @include('cars._form', [
      'car'    => new \App\Models\Car,
      'action' => route('cars.store'),
      'method' => null,
  ])
@endsection