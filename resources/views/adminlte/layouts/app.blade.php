<!doctype html>
<html lang="en">
    <!--begin::Head-->
        @include('adminlte.layouts.head')
    <!--end::Head-->
    <!--begin::Body-->
    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <!--begin::App Wrapper-->
        <div class="app-wrapper">
            <!--begin::Header-->
            @include('adminlte.layouts.header')
            <!--end::Header-->
            <!--begin::Sidebar-->
            @include('adminlte.layouts.sidebar')
            <!--end::Sidebar-->
            <!--begin::App Main-->
            <main class="app-main">
                @yield('content')
            </main>
            <!--end::App Main-->
            <!--begin::Footer-->
            @include('adminlte.layouts.footer')
            <!--end::Footer-->
        </div>
        <!--end::App Wrapper-->
        <!--begin::Script-->
        <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"
        ></script>
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
            const Default = {
                scrollbarTheme: 'os-theme-light',
                scrollbarAutoHide: 'leave',
                scrollbarClickScroll: true,
            };
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                    },
                });
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous" ></script>
        <script>
            new Sortable(document.querySelector('.connectedSortable'), {
                group: 'shared',
                handle: '.card-header',
            });

            const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
            cardHeaders.forEach((cardHeader) => {
                cardHeader.style.cursor = 'move';
            });
        </script>
    </body>
</html>
