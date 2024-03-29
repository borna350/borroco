<div class="card">
    <div class="header">
        <h2>Product Images</h2>
        <ul class="header-dropdown">
            <li class="remove">
                <div class="checkbox">
                    <input id="addImage" type="checkbox" {{ isset($data) && $data->images ? 'checked':'' }} value="1" name="check_image">
                    <label for="addImage">
                        Add Image
                    </label>
                </div>
            </li>
        </ul>
    </div>

    <div class="body imageBody" style="{{ isset($data) && $data->images ? '':'display:none' }}">
        <div class="mb-3">
            <label>Input Product Image <small class="text-danger">Image accepted: size (1200x1200)</small> <span class="text-danger">*</span></label>
            <div class="form-group">
                <div class="row">
                    <div class="col-10">
                        <input type="file"  name="product_image[]" value="" class="form-control imageInput" accept="image/*">
                    </div>
                    <div class="col-1 text-right">
                        <button onclick="imageFieldsAdded();"  type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-collection-add"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div id="image_fields"></div>

        @if(!empty($data->images))
        <div style="margin: 40px 0 65px 0;">
            <div class=" row clearfix">
                @foreach($data->images as $proImg)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card product_item">
                        <div class="body">
                            <div class="cp_img p-0">
                                <img src="{{ asset('media/product/'. $proImg->image) }}" alt="Product" class="img-fluid">
                                <div class="hover">
                                    <a href="{{ url('admin/product-image/delete/'.$proImg->id) }}" onclick="return confirm('Are you sure..?')" class="btn btn-primary btn-sm waves-effect"><i class="zmdi zmdi-delete"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@push('stack_js')
    <script>
        var imageInc = 1;
        function imageFieldsAdded() {
            imageInc++;
            var objTo = document.getElementById('image_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group thisImage" + imageInc);
            var rdiv = 'thisImage' + imageInc;
            divtest.innerHTML =
                '<div class="mb-3 imgInput">'+
                '<div class="form-group">'+
                '<div class="row">'+
                '<div class="col-10">'+
                '<input type="file"  name="product_image[]" value="" class="form-control imageInput" accept="image/*"  required>'+
                '</div>'+
                '<div class="col-1 text-right">'+
                '<button onclick="remove_image(' + imageInc + ');"  type="button" class="btn m-0 btn-default btn-icon btn-simple btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>';
            objTo.appendChild(divtest)
        }
        function remove_image(rid) {
            $('.thisImage' + rid).remove();
        }
        $(document).ready(function() {
            $("#addImage").click(function(event) {
                if ($(this).is(":checked")){
                    $(".imageBody").show();
                } else{
                    $(".imageBody").hide();
                    $(".imageInput").val("");
                    $('.imgInput').remove();
                }
            });
        });
    </script>
@endpush

