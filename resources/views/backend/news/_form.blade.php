{{ Form::open(array('url' => $route)) }}

      @component('layouts.backend.components.form_header_box')
        @slot('attachment') {{ route('admin.news.index') }} @endslot
        @slot('back') {{ route('admin.news.index') }} @endslot
      @endcomponent

    <div class="form-group">
      <label for="title"><h4>標題:</h4></label>
      {{ Form::input('text', 'title', null, ['class'=> 'form-control', 'placeholder' => '最新消息標題']) }}
    </div>
    <div class="form-group">
      <label><h4>內容:</h4></label>
      <textarea id="summernote" name="editordata"></textarea>
    </div>
    <div class="form-group">
      <label>排序:</label>
      {{ Form::selectRange('rank', 1, 50, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group form-check">
      {{ Form::checkbox('agree', 1, true, ['class' => 'form-check-input']) }}
      <label class="form-check-label" for="exampleCheck1">發布?</label>
    </div>
{{ Form::close() }}

@component('layouts.backend.components.modal')
    {{ Form::open(array('route' => 'admin.attachments.store', 'files' => true)) }}
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">附件上傳</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      {{ Form::file('file', ['class' => 'form-control']) }}
      <hr>
      <input type="text" class="current_page" value="1">
      <div class="d-flex flex-row flex-wrap attachments-viewer">
      </div>
      <div class="pagination-bar"></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
      <button type="submit" class="btn btn-primary">儲存</button>
    </div>
    {{ Form::close() }}
@endcomponent