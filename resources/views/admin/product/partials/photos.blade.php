<div>
    <div class="pull-right">
        <button type="button" class="btn btn-primary waves-effect m-r-20 btn_show_medias" data-name="medias_photos[]" data-append="#sortable-photos">
            <i class="material-icons" style="width: 20px;">photo library</i> {{ trans('admin_product.select_media') }}
        </button>
    </div>
</div>
<div class="clearfix"></div>

<ul id="sortable-photos" class="list-photos">
    @if(!empty($product))
        @foreach($product->_photos as $rs)
            <li data-id="{{ $rs->id }}">
                <div class="box-image">
                    <img src="{{ $rs->img_medium }}" alt="{{ $product->name }}">
                    <button type="button"
                            class="btn_delete_this"
                            data-parent="li"
                            data-multi="1"
                            data-name="delete_medias[]"
                            data-value="{{ $rs->id }}">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>
                </div>
            </li>
        @endforeach
    @endif
</ul>
<div class="clearfix"></div>
<div class="multi-upload">
    <div class="box-upload">
        <label for="select-photos" class="label-select-images">
            <span class="glyphicon glyphicon-picture"></span>
        </label>
        <input type="file"
               multiple
               id="select-photos"
               data-append="#sortable-photos"
               data-name="photos[]"
               data-template="#photos-template"
               data-callback="callbackHandlePhotos"
               class="dz_select_photos"
               accept="image/*">
    </div>
</div>
