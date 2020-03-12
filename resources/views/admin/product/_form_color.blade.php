<div class="card">
    <div class="header">
        <h2>Product Color</h2>
        <ul class="header-dropdown">
            <li class="remove">
                <div class="checkbox">
                    <input id="addColor" type="checkbox" name="check_color" {{ isset($data) && $data->colors ? 'checked':'' }} value="{{ old('check_color', '1') }}">
                    <label for="addColor">
                        Add Color
                    </label>
                </div>
            </li>
        </ul>
    </div>

    <div class="body colorBody" style="{{ isset($data) && $data->colors ? '':'display:none' }}">
        <div class="mb-3">
            <label for="name">Input Color Name<span class="text-danger">*</span></label>
            <div class="form-group">
                <div class="row">
                    <div class="col-10">
                        <input type="text"  name="product_color[]" value="" class="form-control colorInput" placeholder="Product Color">
                    </div>
                    <div class="col-1 text-right">
                        <button onclick="colorFieldsAdded();"  type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-collection-add"></i></button>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($data->colors))
            @php $ci = 1 @endphp
            @foreach($data->colors as $key => $color)
                <div class="mb-3 vInput">
                    <div class="form-group thisColor{{ $ci }}">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="product_color[]" value="{{ $color->colors  }}" class="form-control colorInput" placeholder="Product Color" required="">
                            </div>
                            <div class="col-1 text-right">
                                <button onclick="remove_color({!! $ci !!});" type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                @php $ci++ @endphp
            @endforeach
        @endif

        <div id="color_fields"></div>
    </div>
</div>

@push('stack_js')
<script>
    var colorInc = 1;

    function colorFieldsAdded() {
        colorInc++;
        var objTo = document.getElementById('color_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group thisColor" + colorInc);
        var rdiv = 'thisColor' + colorInc;
        divtest.innerHTML =
            '<div class="mb-3 vInput">'+
            '<div class="form-group">'+
            '<div class="row">'+
            '<div class="col-10">'+
            '<input type="text"  name="product_color[]" value="" class="form-control colorInput"  placeholder="Product Color" required>'+
            '</div>'+
            '<div class="col-1 text-right">'+
            '<button onclick="remove_color(' + colorInc + ');"  type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>';
        objTo.appendChild(divtest)
    }
    function remove_color(rid) {
        $('.thisColor' + rid).remove();
    }
    $(document).ready(function() {
        $("#addColor").click(function(event) {
            if ($(this).is(":checked")){
                $(".colorBody").show();
            } else{
                $(".colorBody").hide();
                $(".colorInput").val("");
                $('.vInput').remove();
            }
        });
    });
</script>
@endpush

