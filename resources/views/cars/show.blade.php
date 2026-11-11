@extends('layouts.app')

@section('title', $car->name)

@section('content')
  <a href="{{ route('cars.index') }}" class="d-inline-block mt-4">← К списку</a>

  <div class="car-detail row g-4 mt-1 mb-5">
    <div class="col-lg-6">
      <div class="card__media">
        <img class="car-detail__image" src="{{ $car->image_url }}" alt="{{ $car->name }}">
        <span class="card__type">{{ $car->body_type }}</span>
      </div>
    </div>

    <div class="col-lg-6">
      <h1 class="car-detail__title">{{ $car->name }}</h1>
      <p class="car-detail__text">{{ $car->description }}</p>

      <ul class="spec-list mb-4">
        <li><span class="spec-name">Кузов</span><span class="spec-value">{{ $car->body_type }}</span></li>
        <li><span class="spec-name">Год</span><span class="spec-value">{{ $car->release_date->format('Y') }}</span></li>
        <li><span class="spec-name">Дата выпуска</span><span class="spec-value">{{ $car->release_date->format('d.m.Y') }}</span></li>
      </ul>

      <div class="d-flex gap-2">
        <a href="{{ route('cars.edit', $car) }}" class="btn btn-outline-secondary">Изменить</a>
        <form method="POST" action="{{ route('cars.destroy', $car) }}" class="js-delete-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Удалить</button>
        </form>
      </div>
    </div>
  </div>
@endsection
