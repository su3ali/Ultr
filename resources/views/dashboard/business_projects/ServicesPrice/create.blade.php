<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.add_service_price_for_project') }}</h5>
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
                <form action="{{ route('dashboard.business_projects_prices.store') }}" method="post"
                    id="create-price-form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="client_project_id">{{ __('dash.project') }}</label>
                            <select name="client_project_id" id="client_project_id" class="form-control" required>
                                <option value="">{{ __('dash.select_project') }}</option>
                                @foreach($clientProjects as $project)
                                <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
                                @endforeach
                            </select>
                            @error('client_project_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="service_id">{{ __('dash.service') }}</label>
                            <select name="service_id" id="service_id" class="form-control" required>
                                <option value=""> {{ __('dash.select_service') }}</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="price">{{ __('dash.price') }}</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" class="form-control"
                                required>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dash.close')
                            }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>