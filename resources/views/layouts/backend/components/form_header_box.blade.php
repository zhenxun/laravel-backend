<div class="col-12 text-right form-header-box">
  <ul>
    <li>
        <button type="submit" class="form-header-box-save"> <i class="fa fa-save"></i> {{ trans('header.form.save') }} </button>
    </li>
    @if($open_attachment == 'true')
    <li>
        <button type="button" class="form-header-box-attachment" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="fa fa-paperclip"></i> {{ trans('header.form.attachment') }}
        </button>
    </li>
    @endif
    <li>
        <a href="{{ $back }}">
            <i class="fa fa-angle-left"></i> {{ trans('header.form.back') }}
        </a>
    </li>
  </ul>

</div>