@extends('layouts.app')

@section('title', 'Карточки автомобилей')

@section('content')
  <h1 class="page-title">Карточки автомобилей</h1>

  <div class="row g-4">
    @foreach ($cars as $car)
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          <div class="position-relative">
            <img src="{{ $car->image_url }}" alt="{{ $car->name }}"
                 class="card-img-top" style="height:200px;object-fit:cover">
            <span class="badge bg-light text-dark position-absolute top-0 start-0 m-2">
              {{ $car->body_type }}
            </span>
          </div>
          <div class="card-body">
            <h3 class="h5">
              <a href="{{ route('cars.show', $car) }}" class="text-decoration-none">{{ $car->name }}</a>
            </h3>
            <p class="small text-muted mb-0">{{ Str::limit($car->description, 120) }}</p>
          </div>
          <div class="card-footer d-flex gap-2">
            <a href="{{ route('cars.edit', $car) }}" class="btn btn-sm btn-outline-primary">Изменить</a>
            <form method="POST" action="{{ route('cars.destroy', $car) }}"
                  onsubmit="return confirm('Удалить этот автомобиль?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Удалить</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection