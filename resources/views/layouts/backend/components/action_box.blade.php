<div class="p-2 mb-3 action-box">
    <a href="{{ $url }}" {{ (isset($javascript))? $javascript:'' }}>
        <div class="grid-container">
            <div class="icon">
                <span>
                    <i class="fa {{ $icon }} fa-3x"></i>
                </span>
            </div>
            <div class="title mt-3">
                {{ $slot }}
            </div>
        </div>
    </a>
</div>
