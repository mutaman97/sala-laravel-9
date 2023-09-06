<!-- < ?php if (authCheck() && $product->user_id != user()->id): ?> -->
    <div class="modal fade" id="reportProductModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-custom modal-report-abuse">
            <form id="form_report_product" method="post">
                <input type="hidden" name="id" value="product->id">
                <div class="modal-header">
                    <h5 class="modal-title">report_this_product</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"><i class="icon-close"></i> </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="response_form_report_product" class="col-12"></div>
                        <div class="col-12">
                            <div class="form-group m-0">
                                <label class="control-label"><?= trans('description') ?></label>
                                <textarea name="description" class="form-control form-textarea" placeholder="abuse_report_exp" minlength="5" maxlength="10000" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-md btn-custom">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- < ?php endif; -->
