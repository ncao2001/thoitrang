<form action="shop">
    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories">
            @foreach($categories as $category)
                <li><a href="shop/category/{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">
            @foreach($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{$brand->id}}">
                        {{$brand->name}}
                        <input type="checkbox"
                               {{(request("brand")[$brand->id]??'')=='on'?'checked':''}}
                               id="bc-{{$brand->id}}"
                               name="brand[{{$brand->id}}]"
                               onchange="this.form.submit();">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                 data-min="10" data-max="999"
                 data-min-value="{{str_replace('$', '', request('price_min')) }}"
                 data-max-value="{{str_replace('$', '', request('price_max')) }}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>
        <button type="submit" class="filter-btn">Filter</button>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();" {{request('color')=='black'?'checked':''}}>
                <label class="cs-black {{request('color') == 'black' ? 'font-weight-bold':''}}" for="cs-black">Black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-white" name="color" value="white" onchange="this.form.submit();" {{request('color')=='white'?'checked':''}}>
                <label class="cs-white {{request('color') == 'white' ? 'font-weight-bold':''}}" for="cs-white">White</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-gray" name="color" value="gray" onchange="this.form.submit();" {{request('color')=='gray'?'checked':''}}>
                <label class="cs-gray {{request('color') == 'gray' ? 'font-weight-bold':''}}" for="cs-gray">Gray</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();" {{request('color')=='blue'?'checked':''}}>
                <label class="cs-blue {{request('color') == 'blue' ? 'font-weight-bold':''}}" for="cs-blue">Blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();" {{request('color')=='red'?'checked':''}}>
                <label class="cs-red {{request('color') == 'red' ? 'font-weight-bold':''}}" for="cs-red">Red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();" {{request('color')=='green'?'checked':''}}>
                <label class="cs-green {{request('color') == 'green' ? 'font-weight-bold':''}}" for="cs-green">Green</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-beige" name="color" value="beige" onchange="this.form.submit();" {{request('color')=='beige'?'checked':''}}>
                <label class="cs-beige {{request('color') == 'beige' ? 'font-weight-bold':''}}" for="cs-beige">Beige</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-orange" name="color" value="orange" onchange="this.form.submit();" {{request('color')=='orange'?'checked':''}}>
                <label class="cs-orange {{request('color') == 'orange' ? 'font-weight-bold':''}}" for="cs-orange">Orange</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-brown" name="color" value="brown" onchange="this.form.submit();" {{request('color')=='brown'?'checked':''}}>
                <label class="cs-brown {{request('color') == 'brown' ? 'font-weight-bold':''}}" for="cs-brown">Brown</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();" {{request('color')=='violet'?'checked':''}}>
                <label class="cs-violet {{request('color') == 'violet' ? 'font-weight-bold':''}}" for="cs-violet">Violet</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size" name="size" value="s" onchange="this.form.submit();"
                    {{request('size') == 's' ? 'checked' : ''}}>
                <label for="s-size" class="{{request('size') == 's' ? 'checked' : ''}}">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size" name="size" value="m" onchange="this.form.submit();"
                    {{request('size') == 'm' ? 'checked' : ''}}>
                <label for="m-size" class="{{request('size') == 'm' ? 'checked' : ''}}">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size" name="size" value="l" onchange="this.form.submit();"
                    {{request('size') == 'l' ? 'checked' : ''}}>
                <label for="l-size" class="{{request('size') == 'l' ? 'checked' : ''}}">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size" name="size" value="xs" onchange="this.form.submit();"
                    {{request('size') == 'xs' ? 'checked' : ''}}>
                <label for="xs-size" class="{{request('size') == 'xs' ? 'checked' : ''}}">xs</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Trousers</a>
            <a href="#">Men's hats</a>
            <a href="#">Backpack</a>
        </div>
    </div>
</form>