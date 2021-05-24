<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    {{-- Meta --}}
    @include('public/layouts/elements/meta')

    {{-- Css --}}
    @include('public/layouts/elements/css')

    {{-- Js --}}
    @include('public/layouts/elements/js')
</head>
<body>

    {{-- Begin: Layout --}}
    <div id="templatemo_container">

        {{-- Begin:  Menu --}}
        @include('public/layouts/elements/menu')
        
        {{-- Begin: header --}}
        @include('public/layouts/elements/header')
        
        <!-- Begin: content -->
        @include('public/layouts/elements/content')
        
        <!-- Begin: footer -->
        @include('public/layouts/elements/footer')
    </div>
    {{-- End: Layout --}}

</body>
</html>