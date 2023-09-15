@extends('layouts.web')

@section('title')
{{$career->name}} | Choice Accountants
@endsection

@section('meta')
@show

@section('style')
<style>
    body {

        background-color: #f0f0f0;
    }

    #custom-form {
        /* max-width: 400px; */
        margin: 0 auto;
        /* padding: 20px; */
        /* background-color: #fff; */
        /* border: 1px solid #ddd; */
        border-radius: 5px;
        /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
    }

    label {
        display: block;
        margin-bottom: 6px;
        /* font-weight: bold; */
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    textarea {
        resize: vertical;
    }

    button[type="submit"] {
        background-color: #fff;
        color: #268d44;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #268d44;
    }

    #privacy-policy {
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<main>
    <header class="l-header l-header--padding-tiny bg-purple relative">
        <div class="container relative zindex-3">
            <h1 class="headline-2 mb-0em"> {{$career->title}} (Minimum 2 years experience) </h1>
            <div class="content  mt-20em">
                <p style="white-space:pre-line;">{{$career->description}}</p>
                @if($career->responsibilities)
                <h3 class="headline-3">Responsibilities:</h3>
                <ul type="disc">
                    <?php
                    $responsibilitiesArray = explode('.', $career->responsibilities);
                    ?>
                    @foreach ($responsibilitiesArray as $responsibility)
                    @if (!$loop->last)
                    <li>{{ $responsibility }}.</li>
                    @endif
                    @endforeach
                </ul>
                @endif
                @if($career->benefits)
                <h3 class="headline-3">Benefits</h3>
                <ul>
                    <?php
                    $benefitsArray = explode('.', $career->benefits);
                    ?>
                    @foreach ($benefitsArray as $benefit)
                    @if (!$loop->last)
                    <li>{{ $benefit }}.</li>
                    @endif
                    @endforeach
                </ul>
                @endif

                <p><br /><em><strong>Join us at Choice and seize this exciting opportunity to be an integral part of our
                            ongoing growth and success.</strong></em></p>
            </div>
        </div>
    </header>
    <section class="section">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-xl-6 padding-xl-240 align-center">
                    <div class="relative zindex-3">
                        <h2 class="headline-3"> Contact Us </h2>
                        <div class="content  mb-30em">
                            <p><span>If you have any questions or would like more information, please use the contact form.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 padding-xl-96 bg-lightOffWhite">
                    <div class=" form form--card bg-purple max-width-720 form-wrapper-18 " style="padding: 1.5rem;">
                        <div class="relative zindex-3">
                            <h2 class="headline-3 mb-5em js-form-headline"> Send a message </h2>
                            <div class="content mb-10em js-form-content">
                                <p> We aim to respond to all enquiries within 72 hours. </p>
                            </div>
                            <div id="hubspotform-18"></div>

                            <div class="form-wrapper-18">
                                <div class="js-form-content">
                                    <form action="{{url('/save')}}" id="custom-form1" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <label for="fname">First Name *</label>
                                        <input type="text" id="fname1" name="fname" placeholder="Enter Your First Name" onkeyup="checkfname()">
                                        <span id="nameerror1"></span>

                                        <label for="lname">Last Name *</label>
                                        <input type="text" id="lname1" name="lname" placeholder="Enter Your First Name" onkeyup="checklname()">
                                        <span id="lnameerror1"></span>

                                        <label for="email">Email *</label>
                                        <input type="email" id="email1" name="email" placeholder="Enter Your Email" onkeyup="checkemail()">
                                        <span id="emailerror1"></span>

                                        <label for="phone">Phone Number *</label>
                                        <input type="tel" id="phone1" name="phone" placeholder="Enter Your Phone No" onkeyup="checknum()" maxlength="10">
                                        <span id="numbererror1"></span>

                                        <label for="company">Company Name</label>
                                        <input type="text" id="companyName1" name="companyName" placeholder="Enter Company Name">

                                        <label for="message">Message/Question</label>
                                        <textarea id="message1" name="message" placeholder="Enter Your Message"></textarea>

                                        <div id="privacy-policy">
                                            <label for="privacy-policy">By submitting this form, you consent to our <a href="{{url('/privacy-policy')}}" target="_blank">privacy policy</a>.</label>
                                        </div>

                                        <button type="button" class="submitformbtn" id="submit-button1" >Submit Details</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="bg-shape size-144 quater-border-filled gradient-3 top right rotate-270">
                            <div class=" bg-shape__inner animation-rotateRight90 mobile-no-animation" data-animation-delay="600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('scripts')

<script>
    function checkemail() {
        var emailInput = document.getElementById('email1');
        var emailValidation = document.getElementById('emailerror1');
        var button = document.getElementById('submit-button1');

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailInput.value.match(emailRegex)) {
            emailValidation.textContent = '';
            button.disabled = false;
        } else {
            emailValidation.textContent = 'Please enter valid email';
            emailValidation.style.color = 'red';
            button.disabled = true;

        }
    }

    function checknum() {
        var numberInput = document.getElementById('phone1');
        var numberValidation = document.getElementById('numbererror1');
        var button = document.getElementById('submit-button1');

        var numberRegex = /^[0-9]{10}$/;

        if (numberInput.value.match(numberRegex)) {
            numberValidation.textContent = '';
            button.disabled = false;
        } else {
            numberValidation.textContent = 'Please enter valid phone number';
            numberValidation.style.color = 'red';
            button.disabled = true;
        }
    }

    function checkfname(){
        var fnameInput = document.getElementById('fname1');
        var fnameValidation = document.getElementById('nameerror1');
        var button = document.getElementById('submit-button1');

        var fnameRegex = /^[a-zA-Z ]*$/;

        if (fnameInput.value.match(fnameRegex)) {
            fnameValidation.textContent = '';
            button.disabled = false;
        } else {
            fnameValidation.textContent = 'Please enter valid name';
            fnameValidation.style.color = 'red';
            button.disabled = true;
        }
    }

    function checklname(){
        var lnameInput = document.getElementById('lname1');
        var lnameValidation = document.getElementById('lnameerror1');
        var button = document.getElementById('submit-button1');

        var lnameRegex = /^[a-zA-Z ]*$/;

        if (lnameInput.value.match(lnameRegex)) {
            lnameValidation.textContent = '';
            button.disabled = false;
        } else {
            lnameValidation.textContent = 'Please enter valid name';
            lnameValidation.style.color = 'red';
            button.disabled = true;
        }
    }
</script>

<script>
    document.getElementById('submit-button1').addEventListener('click', function(event) {
        event.preventDefault();
        var fname = document.getElementById('fname1').value;
        var lname = document.getElementById('lname1').value;
        var phone = document.getElementById('phone1').value;
        var email = document.getElementById('email1').value;
        var nameError = document.getElementById('nameerror1');
        var lnameError = document.getElementById('lnameerror1');
        var numberError = document.getElementById('numbererror1');
        var emailError = document.getElementById('emailerror1');

        nameError.textContent = '';
        lnameError.textContent = '';
        numberError.textContent = '';
        emailError.textContent = '';

        if (fname.trim() === '') {
            nameError.textContent = 'Please enter first name';
            nameError.style.color = 'red';
        }

        if (lname.trim() === '') {
            lnameError.textContent = 'Please enter last name';
            lnameError.style.color = 'red';
        }

        if (email.trim() === '') {
            emailError.textContent = 'Please enter email';
            emailError.style.color = 'red';
        }

        if (phone.trim() === '') {
            numberError.textContent = 'Please enter phone number';
            numberError.style.color = 'red';
        }


        if (fname.trim() === '' || phone.trim() === '' || email.trim() === '' || lname.trim() === '') {
            return;
        }

        var formData = new FormData($('#custom-form1')[0]);
        $.ajax({
            type: "POST",
            url: "{{ url('/save') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 1) {
                    console.log(response);
                    $('#custom-form1')[0].reset();
                } else {
                    $('#custom-form1')[0].reset();
                }
            },
            error: function(response) {
                console.log(response);
            }
        });

    });
</script>
@endsection