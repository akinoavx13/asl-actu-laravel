<div class="col-md-12">
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="row">
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'general') }}" class="text-warning">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('general') || Request::is('/') && $preference != null && $preference->general ? 'label label-warning' : '' }}"
                          style="{{ Request::is('general') || Request::is('/') && $preference != null && $preference->general ? 'font-size: 13px;' : '' }}">
                        Général ({{ $actualitiesCount['general'] }})
                    </span>
                </a>
            </div>

            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'athletics') }}" class="text-primary">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('athletics') || Request::is('/') && $preference != null && $preference->athletics ? 'label label-primary' : '' }}"
                          style="{{ Request::is('athletics') || Request::is('/') && $preference != null && $preference->athletics ? 'font-size: 13px;' : '' }}">
                        Athlétisme ({{ $actualitiesCount['athletics'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'badminton') }}" class="text-success">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('badminton') || Request::is('/') && $preference != null && $preference->badminton ? 'label label-success' : '' }}"
                          style="{{ Request::is('badminton') || Request::is('/') && $preference != null && $preference->badminton ? 'font-size: 13px;' : '' }}">
                        Badminton ({{ $actualitiesCount['badminton'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'basketball') }}" class="text-info">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('basketball') || Request::is('/') && $preference != null && $preference->basketball ? 'label label-info' : '' }}"
                          style="{{ Request::is('basketball') || Request::is('/') && $preference != null && $preference->basketball ? 'font-size: 13px;' : '' }}">
                        Basketball ({{ $actualitiesCount['basketball'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'football') }}" class="text-warning">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('football') || Request::is('/') && $preference != null && $preference->football ? 'label label-warning' : '' }}"
                          style="{{ Request::is('football') || Request::is('/') && $preference != null && $preference->football ? 'font-size: 13px;' : '' }}">
                        Football ({{ $actualitiesCount['football'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'gym') }}" class="text-danger">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('gym') || Request::is('/') && $preference != null && $preference->gym ? 'label label-danger' : '' }}"
                          style="{{ Request::is('gym') || Request::is('/') && $preference != null && $preference->gym ? 'font-size: 13px;' : '' }}">
                        Gym ({{ $actualitiesCount['gym'] }})
                    </span>
                </a>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'yoga_cestas') }}" class="text-danger">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('yoga_cestas') || Request::is('/') && $preference != null && $preference->yoga_cestas ? 'label label-danger' : '' }}"
                          style="{{ Request::is('yoga_cestas') || Request::is('/') && $preference != null && $preference->yoga_cestas ? 'font-size: 13px;' : '' }}">
                        Yoga Cestas ({{ $actualitiesCount['yoga_cestas'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'ball') }}" class="text-warning">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('ball') || Request::is('/') && $preference != null && $preference->ball ? 'label label-warning' : '' }}"
                          style="{{ Request::is('ball') || Request::is('/') && $preference != null && $preference->ball ? 'font-size: 13px;' : '' }}">
                        Pelote ({{ $actualitiesCount['ball'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'soccer5') }}" class="text-info">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('soccer5') || Request::is('/') && $preference != null && $preference->soccer5 ? 'label label-info' : '' }}"
                          style="{{ Request::is('soccer5') || Request::is('/') && $preference != null && $preference->soccer5 ? 'font-size: 13px;' : '' }}">
                        Soccer5 ({{ $actualitiesCount['soccer5'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'tennis') }}" class="text-success">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('tennis') || Request::is('/') && $preference != null && $preference->tennis ? 'label label-success' : '' }}"
                          style="{{ Request::is('tennis') || Request::is('/') && $preference != null && $preference->tennis ? 'font-size: 13px;' : '' }}">
                        Tennis ({{ $actualitiesCount['tennis'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'volleyball') }}" class="text-primary">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('volleyball') || Request::is('/') && $preference != null && $preference->volleyball ? 'label label-primary' : '' }}"
                          style="{{ Request::is('volleyball') || Request::is('/') && $preference != null && $preference->volleyball ? 'font-size: 13px;' : '' }}">
                        Volley ({{ $actualitiesCount['volleyball'] }})
                    </span>
                </a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'yoga_chalgrin') }}" class="text-warning">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <span class="{{ Request::is('yoga_chalgrin') || Request::is('/') && $preference != null && $preference->yoga_chalgrin ? 'label label-warning' : '' }}"
                          style="{{ Request::is('yoga_chalgrin') || Request::is('/') && $preference != null && $preference->yoga_chalgrin ? 'font-size: 13px;' : '' }}">
                        Yoga Chalgrin ({{ $actualitiesCount['yoga_chalgrin'] }})
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>