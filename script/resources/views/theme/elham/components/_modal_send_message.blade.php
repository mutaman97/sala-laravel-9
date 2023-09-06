<div class="modal fade" id="messageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-send-message" role="document">
        <div class="modal-content">
            <form id="form_send_message" novalidate="novalidate">
                <input type="hidden" name="receiver_id" id="message_receiver_id" value="< ?= $user->id; ?>">
                <input type="hidden" id="message_send_em" value="< ?= $user->send_email_new_message; ?>">
                {{-- < ?php if (!empty($productId)): ?> --}}
                    <input type="hidden" name="product_id" value="< ?= $productId; ?>">
                {{-- < ?php endif; ?> --}}
                <div class="modal-header">
                    <h4 class="title">{{ __('Send Message') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="send-message-result"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="user-contact-modal">
                                            <div class="left">
                                                <a href="#"><img src="#" alt="#"></a>
                                            </div>
                                            <div class="right">
                                                <strong><a href="< ?= generateProfileUrl($user->slug); ?>">getUsername</a></strong>
                                                {{-- < ?php if ($generalSettings->hide_vendor_contact_information != 1):
                                                    if (!empty($user->phone_number) && $user->show_phone == 1): ?> --}}
                                                        <p class="info">
                                                            <i class="icon-phone"></i><a href="javascript:void(0)" id="show_phone_number">{{ __('Show') }}</a>
                                                            <a href="tel:< ?= esc($user->phone_number); ?>" id="phone_number" class="display-none">$user->phone_number</a>
                                                        </p>
                                                    {{-- < ?php endif;
                                                    if (!empty($user->email) && $user->show_email == 1): ?> --}}
                                                    <p class="info"><i class="icon-envelope"></i>$user->email</p>
                                                {{-- < ?php endif;
                                                endif; ?> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ __('Subject') }}</label>
                                <input type="text" name="subject" id="message_subject" value="< ?= !empty($subject) ? esc($subject) : ''; ?>" class="form-control form-input" placeholder="{{ __('Subject') }}" required>
                            </div>
                            <div class="form-group m-b-sm-0">
                                <label class="control-label"><?= trans("message"); ?></label>
                                <textarea name="message" id="message_text" class="form-control form-textarea" placeholder="{{ __('Write a message') }}" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-md btn-custom"><i class="icon-send"></i>&nbsp;{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
