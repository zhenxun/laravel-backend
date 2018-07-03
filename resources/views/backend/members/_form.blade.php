{{ Form::open(array('url' => $csv_import_url, 'files' => true, 'class' => 'form-inline')) }}
    <div class="form-group mb-2">
      <label for="staticEmail2" class="sr-only">CSV :</label>
      <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="CSV :">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <label class="sr-only">csv file</label>
      <input type="file" name="csv" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">
      <i class="fa fa-cloud-upload" aria-hidden="true"></i> &nbsp; 
      {{ trans('global.buttons.import') }}
    </button>
{{ Form::close() }}

<hr>