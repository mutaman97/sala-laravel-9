<div class="modal fade" id="reportReviewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-custom">
        <form id="form_report_review" method="post">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Report Review') }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"><i class="icon-close"></i> </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="response_form_report_review" class="col-12"></div>
                    <div class="col-12">
                        <input type="hidden" id="report_review_id" name="id" value="">
                        <div class="form-group m-0">
                            <label class="control-label">{{ __('Discription') }}</label>
                            <textarea name="description" class="form-control form-textarea" placeholder="{{ __('Explain Report Abuse') }}" minlength="5" maxlength="10000" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-md btn-custom">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
    </div>
</div>
