<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toggle.css') }}" rel="stylesheet">
        <title>International System of Units Convertor</title>
    </head>

<body>
    <div>
        <main >
            @yield('content')
        </main>
    </div>
<script>
    $("#treeview .parent").click(function (e) {
        e.stopPropagation();
        $(this).find("div").toggle("slow");
        if ($(this).hasClass("close"))
            $(this).removeClass("close");
        else
            $(this).addClass("close");
    });
</script>
</body>

</html>