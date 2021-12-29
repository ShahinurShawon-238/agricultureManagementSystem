<div class="four columns right-side-bar" id="right-content">
    <div class="column block">
        <h5 class="bk-org title">Sidebar Title One</h5>
        <p>
            <img alt="" src="{{ asset($one->image) }}" style="height:143px; width:120px">
        </p>
        <p>{{ $one->name }}</p>
        <p>
            <a href="{{ $one->link }}" class="btn" style="display:block;text-align:center;width:100%;">Details</a>
        </p>
    </div>
    <style>
        #right-content .block {
            display: block !important
        }

    </style>

    <div class="column block">
        <h5 class="bk-org title">Sidebar Title Two</h5>
        <p>
            <img alt="" src="{{ asset($two->image) }}" style="height:143px; width:120px">
        </p>
        <p>{{ $two->name }}</p>
        <p>
            <a href="{{ $two->link }}" class="btn" style="display:block;text-align:center;width:100%;">Details</a>
        </p>
    </div>
    <style>
        #right-content .block {
            display: block !important
        }

    </style>

    <div class="column block">
        <h5 class="bk-org title">Sidebar Title Three</h5>
        <ul>
            @foreach($three as $t)
            <li><a href="{{$t->link}}">{{$t->name}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="column block">
        <h5 class="bk-org title">Sidebar Title Four</h5>
        <p>
            <img alt="sidebar" src="{{ asset($four->image) }}" style="width:220px">
        </p>
    </div>
    <style>
        #right-content .block {
            display: block !important
        }

    </style>

    <div class="column block">
        <h5 class="bk-org title">Sidebar Title Five</h5>
        <p>
            <img alt="sidebar" src="{{ asset($five->image) }}" style="height:300px; width:220px" />
        </p>
    </div>
    <style>
        #right-content .block {
            display: block !important
        }

    </style>

    <div class="column block">
        <h5 class="bk-org title">Social Media</h5>
        @foreach($social as $sc)
        <a href="{{ $sc->link }}" target="_blank" class="share-buttons">
            <img src="{{ asset($sc->image) }}" alt="facebook">
        </a>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <style>
        .share-buttons img {
            width: 30px !important;
            height: 30px !important;
            padding: 2px;
            border: 0;
            box-shadow: 0;
            display: inline;
        }

    </style>

    <script>
        $(document).ready(function () {
            el = $('h5:contains("Help")');
            text = el.html()
            el.html('').html('<a style="color:#fff" href="#">' + text + '<a>');
        });

    </script>
</div>
