<div class="modal fade" id="editTechModel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #ddd">{{ __('dash.rate_trainee') }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" id="edit_tech_form"
                    data-parsley-validate="">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="box-body">
                        <div class="form-row mb-6">
                            <div class="form-group col-md-6">
                                <label for="edit_name" class="form-label fw-bold">{{ __('dash.name') }}</label>
                                <input type="hidden" id="tech_id" name="tech_id">
                                <input required type="text" name="name" readonly class="form-control" id="edit_name"
                                    placeholder="{{ __('dash.name') }}">
                                @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-md-6">
                                <label for="edit_rate" class="form-label fw-bold">{{ __('dash.rate') }}</label>
                                <select id="edit_rate" class="select2 form-control pt-1" name="rate"
                                    style="border-radius: 8px; border: 2px solid #ddd;">
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($ratings as $rate)
                                    <option value="{{ $rate->id }}">
                                        {{ app()->getLocale() == 'ar' ? $rate->name_ar : $rate->name_en }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-row align-items-center mb-4">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="upload_file" class="form-label fw-bold">{{ __('dash.upload') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input shadow-sm w-100" id="upload_file"
                                            name="upload_file" accept="image/*">
                                        <label class="custom-file-label" for="upload_file" id="upload_label">{{
                                            __('dash.choose_file') }}</label>
                                    </div>
                                </div>
                                @error('upload_file')
                                <div class="alert alert-danger mt-2 col-md-12">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>


                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <label for="edit_note" class="form-label fw-bold">{{ __('dash.note') }}</label>
                                <textarea class="form-control shadow-sm" id="edit_note" name="note" rows="4"
                                    style="border-radius: 8px; resize: vertical; border: 2px solid #ddd; transition: all 0.3s ease-in-out;"></textarea>
                                @error('note')
                                <div class="alert alert-danger mt-2 px-3 py-2"
                                    style="border-radius: 8px; font-size: 14px;">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button class="btn btn-light" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            {{ __('dash.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('script')
<script>
    let myImage = new FileUploadWithPreview('myImage')

        document.getElementById('upload_file').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : '{{ __('dash.choose_file') }}';
            document.getElementById('upload_label').textContent = fileName;
        });
</script>

<style>
    .form-label {
        font-weight: bold;
        font-size: 1rem;
        color: #495057;
    }

    .custom-file {
        position: relative;
        border: 2px dashed #d1d3e2;
        border-radius: 8px;
        padding: 10px;
        transition: all 0.3s ease;
    }

    .custom-file:hover {
        border-color: #5a5c69;
        background-color: #f8f9fc;
    }

    .custom-file-input {
        opacity: 0;
        /* Hides the default input */
        position: absolute;
        z-index: 2;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .custom-file-label {
        position: relative;
        z-index: 1;
        display: block;
        width: 100%;
        height: 100%;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        text-align: center;
        color: #6c757d;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .custom-file-input:focus+.custom-file-label {
        border: 2px solid #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        color: #495057;
        background-color: #e9ecef;
    }

    /* Error Styling */
    .alert.alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 8px;
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
    }

    /* Additional styling for icons */
    .bi-exclamation-circle {
        margin-right: 5px;
    }

    /* Error Styling */
    .alert.alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 8px;
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
    }

    /* Additional styling for icons */
    .bi-exclamation-circle {
        margin-right: 5px;
    }
</style>
@endpush