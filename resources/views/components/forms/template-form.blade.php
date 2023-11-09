<div class="card card-default">
    <div class="card-header d-flex justify-content-between">
        <p class="card-title d-flex gap-2 align-content-center align-items-lg-center justify-content-center">
            <a class="btn btn-icon-only btn-link btn-light" href={{ $formRedirectBack }}>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
            </a>
            {{ $formHeader }}
        </p>

    </div>
    <div class="card-body">
        <form method={{ $formMethod }} action="{{ $formRoute }}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="box box-info padding-1">
                @isset($formBody)
                    <div class="box-body">
                        {{ $formBody }}
                    </div>
                @endisset

                @isset($formFooter)
                    <div class="d-flex justify-content-end">
                        {{ $formFooter }}
                    </div>
                @endisset
            </div>
        </form>
    </div>
</div>
