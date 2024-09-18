@foreach ($cat_pro_count as $ckey => $cc)
<li>
    <div class="form-check ps-0 m-0 category-list-box">
        <input 
            class="checkbox_animated"
            name="subcategory_id" 
            value="{{$cc->id}}" 
            type="checkbox"
            onchange="submitForm()"
            {{in_array($cc->id, $subcategory) ? 'checked' : ''}}
            id="{{$ckey}}">
        <label class="form-check-label" for="{{$ckey}}">
            <span class="name">{{$cc->subcategory_name}}</span>
            <span class="number">({{$cc->product_count}})</span>
        </label>
    </div>
</li>
@endforeach