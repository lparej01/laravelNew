<div>
    <div class="modal fade" id="{{ $idModal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @isset($modalTitle)
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $modalTitle }}</h1>
                    @endisset
                    <button type="button" class="btn btn-only btn-link btn-icon-only text-lg" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="bi bi-x-circle-fill "></i>
                    </button>
                </div>
                <div data-modal-content>

                </div>
                @isset($modalFooter)
                    <div class="modal-footer">
                        {{ $modalFooter }}
                    </div>
                @endisset

            </div>
        </div>
    </div>
</div>


