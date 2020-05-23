<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" id="link-about">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" id="link-contact">
                        Contact
                    </a>
                </li>
                <!--li>
                    <a href="javascript:void(0)" id="link-news">
                        Newsletter
                    </a>
                </li-->
                <li>
                    <a href="javascript:void(0)" id="link-cgu">
                        CGU
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="http://evenma.herokuapp.com" target="_blank">Evenma </a> for a better event.
        </p>
    </div>
</footer>
