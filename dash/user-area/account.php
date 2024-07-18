<?php 

include('includes/header.php');


if (isset($_POST['changepicture'])) {

    // --- 1. Image Validation ---
    $target_dir = "pictures/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }

    // --- 2. File Type Restriction --- 
    $allowedTypes = array("jpg", "jpeg", "png", "gif"); // Add more if needed
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }
    
    // --- 3. File Size Restriction (Optional) ---
    $maxFileSize = 5 * 1024 * 1024; // 5 MB (adjust as needed)
    if ($_FILES["fileToUpload"]["size"] > $maxFileSize) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }

    // --- 4. Security Enhancements ---
    // a. Generate a unique filename to prevent overwriting
    $pname = uniqid() . "." . $imageFileType; // e.g., "5f4dcc3b5f582.jpg"
    $target_file = $target_dir . $pname;

    // b. Sanitize the $clientid to prevent SQL injection
    $clientid = mysqli_real_escape_string($con, $clientid);

    // --- 5. Update Database and Move File ---
    if ($uploadOk == 1) {
        $updatepic = "UPDATE clients SET avatar = '$pname' WHERE username = '$clientid'";
        if (mysqli_query($con, $updatepic)) { 
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            echo "<script>alert('Profile picture changed successfully')</script>";
            header("location:account.php");
        } else {
            echo "<script>alert('Error updating database.')</script>";
        }
    } else {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    }
}

?>
 <!-- Container Fluid-->
 <div class="wrapper">
 <div class="container-fluid" id="container-wrapper">
          <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Account Settings</h4>
                </div>
            </div>
        </div>
        <!-- end page title --> 

          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <!-- Form Basic -->
                <div class="card mb-4">
                
                    <div class="card-body">

                      <div class="profile-section d-flex" >
                        <div class="profile-img w-25">
                            <img src="pictures/<?php echo $getdetails['avatar']; ?>" id="avatar_preview" class="w-100 img-thumbnail">
                            <span class="text-danger avatar fts-12"></span>
                            <form method="POST" action="" enctype="multipart/form-data">
                               <input name="fileToUpload" type="file" class="form-file-input" id="customFile">
                    <label class="form-file-label" for="customFile">
                        <button type="submit" name="changepicture" class="btn btn-primary">Change profile picture</button>
                       
                    </label>
                                </form>
                        </div>
                        <div class="personal-details w-50 pl-3">
                            <h3 class="d-full_name"><?php echo $getdetails['first_name']; ?> <?php echo $getdetails['last_name']; ?></h3>
                            <p class="d-email"><?php echo $getdetails['email']; ?></p>
                            <!--<form enctype="multipart/form-data" class="avatarForm">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="change_avatar" class="btn btn-primary btn-sm chng-btn">Change avatar</label>-->
                            <!--        <input type="file" name="avatar" id="change_avatar" class="d-none" class="el">-->
                            <!--    </div>-->
                            <!--</form>-->
                        </div>
                      </div>

                      <nav class="mt-5">
                        <ul class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal" role="tab" aria-controls="nav-personal" aria-selected="true">Personal Information</a>
                            </li>

                            

                            <li class="nav-item">
                                <a class="nav-link" id="nav-account-security-tab" data-toggle="tab" href="#nav-account-security" role="tab" aria-controls="nav-account-security" aria-selected="false">Account Security</a>
                            </li>
                            
                        </ul>
                      </nav>

                      <div class="tab-content mt-4" id="nav-tabContent">

                          <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
                            <form method="post" autocomplete="off" class="personalInfoForm">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">First name</label>
                                            <input type="text" name="first_name" class="form-control el" placeholder="Enter your first name" value="<?php echo $getdetails['first_name']; ?>" disabled>
                                            <span class="text-danger first_name fts-12"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Last name</label>
                                            <input type="text" name="last_name" class="form-control el" placeholder="Enter your last name" value="<?php echo $getdetails['last_name']; ?>" disabled>
                                            <span class="text-danger last_name fts-12"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control el" placeholder="Enter your email address" value="<?php echo $getdetails['email']; ?>" disabled>
                                        <span class="text-danger email fts-12"></span>
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control el" placeholder="Enter your phone number" value="<?php echo $getdetails['phone']; ?>" disabled>
                                        <span class="text-danger phone fts-12"></span>
                                      </div>
                                    </div>

                                    

                                    <!--<div class="col-md-6">-->
                                    <!--  <div class="form-group">-->
                                    <!--    <label for="company">Date Of Birth</label>-->
                                    <!--    <input type="date" name="date_of_birth" class="form-control el" placeholder="Enter your date of birth" value="{{ date('Y-m-d', strtotime(auth('client')->user()->date_of_birth)) }}">-->
                                    <!--    <span class="text-danger date_of_birth fts-12"></span>-->
                                    <!--  </div>-->
                                    <!--</div>-->

                                    <!--<div class="col-md-12">-->
                                    <!--  <div class="form-group">-->
                                    <!--    <label for="address">Address</label>-->
                                    <!--    <input type="text" name="physical_address" class="form-control el" placeholder="Enter your address" value="{{ auth('client')->user()->physical_address }}">-->
                                    <!--    <span class="text-danger physical_address fts-12"></span>-->
                                    <!--  </div>-->
                                    <!--</div>-->

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" class="form-control el" placeholder="Enter your country" value="<?php echo $getdetails['country']; ?>" disabled>
                                        <span class="text-danger country fts-12"></span>
                                      </div>
                                    </div>

                                    <!--<div class="col-md-6">-->
                                    <!--  <div class="form-group">-->
                                    <!--    <label for="region">Region</label>-->
                                    <!--    <input type="text" name="region" class="form-control el" placeholder="Enter your region" value="{{ auth('client')->user()->region }}">-->
                                    <!--    <span class="text-danger region fts-12"></span>-->
                                    <!--  </div>-->
                                    <!--</div>-->

                                    <!--<div class="col-md-6">-->
                                    <!--  <div class="form-group">-->
                                    <!--    <label for="town">Town</label>-->
                                    <!--    <input type="text" name="town" class="form-control el" placeholder="Enter your town" value="{{ auth('client')->user()->town }}">-->
                                    <!--    <span class="text-danger town fts-12"></span>-->
                                    <!--  </div>-->
                                    <!--</div>-->

                                <!--    <div class="col-md-6">-->
                                <!--      <div class="form-group">-->
                                <!--        <label for="postcode">Post Code</label>-->
                                <!--        <input type="text" name="postcode" class="form-control el" placeholder="Enter your postcode" value="{{ auth('client')->user()->postcode }}">-->
                                <!--        <span class="text-danger postcode fts-12"></span>-->
                                <!--      </div>-->
                                <!--    </div>-->

                                </div>
                                

                                

                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-sm saveBtn">Save changes</button>
                                </div>

                            </form>
                          </div>

                          <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">

                            <form method="post" autocomplete="off" class="paymentForm">

                                <div class="form-group">
                                  <label for="payment_method">Select Payment method</label>
                                  <select name="payment_method" id="payment_method" class="form-control el">
                                    <option value="">-- Select --</option>
                                    @foreach($payment_methods as $payment_method)
                                    @php 
                                      $payment = json_decode($payment_method->data);
                                    @endphp
                                    <option value="{{ $payment_method->id }}" @if(!empty($payment_info) && $payment_info->payment_method_id == $payment_method->id) selected @endif>{{ empty($payment->method_name) ? 'Bank Transfer': ucwords($payment->method_name) }}</option>
                                    @endforeach
                                  </select>
                                  <span class="text-danger payment_method fts-12"></span>
                                </div>

                                <div class="form-group method @if(empty($paymentInfoData->note)) d-none @endif manual-method">
                                  <label for="manual">Enter payment note below</label>
                                  <textarea rows="5" class="form-control el" name="note" placeholder="Write here...">{{ !empty($paymentInfoData->note) ? $paymentInfoData->note:''  }}</textarea>
                                  <span class="note text-danger" style="font-size:12px;"></span>
                                </div>

                                <div class="form-group method @if(empty($paymentInfoData->bank_name)) d-none @endif bank-method">
                                    <label class="border-bottom pb-2">Enter bank details below</label>
                                  
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control el" placeholder="Enter bank name" value="{{ !empty($paymentInfoData->bank_name) ? $paymentInfoData->bank_name:''  }}">
                                            <span class="bank_name text-danger" style="font-size:12px;"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" name="account_name" class="form-control el" placeholder="Enter account name" value="{{ !empty($paymentInfoData->account_name) ? $paymentInfoData->account_name:'' }}">
                                            <span class="account_name text-danger" style="font-size:12px;"></span>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" name="account_number" class="form-control el" placeholder="Enter account number" value="{{ !empty($paymentInfoData->account_number) ? $paymentInfoData->account_number:'' }}">
                                            <span class="account_number text-danger" style="font-size:12px;"></span>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Swift Code</label>
                                            <input type="text" name="swift_code" class="form-control el" placeholder="Enter swift code" value="{{ !empty($paymentInfoData->swift_code) ? $paymentInfoData->swift_code:'' }}">
                                            <span class="swift_code text-danger" style="font-size:12px;"></span>
                                        </div>
                                      </div>

                                    </div>
                                  
                                </div>

                                <div class="form-group auto-method method @if(empty($paymentInfoData->email)) d-none @endif paypal-method">
                                  <label for="paypal">Enter your paypal email below</label>
                                  <input type="text" class="form-control el" name="email" placeholder="Type here..." value="{{ !empty($paymentInfoData->email) ? $paymentInfoData->email:'' }}">
                                  <span class="email text-danger" style="font-size:12px;"></span>
                                </div>

                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-sm saveBtn">Save changes</button>
                                </div>

                            </form>

                          </div>

                          <div class="tab-pane fade" id="nav-account-security" role="tabpanel" aria-labelledby="nav-account-security-tab">

                            <form method="post" autocomplete="off" class="accountSecurityForm">

                                <div class="form-group">
                                  <label for="current_password">Current password</label>
                                  <input type="password" name="current_password" id="current_password" class="form-control el" placeholder="Enter your current password">
                                  <span class="text-danger current_password fts-12"></span>
                                </div>

                                <div class="form-group">
                                  <label for="password">New password</label>
                                  <input type="password" name="password" id="password" class="form-control el" placeholder="Enter new password">
                                  <span class="text-danger password fts-12"></span>
                                </div>

                                <div class="form-group">
                                  <label for="cpassword">Confirm password</label>
                                  <input type="password" name="password_confirmation" id="cpassword" class="form-control" placeholder="Confirm password">
                                </div>

                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-sm saveBtn">Save changes</button>
                                </div>

                            </form>

                          </div>

                      </div>


                    
                    </div>

                </div>

            </div>
           
          </div>
          <!--Row-->

</div>
  <!---Container Fluid-->
</div>

<script src="../js/account/client/settings.js'"></script>
<?php 

include('includes/footer.php');

?>