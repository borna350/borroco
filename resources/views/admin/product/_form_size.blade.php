<div class="card">
    <div class="header">
        <h2>Product Size</h2>
        <ul class="header-dropdown">
            <li class="remove">
                <div class="checkbox">
                    <input id="addSize" type="checkbox" name="check_size" {{ isset($data) && $data->sizes ? 'checked':'' }} value="{{ old('check_size', 1) }}">
                    <label for="addSize">
                        Add Size
                    </label>
                </div>
            </li>
        </ul>
    </div>

    <div class="body sizeBody" style="{{ isset($data) && $data->sizes ? '':'display:none' }}">
        <div class="mb-3">
            <label for="name">Input Product Size<span class="text-danger">*</span></label>
            <div class="form-group">
                <div class="row">
                    <div class="col-10">
                        <input type="text"  name="product_size[]" value="" class="form-control sizeInput" placeholder="Product Size">
                    </div>
                    <div class="col-1 text-right">
                        <button onclick="sizeFieldsAdded();"  type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-collection-add"></i></button>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($data->sizes))
            @php $si = 1 @endphp
            @foreach($data->sizes as $key => $size)
                <div class="mb-3 siInput">
                    <div class="form-group thisSize{{ $si }}">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="product_size[]" value="{{ $size->size }}" class="form-control sizeInput" placeholder="Product Size" required="">
                            </div>
                            <div class="col-1 text-right">
                                <button onclick="remove_size({!! $si !!});" type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                @php $si++ @endphp
            @endforeach
        @endif

        <div id="size_fields"></div>
    </div>
</div>



@push('stack_js')
    <script>
        var sizeInc = 1;
        function sizeFieldsAdded() {
            sizeInc++;
            var objTo = document.getElementById('size_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group thisSize" + sizeInc);
            var rdiv = 'thisSize' + sizeInc;
            divtest.innerHTML =
                '<div class="mb-3 siInput">'+
                '<div class="form-group">'+
                '<div class="row">'+
                '<div class="col-10">'+
                '<input type="text"  name="product_size[]" value="" class="form-control sizeInput"  placeholder="Product Size" required>'+
                '</div>'+
                '<div class="col-1 text-right">'+
                '<button onclick="remove_size(' + sizeInc + ');"  type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>';
            objTo.appendChild(divtest)
        }
        function remove_size(rid) {
            $('.thisSize' + rid).remove();
        }
        $(document).ready(function() {
            $("#addSize").click(function(event) {
                if ($(this).is(":checked")){
                    $(".sizeBody").show();
                } else{
                    $(".sizeBody").hide();
                    $(".sizeInput").val("");
                    $('.siInput').remove();
                }
            });
        });
    </script>
@endpush
