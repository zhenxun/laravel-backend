{{ Form::open(array('url' => $route)) }}
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