<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                @hasSection ('page-title')
                <h3 class="mb-0">@yield('page-title')</h3>
                @endif

                @isset($breadcrumb)
                <ol class="breadcrumb">
                    @foreach ($breadcrumb as $breadcrumb)
                    <li class="breadcrumb-item"><a href="#">{{ $breadcrumb['label'] }}</a></li>
                    @endforeach
                </ol>
                @endisset
            </div>

            <div class="col-sm-6 text-end">
                @yield('page-actions')
            </div>
        </div>
    </div>
</div>