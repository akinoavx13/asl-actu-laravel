<div class="col-md-12">
    <div class="jumbotron" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="row">
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'general') }}" class="text-warning"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('general') || Request::is('/') ? 'label label-warning' : '' }}"
                            style="{{ Request::is('general') || Request::is('/') ? 'font-size: 13px;' : '' }}">Général</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'athletics') }}" class="text-primary"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('athletics') ? 'label label-primary' : '' }}"
                            style="{{ Request::is('athletics') ? 'font-size: 13px;' : '' }}">Athlétisme</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'badminton') }}" class="text-success"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('badminton') ? 'label label-success' : '' }}"
                            style="{{ Request::is('badminton') ? 'font-size: 13px;' : '' }}">Badminton</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'basketball') }}" class="text-info"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('basketball') ? 'label label-info' : '' }}"
                            style="{{ Request::is('basketball') ? 'font-size: 13px;' : '' }}">Basketball</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'football') }}" class="text-warning"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('football') ? 'label label-warning' : '' }}"
                            style="{{ Request::is('football') ? 'font-size: 13px;' : '' }}">Football</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'gym') }}" class="text-danger"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('gym') ? 'label label-danger' : '' }}"
                            style="{{ Request::is('gym') ? 'font-size: 13px;' : '' }}">Gym</span></a>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'yoga_cestas') }}" class="text-danger"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('yoga_cestas') ? 'label label-danger' : '' }}"
                            style="{{ Request::is('yoga_cestas') ? 'font-size: 13px;' : '' }}">Yoga (Cestas)</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'ball') }}" class="text-warning"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('ball') ? 'label label-warning' : '' }}"
                            style="{{ Request::is('ball') ? 'font-size: 13px;' : '' }}">Pelote</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'soccer5') }}" class="text-info"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('soccer5') ? 'label label-info' : '' }}"
                            style="{{ Request::is('soccer5') ? 'font-size: 13px;' : '' }}">Soccer5</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'tennis') }}" class="text-success"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('tennis') ? 'label label-success' : '' }}"
                            style="{{ Request::is('tennis') ? 'font-size: 13px;' : '' }}">Tennis</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'volleyball') }}" class="text-primary"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('volleyball') ? 'label label-primary' : '' }}"
                            style="{{ Request::is('volleyball') ? 'font-size: 13px;' : '' }}">Volley</span></a>
            </div>
            <div class="col-md-2">
                <a style="text-decoration: none" href="{{ route('actuality.index', 'yoga_chalgrin') }}" class="text-warning"><span
                            class="glyphicon glyphicon-tag" aria-hidden="true"></span> <span
                            class="{{ Request::is('yoga_chalgrin') ? 'label label-warning' : '' }}"
                            style="{{ Request::is('yoga_chalgrin') ? 'font-size: 13px;' : '' }}">Yoga (Chalgrin)</span></a>
            </div>
        </div>
    </div>
</div>