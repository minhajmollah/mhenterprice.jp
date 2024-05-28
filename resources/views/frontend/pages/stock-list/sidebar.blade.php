<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 hidden-sm ">
    <div>
        <div class="right_box">
            <h2>All Makes
                <span class="sp sp-plus MakePlus pull-right display_none"></span>
                <span class="sp sp-minus MakeMinus pull-right display_none"></span>
            </h2>
            <div>
                <ul>
                    @foreach ($categories as $category)
                        <li class="Make" id="Make36">
                            <a href="{{ asset('car/categories/') . '/' . $category->id }}">{{ $category->title }}
                                [{{ $category->products_count }}]
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="margin_bottom_10"></div>
    </div>
</div>
