@php
$course = $course ?? null;
@endphp
<div class="field">
    <label for="name">Заголовок</label>
    <input type="text" maxlength="50" class="form-control @error('name') is-invalid @enderror" {{old('name', $course?->title)}} id="name" name="name" placeholder="Например: Введение и установка окружения"></div>
<div class="field">
    <label for="description">Описание</label>
    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description"   placeholder="Коротко о категории">{{old('description', $course?->description)}}</textarea>
    @error('description')
         <div class="hint">Максимум 50 символов. Только кириллица, пробел, дефис.</div>
    @enderror
</div>

<div class="field">
    <label for="url">Видеоссылка SuperTube</label>
    <input type="url" class="form-control" id="url" name="url" pattern="https://super-tube\.cc/video/v[0-9]+" placeholder="https://super-tube.cc/video/v23189">
    <div class="hint">Необязательно. Формат: https://super-tube.cc/video/vXXXXX</div>
</div>

<div class="field">
    <label for="hours">Длительность (часов)</label>
    <input type="number" min="1" max="4" step="1" class="form-control @error('hours') is-invalid @enderror" id="hours" name="hours" placeholder="Например: 2">
    @error('duration')
         <div class="hint">Обязательно. Целое число, не более 4 часов.</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary btn-block">Сохранить</button>
