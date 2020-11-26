<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Careers PT NAP Info Lintas Nusa</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144808195-1');
    </script>


    <script type="text/javascript">
        function capitalize(textboxid, str) {
            // string with alteast one character
            if (str && str.length >= 1) {
                var firstChar = str.charAt(0);
                var remainingStr = str.slice(1);
                str = firstChar.toUpperCase() + remainingStr;
            }
            document.getElementById(textboxid).value = str;
        }
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Form Application PT NAP Info Lintas Nusa</h3>
                                    <center><img src="img/matrix.png" width="50%"></center>
                                </div>
                                <div class="card-body">
                                    <form class="form-detail" action="submit.php" enctype="multipart/form-data" method="post" id="myform">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="first_name">First Name</label>
                                                    <input name="first_name" class="form-control py-4" id="first_name" type="text" placeholder="Enter first name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="last_name">Last Name</label>
                                                    <input name="last_name" class="form-control py-4" id="last_name" type="text" placeholder="Enter last name" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="phone_kandidat">Phone</label>
                                                    <input name="phone_kandidat" class="form-control py-4" id="phone_kandidat" type="number" placeholder="Enter Phone" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="address_kandidat">Address</label>
                                                    <input name="address_kandidat" class="form-control py-4" id="address_kandidat" type="text" placeholder="Enter Address" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="education_kandidat">Education</label>
                                                    <select name="education_kandidat" class="form-control" required>
                                                        <option class="form-control py-4" value="">Education</option>
                                                        <option value="SMA/SMK">SMA/SMK</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="position_kandidat">Apply on</label>
                                                    <select name="position_kandidat" class="form-control" required>
                                                        <option class="form-control py-4" value="">Postion</option>
                                                        <option value="System Development">System Development</option>
                                                        <option value="Sysadmin">System Engineer</option>
                                                        <option value="NOC">Network Operation Center</option>
                                                        <option value="AM">Account Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="university_kandidat">University</label>
                                            <input name="university_kandidat" class="form-control py-4" id="university_kandidat" type="text" placeholder="Enter University" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="experience_kandidat">Experience</label>
                                            <input name="experience_kandidat" class="form-control py-4" id="experience_kandidat" type="text" placeholder="Enter Experience" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="summary_kandidat">Summary</label>
                                            <textarea name="summary_kandidat" class="form-control py-4" id="summary_kandidat" type="text" placeholder="Enter Summary"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="letter_kandidat">Cover Letter</label>
                                            <textarea name="letter_kandidat" class="form-control py-4" id="letter_kandidat" type="text" placeholder="Enter Cover Letter"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="email_kandidat">Email</label>
                                            <input name="email_kandidat" class="form-control py-4" id="email_kandidat" type="email" placeholder="Enter Email" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="email_kandidat">Email</label>
                                            <input name="email_kandidat" class="form-control py-4" id="email_kandidat" type="date" placeholder="Enter Email" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputCV">Upload CV (PDF Only max 5mb)</label>
                                            <input type="file" name="file" class="form-control-file border" accept="application/pdf" required>
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit Form">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html> 