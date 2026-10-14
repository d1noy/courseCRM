@php
$category = $category ?? null;
@endphp
<div class="field">
    <label for="name">Название</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $category?->name)}}" placeholder="Например: Программирование">
    @error('name')
        <div class="hint">Максимум 15 символов. Только кириллица, пробел, дефис.</div>
    @enderror
</div>
<div class="field">
    <label for="description">Описание</label>
    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description"   placeholder="Коротко о категории">{{old('description', $category?->description)}}</textarea>
    @error('description')
         <div class="hint">Максимум 50 символов. Только кириллица, пробел, дефис.</div>
    @enderror
</div>

<div class="field">
    <label for="duration">Продолжительность (часов)</label>
    <input type="number" min="1" max="10" step="1" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" placeholder="Например: 8">
    @error('duration')
        <div class="hint">Обязательно. Целое число, не более 10.</div>
    @enderror
</div>

<div class="field">
    <label for="price">Цена</label>
    <input type="number" min="100" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="0.00">
    @error('price')
        <div class="hint">Обязательно. Формат «хх.хх», не менее 100.</div>
    @enderror
</div>
<div class="field" style="display:flex;gap:16px;">
    <div style="flex:1;">
        <label for="startDate">Дата начала</label>
        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="startDate" name="start_date" placeholder="дд/мм/гггг" pattern="\d{2}/\d{2}/\d{4}">
        @error('start_date')
            <div class="hint">Обязательно. Формат «дд/мм/гггг».</div>
        @enderror
    </div>
    <div style="flex:1;">
        <label for="endDate">Дата окончания</label>
        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="endDate" name="end_date" placeholder="дд/мм/гггг" pattern="\d{2}/\d{2}/\d{4}">
       @error('end_date')
            <div class="hint">Обязательно. Формат «дд/мм/гггг».</div>
        @enderror
    </div>
</div>
<div class="field">
    <label for="categoryImage">Изображение категории</label>
    <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images">
    @error('images')
        <div class="hint">Одно изображение, используется как обложка карточки категории.</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary btn-block">Сохранить</button>
