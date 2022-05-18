<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto mt-5">
                <div class="card">
                    <span class="up_error"></span>
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="" id="form" name="form" enctype="multipart/form-data">                            
                            @method('PUT')
                            <ul id="upform_errlist"></ul>
                            <div class="row">
                                <div class="form-group col">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg></span>
                                    <label for="">First Name</label>
                                    <input type="text" id="form_fname" name="fname" class="form-control fname" placeholder="Name" style="margin-bottom: 3%;" value="{{$data->fname}}" >
                                    <span class="error_form" id="fname_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                                <div class="form-group col">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg></span>
                                    <label for="">Last Name</label>
                                    <input type="text" id="form_lname" name="lname" class="form-control lname" placeholder="Name" style="margin-bottom: 3%;" value="{{$data->lname}}" >
                                    <span class="error_form" id="lname_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg></span>
                                <label for="">Email ID</label>
                                <input type="email" id="form_email" name="email" class="form-control email" placeholder="Email" style="margin-bottom: 3%;" value="{{$data->email}}">
                                <span class="error_form" id="email_error_message" style="font-size: 16px; color:red;"></span>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z" />
                                        </svg></span>
                                    <label for="">Date of Birth</label>
                                    <input type="date" id="form_date" name="date" class="form-control date" placeholder="Date of Birth" style="margin-bottom: 3%;" value="{{$data->date}}"  >
                                    <span class="error_form" id="date_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                                <div class="form-group col">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                        </svg></span>
                                    <label for="">Phone Number</label>
                                    <input type="text" id="form_contact" name="contact" class="form-control contact" placeholder="Contact Number" style="margin-bottom: 3%;" value="{{$data->contact}}" >
                                    <span class="error_form" id="contact_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                    </svg></span>
                                <label for="">Password</label>
                                <input type="password" id="form_passwords" name="password" class="form-control password" placeholder="Password" style="margin-bottom: 3%;" value="{{$data->password}}">
                                <span class="error_form" id="password_error_message" style="font-size: 16px; color:red;"></span>
                                <span><input type='checkbox' id='pro_toggle'>&nbsp; <span id='pro_toggleText'>Show Password</span></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="update" class="btn btn-info">Update</button>
                                <button type="submit" class="btn btn-info" onclick="onDownload()">JSON Download</button>
                                <button class="btn btn-info"><a href="dashboard" class="text-decoration-none" style="color: black;">Cancel</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ secure_asset('js/json.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('js/update.js') }}"></script>
</html>