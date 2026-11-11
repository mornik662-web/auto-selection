<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class CarController extends Controller
{
    // Правила валидации (общие для создания и редактирования)
    private function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:255'],
            'body_type'    => ['required', 'string', 'max:100'],
            'description'  => ['required', 'string'],
            'release_date' => ['required', 'date', 'before_or_equal:today'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }

    // Сохраняет картинку: обрезает под размер вёрстки и кладёт в storage/app/public/cars
    private function saveImage($file): string
    {
        $path = 'cars/' . Str::uuid() . '.jpg';
        $encoded = Image::read($file)->cover(832, 624)->toJpeg(85);
        Storage::disk('public')->put($path, (string) $encoded);

        return $path;
    }

    // Список всех объектов
    public function index()
    {
        $cars = Car::latest()->get();

        return view('cars.index', compact('cars'));
    }

    // Страница с пустой формой
    public function create()
    {
        return view('cars.create');
    }

    // Приём формы создания
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->saveImage($request->file('image'));
        }
        unset($data['image']);

        Car::create($data);

        return redirect()->route('cars.index')->with('status', 'Автомобиль добавлен');
    }

    // Детальная страница объекта (замена Modal)
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    // Страница с формой редактирования
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Приём формы редактирования
    public function update(Request $request, Car $car)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('image')) {
            if ($car->image_path) {
                Storage::disk('public')->delete($car->image_path);
            }
            $data['image_path'] = $this->saveImage($request->file('image'));
        }
        unset($data['image']);

        $car->update($data);

        return redirect()->route('cars.show', $car)->with('status', 'Изменения сохранены');
    }

    // Мягкое удаление (запись остаётся в БД с заполненным deleted_at)
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('status', 'Автомобиль удалён');
    }
}