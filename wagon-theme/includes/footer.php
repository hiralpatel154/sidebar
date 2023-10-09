</div>
</div>
</body>

</html>

<script>
    $(document).ready(function () {
        $(".has-submenu").click(function () {
            $('.has-submenu').not(this).find('.submenu').removeClass('open');
            $(this).find('.submenu').toggleClass('open');
            $('.sidebar').addClass('overflow');
        });

        $(".content-wrapper").on("click", function () {
            $('.sidebar').removeClass('overflow');
        });
        
        $('.menu-item').on('click', function () {
            $('.menu-item').removeClass('active');
            $(this).addClass('active');
        });

        var currentURL = window.location.href.split('/').pop();
        $(".sub-item").each(function () {
            var href = $(this).attr("href").split('/').pop();
            
            if (href === currentURL) {
                $(this).addClass("active");
                $(this).closest(".submenu").addClass("open");
            }
        });

        $(".sub-item").click(function (e) {
            e.preventDefault();
            var href = $(this).attr("href");

            if (href === currentURL) {
                $('.submenu').removeClass('open');
                $('.sub-item').removeClass('active');
                $('.has-submenu').removeClass('active');
                $(this).parent().siblings(".submenu").addClass('open');
                $(this).addClass("active");
            } else {
                window.location.href = href;
            }
        });
    
        $('.has-submenu').removeClass('active');
        var activeParent = $(".sub-item.active").closest(".has-submenu").addClass("active");

        var sidebar = $(".sidebar-menu");
        var parentOffsetTop = activeParent.position().top;
        var parentHeight = activeParent.height();
        var sidebarHeight = sidebar.height();
        if (parentOffsetTop < 0 || parentOffsetTop + parentHeight > sidebarHeight) {
            sidebar.scrollTop(sidebar.scrollTop() + parentOffsetTop);
        }
        
    });
</script>