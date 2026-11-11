@extends('layouts.app')

@section('title', $car->name)

@section('content')
  <a href="{{ route('cars.index') }}" class="d-inline-block mt-3">← К списку</a>
  <h1 class="page-title">{{ $car->name }}</h1>

  <img src="{{ $car->image_url }}" alt="{{ $car->name }}" class="img-fluid rounded mb-3">

  <p><strong>Тип кузова:</strong> {{ $car->body_type }}</p>
  <p><strong>Дата выпуска:</strong> {{ $car->release_date->format('d.m.Y') }}</p>
  <p>{{ $car->description }}</p>
@endsection