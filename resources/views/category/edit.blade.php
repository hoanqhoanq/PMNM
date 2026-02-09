@extends('layout.admin')

@section('content')
<div class="container">
    <h2>Cập nhật Danh mục</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tên danh mục</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $category->name }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">
{{ $category->description }}
            </textarea>
        </div>

        <div class="mb-3">
            <label>Danh mục cha</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Không có --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Trạng thái</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $category->is_active ? 'selected' : '' }}>
                    Hoạt động
                </option>
                <option value="0" {{ !$category->is_active ? 'selected' : '' }}>
                    Ẩn
                </option>
            </select>
        </div>

        <button class="btn btn-success">Cập nhật</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
