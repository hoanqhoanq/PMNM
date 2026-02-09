@extends('layout.admin')

@section('content')
<div class="container">
    <h2 class="mb-3">Danh sách Danh mục</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        Thêm mới
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th>Trạng thái</th>
                <th width="180">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        {{ $cat->parent ? $cat->parent->name : 'Không có' }}
                    </td>
                    <td>
                        {{ $cat->is_active ? 'Hoạt động' : 'Ẩn' }}
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->id) }}"
                           class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                        <form action="{{ route('categories.destroy', $cat->id) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Xóa danh mục này?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Chưa có danh mục nào
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
