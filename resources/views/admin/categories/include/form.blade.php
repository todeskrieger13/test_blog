<label for="">Статус</label>
<select name="published" class="form-control">
    @if(isset($category->id))
        <option value="0" @if($category->published == 0) selected="" @endif>Не опубликованно</option>
        <option value="1" @if($category->published == 1) selected="" @endif>Опубликованно</option>
    @else
        <option value="0">Не опубликованно</option>
        <option value="1">Опубликованно</option>
    @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории"
       value="{{$category->title or ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация"
       value="{{$category->slug or ""}}" readonly="">

<label for="">Родительская категория</label>
<select name="parent_id" class="form-control">
    <option value="0">-- Без родительской категории --</option>

    {{-- include categories --}}

    @include('admin.categories.include.categories', array('categories' => $categories))

</select>

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">
