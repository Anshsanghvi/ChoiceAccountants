@extends('layouts.admin')

@section('title','SEO Content For Department')

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">SEO Content For Department</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/seo/department')}}" class="text-muted text-hover-primary">Departments</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">SEO Content For Department</li>
</ul>
@endsection

@section('content')
<form action="{{url('/seo/adddepseo')}}" id="kt_modal_add_form" enctype="multipart/form-data" method="post">
    @csrf
    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_normal1_tab" id="step1">Meta Titles and Images</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_normal2_tab" id="step2">Meta Descriptions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4 " data-bs-toggle="tab" href="#kt_user_view_normal3_tab" id="step3">Schemas</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="kt_user_view_normal1_tab" role="tabpanel">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row g-9 mb-7">
                    <h4 style="color: #f1416c;">You can only upload one from either an image or a URL</h4>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Open Graph Image</label>
                            <div class="d-flex flex-center flex-column py-5 mb-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/blankimg.svg')">
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url('assets/media/blankimg.svg')"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Add Image">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="ogImage" accept="image/*" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed all image file types</div>
                            </div>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Twitter Image</label>
                            <div class="d-flex flex-center flex-column py-5 mb-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/blankimg.svg')">
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url('assets/media/blankimg.svg')"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Add Image">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="twitterImage" accept="image/*" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed all image file types</div>
                            </div>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Or Open Graph Image Url</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Open Graph Image Url" id="ogImageurl" name="ogImageurl">
                            <span id="errormsgimg2"></span>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Or Twitter Image Url</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Twitter Image Url" id="twitterImageurl" name="twitterImageurl">
                            <span id="errormsgimg3"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Select Department</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Department" data-hide-search="false" data-dropdown-parent="#kt_modal_add_form" name="fieldId" id="fieldId">
                                <option value=""></option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Title" id="title" name="title">
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Meta Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Meta Title" id="metaTitle" name="metaTitle">
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Open Graph Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Open Graph Title" id="ogTitle" name="ogTitle">
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Facebook Open Graph Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Facebook Title" id="fbogTitle" name="fbogTitle">
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Twitter Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Twitter Title" id="twitterTitle" name="twitterTitle">
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Item Property Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Item Property Title" id="ipTitle" name="ipTitle">
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Dublin Core Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Dublin Core Title" id="dcTitle" name="dcTitle">
                        </div>

                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Dublin Core Creator</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Dublin Core Creator" id="dcCreator" name="dcCreator">
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Meta Keyword</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Meta Keywords" name="metaKeyword" id="metaKeyword">
                        </div>
                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Meta Author Name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Meta Author Name" id="metaAuthor" name="metaAuthor">
                        </div>
                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2 ">Meta Robot</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Option" data-hide-search="true" name="metaRobot[]" id="metaRobot" multiple>
                                <option value=""></option>
                                <option value="index">Index</option>
                                <option value="noindex">No Index</option>
                                <option value="follow">Follow</option>
                                <option value="nofollow">No Follow</option>
                            </select>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2 ">Twitter Type</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Type" data-hide-search="true" name="twitterType" id="twitterType">
                                <option value=""></option>
                                <option value="App">App</option>
                                <option value="Player">Player</option>
                                <option value="Summery">Summery</option>
                                <option value="Summerywithlargeimage">Summerywithlargeimage</option>
                            </select>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Facebook Open Graph Type</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Facebook Open Graph Type" id="fbogType" name="fbogType">
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Facebook Open Graph Site Name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Facebook Open Graph Site Name" id="fbogSiteName" name="fbogSiteName">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" data-bs-toggle="tab" onclick="document.getElementById('step2').click();">Next</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kt_user_view_normal2_tab" role="tabpanel">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row g-9 mb-7">
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Meta Description</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Meta Description" id="metaDescription" name="metaDescription" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Open Graph Description</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Open Graph Description" id="ogDescription" name="ogDescription" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Facebook Open Graph Description</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Open Graph Description" id="fbogDescription" name="fbogDescription" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Twitter Description</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Twitter Description" id="twitterDescription" name="twitterDescription" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Item Property Description</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Item Property Description" id="ipDescription" name="ipDescription" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Dublin Core Description</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Dublin Core Description" id="dcDescription" name="dcDescription" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" data-bs-toggle="tab" onclick="document.getElementById('step3').click();">Next</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kt_user_view_normal3_tab" role="tabpanel">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row g-9 mb-7">
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Schema 1</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Schema" id="schema1" name="schema1" rows="8"></textarea>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Schema 2</label>
                            <textarea class="form-control form-control-solid" placeholder="Enter Schema" id="schema2" name="schema2" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" id="kt_modal_add_submit">
                            <span class="indicator-label">Add</span>
                            <span class="indicator-progress">Plaese Wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const validateImageUrl = (inputElement, errorMsgElement) => {
            const inputValue = inputElement.value;
            const urlRegex = /^(https?:\/\/)?[\w\-]+(\.[\w\-]+)+[/#?]?.*\.(?:jpg|jpeg|png|gif|svg|webp)$/i;

            if (inputValue.trim() === "" || urlRegex.test(inputValue)) {
                errorMsgElement.textContent = "";
                enableSubmitButton();
            } else {
                errorMsgElement.textContent = "Invalid URL Format. Please Enter a Valid Image URL.";
                errorMsgElement.style.color = "#f1416c";
                disableSubmitButton();
            }
        };

        const synchronizeImageUrls = (sourceInput) => {
            const txtVal = sourceInput.value;
            const inputsToUpdate = [
                document.getElementById("ogImageurl"),
                document.getElementById("twitterImageurl"),
            ];

            inputsToUpdate.forEach(input => {
                if (input !== sourceInput) {
                    input.value = txtVal;
                    validateImageUrl(input, input.nextElementSibling);
                }
            });
        };

        const enableSubmitButton = () => {
            const submitButton = document.getElementById("kt_modal_add_submit");
            submitButton.removeAttribute("disabled");
            submitButton.querySelector(".indicator-label").textContent = "Add";
            submitButton.querySelector(".indicator-progress").style.display = "none";
        };

        const disableSubmitButton = () => {
            const submitButton = document.getElementById("kt_modal_add_submit");
            submitButton.setAttribute("disabled", "true");
            submitButton.querySelector(".indicator-label").textContent = "";
            submitButton.querySelector(".indicator-progress").style.display = "block";
        };

        const ogImageurlInput = document.getElementById("ogImageurl");
        ogImageurlInput.addEventListener("input", function() {
            validateImageUrl(ogImageurlInput, ogImageurlInput.nextElementSibling);
            synchronizeImageUrls(ogImageurlInput);
        });

        const twitterImageurlInput = document.getElementById("twitterImageurl");
        twitterImageurlInput.addEventListener("input", function() {
            validateImageUrl(twitterImageurlInput, twitterImageurlInput.nextElementSibling);
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#ogImageurl').keyup(function(e) {
            var txtVal = $(this).val();
            $('#twitterImageurl').val(txtVal);
        });
    });
</script>
@endsection