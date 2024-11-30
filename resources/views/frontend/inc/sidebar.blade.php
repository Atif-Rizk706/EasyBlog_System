<header class="tm-header" id="tm-header">
    <div class="tm-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="tm-site-header">
            <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-blog"></i></div>
            <h1 class="text-center">Xtra Blog</h1>
        </div>
        <nav class="tm-nav" id="tm-nav">
            <ul>
                <li class="tm-nav-item active">
                    <a href="{{url('site_page')}}" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Blog Home
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li class="tm-nav-item">
                        <a href="{{url('creat_post')}}" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Creat Post
                        </a>
                    </li>
                    <li class="tm-nav-item">
                        <a href="{{url('my_post')}}" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                             My post
                        </a>
                    </li>
                    @endauth
                @endif
                <li class="tm-nav-item">
                    <a href="about.html" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        About Xtra
                    </a>
                </li>
                <li class="tm-nav-item">
                    <a href="{{url('contact_page')}}" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a>
                </li>

                @if (Route::has('login'))

                        @auth
                        <li class="tm-nav-item">
                            <x-jet-dropdown align="right" width="130" height="40px" >
                                <x-slot name="trigger"  >

                                        <span class="inline-flex rounded-md"   >
                                        <button type="button" style=" width: 155px !important; height: 44px!important; margin-left: 30px!important; font-size: 20px!important; text-align: center!important; background-color: white!important; color: #00acee" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style=" width:50px; margin-left: 60px !important; font-size: 30px!important;">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        </span>

                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </li>

                        @else
                            <li class="tm-nav-item">
                              <a href="{{ route('login') }}" class="tm-nav-link">
                                  <i class="fas fa-sign-in-alt"></i>
                                  Log in
                              </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="tm-nav-item">
                                   <a href="{{ route('register') }}" class="tm-nav-link">
                                       <i class="fas fa-registered"></i>
                                       Register
                                   </a>
                                </li>
                            @endif
                        @endauth
                @endif
            </ul>
        </nav>
        <div class="tm-mb-65">
            <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                <i class="fab fa-facebook tm-social-icon"></i>
            </a>
            <a href="https://twitter.com" class="tm-social-link">
                <i class="fab fa-twitter tm-social-icon"></i>
            </a>
            <a href="https://instagram.com" class="tm-social-link">
                <i class="fab fa-instagram tm-social-icon"></i>
            </a>
            <a href="https://linkedin.com" class="tm-social-link">
                <i class="fab fa-linkedin tm-social-icon"></i>
            </a>
        </div>
        <p class="tm-mb-80 pr-5 text-white">
            Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
        </p>
    </div>
</header>
