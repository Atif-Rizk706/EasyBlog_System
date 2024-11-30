<script src="{{asset('frontend_asset/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/templatemo-script.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname; // Get current URL path

        // Check if the current path is the root ("/")
        if (currentPath === '/' || currentPath === '') {
            return; // Don't do anything if it's the root
        }

        const navItems = document.querySelectorAll('.tm-nav-item');

        navItems.forEach(function(item) {
            const link = item.querySelector('a');
            if (link && link.href.includes(currentPath)) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    });
</script>
