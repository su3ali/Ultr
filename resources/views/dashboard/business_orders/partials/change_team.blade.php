<div class="modal fade" id="changeGroupModel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" class="modal-content" id="edit_group_form" data-parsley-validate>
            {!! method_field('PUT') !!}
            @csrf
            <input type="hidden" id="edit_order_id" name="order_id">


            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.edit_team') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="order_id" id="edit_order_id">

                {{-- Group (Team) --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{ __('dash.groups') }}</label>
                        <select id="edit_group_id" name="assign_to_id" class="form-control select2" required>
                            <option value="">{{ __('dash.choose') }}</option>
                            {{-- Populated dynamically via JS --}}
                        </select>
                    </div>
                </div>

                {{-- Optional notes --}}
                <div class="form-group">
                    <label>{{ __('dash.note') }}</label>
                    <textarea name="note" class="ckeditor form-control" rows="4"></textarea>
                    @error('note')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                <button class="btn" data-dismiss="modal">{{ __('dash.close') }}</button>
            </div>
        </form>
    </div>
</div>