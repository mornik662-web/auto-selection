<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="mb-5">
  @csrf
  @if ($method)
    @method($method)
  @endif

  <div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" id="name" name="name" required maxlength="255"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $car->name) }}">
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="body_type" class="form-label">Тип кузова</label>
    <input type="text" id="body_type" name="body_type" required maxlength="100"
           class="form-control @error('body_type') is-invalid @enderror"
           value="{{ old('body_type', $car->body_type) }}">
    @error('body_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="release_date" class="form-label">Дата выпуска</label>
    <input type="date" id="release_date" name="release_date" required
           class="form-control @error('release_date') is-invalid @enderror"
           value="{{ old('release_date', $car->release_date?->format('Y-m-d')) }}">
    @error('release_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea id="description" name="description" rows="5" required
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $car->description) }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Изображение</label>
    <input type="file" id="image" name="image" accept="image/*"
           class="form-control @error('image') is-invalid @enderror">
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <button type="submit" class="btn btn-primary">Сохранить</button>
  <a href="{{ route('cars.index') }}" class="btn btn-link">Отмена</a>
</form>