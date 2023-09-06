@if (session()->has('status'))
<div class="m-b-15">
    <div class="alert alert-success alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>
            <i class="icon fa fa-check"></i>
            {{ session('status') }}
        </h4>
    </div>
</div>
@elseif(session()->has('success'))
<div class="m-b-15">
    <div class="alert alert-success alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>
            <i class="icon fa fa-check"></i>
            {{-- < ?= $session->getFlashdata('success'); ?> --}}
        </h4>
    </div>
</div>
@elseif(session()->has('error'))
<div class="m-b-15">
    <div class="alert alert-danger alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>
            <i class="icon fa fa-exclamation-triangle"></i>
            {{-- < ?= $session->getFlashdata('error'); ?> --}}
        </h4>
    </div>
</div>
@elseif(session()->has('errors'))
<div class="form-group">
    <div class="error-message">
        {{-- < ?= $session->getFlashdata('errors'); ?> --}}
    </div>
</div>
@endif

