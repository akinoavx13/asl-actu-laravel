<nav class="navbar navbar-default navbar-static-top" style="height: 80px; border: none; background: #028FCC;">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('actuality.index') }}"
               style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 36px;">
                ASLectra
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if(!Auth::guest())
                <ul class="nav navbar-nav">
                    <li style="{{ Request::is('actuality/create') ? 'background: #0273A3;' : '' }} ">
                        <a href="{{ route('actuality.create') }}"
                           style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">
                            Ecrire une actualité
                        </a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                        <li style="{{ Request::is('categories/index') || Request::is('categories/create') ? 'background: #0273A3;' : '' }} ">
                            <a href="{{ route('category.index') }}"
                               style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">
                                Catégories
                            </a>
                        </li>
                        <li style="{{ Request::is('users/index') ? 'background: #0273A3;' : '' }} ">
                            <a href="{{ route('user.index') }}"
                               style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">
                                Utilisateurs
                            </a>
                        </li>
                    @endif
                    <li style="{{ Request::is('preferences/create') ? 'background: #0273A3;' : '' }} ">
                        <a href="{{ route('preference.create') }}"
                           style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            Préférences
                        </a>
                    </li>
                    <li>
                        <a href="http://www.aslectra.com#sections"
                           style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">
                            ASLectra
                        </a>
                    </li>
                </ul>
            @endif
        <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}"
                           style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">Connexion</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}"
                           style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">Créer
                            un compte</a>
                    </li>
                @else
                    <li class="dropdown" style="{{ Request::is('users/edit') ? 'background: #0273A3;' : '' }} ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           style="color: #ffffff; height: 80px; line-height: 80px; padding-top: 0; padding-bottom: 0; font-size: 14px; text-transform: uppercase;">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('img/avatars/' . Auth::user()->id . '.jpg') }}" alt="avatar" width="35" height="35" class="img-rounded"/>
                            @endif
                            {{ Auth::user()->forname }}
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('user.edit') }}">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    Mon compte
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    Déconnexion
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>