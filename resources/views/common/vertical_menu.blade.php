@php
$categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>@if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif
                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                            $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                            @endphp
                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                <a href="{{ url('/products/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}"><h2 class="title">@if(session()->get('language') == 'hindi') {{ $subcategory->subcategory_name_hin }} @else {{ $subcategory->subcategory_name_en }} @endif</h2></a>
                                <ul class="links list-unstyled">
                                    @php
                                    $subsubcategories = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                    @endphp
                                    @foreach($subsubcategories as $subsubcategory)
                                    <li><a href="{{ url('/products/subsubcategory/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">@if(session()->get('language') == 'hindi') {{ $subsubcategory->subsubcategory_name_hin }} @else {{ $subsubcategory->subsubcategory_name_en }} @endif</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </li>
            @endforeach
        </ul>
    </nav>
</div>