
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        .toast {
    position: fixed;
    top: 25px;
    left: 50%;
    transform: translate(-50%, -15px);
    background: #198754;
    color: white;
    padding: 16px 28px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    opacity: 0;
    transition: opacity 0.3s, transform 0.3s;
    z-index: 9999;
}

.toast.show {
    opacity: 1;
    transform: translate(-50%, 0);
}
    </style>
</head>
<body>

    @if (session('success'))
        <div id="successToast" class="toast">
            {{ session('success') }}
        </div>
    @endif

    <script>
        const toast = document.getElementById('successToast');

        if (toast) {
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);

            setTimeout(() => {
                toast.classList.remove('show');

                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 1000);
        }
    </script>

@if (!request()->routeIs('books.show'))
    <nav>
        <a href="/dashboard">Dashboard</a> |
        <a href="/books">Books</a> |
        <a href="/categories">Categories</a> |
        <a href="/members">Members</a>

        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
@endif

    <main>
        @yield('content')
    </main>

</body>
</html>
