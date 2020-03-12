@if(!empty($subcategories))
    <option>-- Select Subcategory --</option>
    @foreach($subcategories as $subcategory)
        <option value="{!! $subcategory->id !!}">{!! $subcategory->title !!}</option>
    @endforeach
@else
    <option>- Subcategory Not found -</option>
@endif
