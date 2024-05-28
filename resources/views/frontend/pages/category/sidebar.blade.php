<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 hidden-sm ">
    <div>
        @if (count($products) > 0)
            <div class="right_box">
                <h2> Makes
                    <span class="sp sp-plus MakePlus pull-right display_none"></span>
                    <span class="sp sp-minus MakeMinus pull-right display_none"></span>
                </h2>
                <div>
                    <ul>

                        <li class="Make" id="Make36">
                            <a href="{{ asset('/car/categories') . '/' . $products[0]->cat_info?->id }}">{{ $products[0]->cat_info?->title }}
                                [{{ $products[0]->product_count }}]
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            @if (count($categoryChild) > 0)
                <div class="right_box">
                    <h2> Model
                        <span class="sp sp-plus MakePlus pull-right display_none"></span>
                        <span class="sp sp-minus MakeMinus pull-right display_none"></span>
                    </h2>
                    <div>
                        <ul>
                            @foreach ($categoryChild as $child)
                                <li class="Make" id="Make36">
                                    <a href="{{ asset('/car/categories') . '/' . $child['id'] }}">{{ $child['title'] }}
                                        {{-- [{{ $category->products_count }}] --}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endif
        <div class="margin_bottom_10"></div>
    </div>
</div>
