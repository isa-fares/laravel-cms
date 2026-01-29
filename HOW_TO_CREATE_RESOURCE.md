# كيفية إنشاء Resource جديد (CRUD كامل)

## الخطوات السريعة:

### 1. إنشاء Migration
```bash
php artisan make:migration create_sliders_table
```

### 2. إنشاء Model
```bash
php artisan make:model Slider
```

### 3. إنشاء Repository (يرث من BaseRepository)
```php
<?php
namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\Base\BaseRepository;

class SliderRepository extends BaseRepository
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }
    
    // إضافة methods خاصة إذا لزم الأمر
}
```

### 4. إنشاء Service (يرث من BaseService)
```php
<?php
namespace App\Services;

use App\Repositories\SliderRepository;
use App\Services\Base\BaseService;

class SliderService extends BaseService
{
    public function __construct(SliderRepository $sliderRepository)
    {
        parent::__construct($sliderRepository);
    }
    
    // إضافة methods خاصة إذا لزم الأمر
}
```

### 5. إنشاء Form Requests
```bash
php artisan make:request StoreSliderRequest
php artisan make:request UpdateSliderRequest
```

### 6. إنشاء Controller
```php
<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use App\Services\SliderService;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        $sliders = $this->sliderService->getAll();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        $this->sliderService->create($request->validated());
        return redirect()->route('sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function show(Slider $slider)
    {
        return view('sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $this->sliderService->update($slider, $request->validated());
        return redirect()->route('sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $this->sliderService->delete($slider);
        return redirect()->route('sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
```

### 7. إضافة Routes
```php
Route::resource('sliders', SliderController::class);
```

### 8. إنشاء Views
- `resources/views/sliders/index.blade.php`
- `resources/views/sliders/create.blade.php`
- `resources/views/sliders/edit.blade.php`
- `resources/views/sliders/show.blade.php`

---

## الفوائد:

✅ **CRUD جاهز تلقائياً** من Base Classes
✅ **أقل كود** - فقط ما هو خاص بالـ Resource
✅ **سهل الصيانة** - تغيير Base Class يؤثر على كل Resources
✅ **مرن** - يمكن إضافة methods خاصة بسهولة

---

## مثال: إضافة Method خاص

```php
// في SliderRepository
public function getActiveSliders()
{
    return $this->model->where('status', 'active')->orderBy('order')->get();
}

// في SliderService
public function getActiveSliders()
{
    return $this->repository->getActiveSliders();
}

// في SliderController
public function active()
{
    $sliders = $this->sliderService->getActiveSliders();
    return view('sliders.active', compact('sliders'));
}
```
