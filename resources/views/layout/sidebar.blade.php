<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
            Quản lý Danh mục
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Xem danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>
