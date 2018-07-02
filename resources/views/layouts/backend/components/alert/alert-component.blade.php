<div class="row">
    <div class="col-12">
            <div class="alert {{ $category }}">
                <i class="fa {{ $icon }}"></i> &nbsp;
                {{ $slot }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    </div>
</div>