@extends('layouts.app')

@section('title', 'Карточки автомобилей')

@section('content')
  <h1 class="page-title">Карточки автомобилей</h1>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 row-cols-xxxl-5 g-4 cards">
    @forelse ($cars as $car)
      <div class="col">
        <article class="card h-100">
          <div class="card__media">
            <img class="card-img-top img-fluid card__image" src="{{ $car->image_url }}" alt="{{ $car->name }}">
            <span class="card__type">{{ $car->body_type }}</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title card__name">{{ $car->name }}</h3>
            <p class="card__text">{{ $car->description }}</p>

            <div class="mt-auto d-flex flex-wrap gap-2">
              <a href="{{ route('cars.show', $car) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
              <a href="{{ route('cars.edit', $car) }}" class="btn btn-outline-secondary btn-sm">Изменить</a>
              <form method="POST" action="{{ route('cars.destroy', $car) }}" class="js-delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
              </form>
            </div>
          </div>
        </article>
      </div>
    @empty
      <div class="col-12">
        <p class="text-body-secondary">Автомобилей пока нет. Нажмите «Добавить».</p>
      </div>
    @endforelse
  </div>
@endsection
