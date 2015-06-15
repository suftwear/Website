<!-- Register modal -->
<div id="registermodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs">
        <form role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registreren</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" class="form-control" id="reg_email" placeholder="E-mailadres">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="reg_pwd" placeholder="Wachtwoord">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="reg_fb_token" value="">
                        <div id="fblogin" class="fb-login-button" data-scope: "public_profile,email,user_photos" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registreren</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('StatusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            document.getElementById('fblogin').style.display = 'none';
            getData();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            console.log("Not logged in");
            document.getElementById('status').innerHTML = '';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
        console.log("Not logged in either");
        document.getElementById('status').innerHTML = '';
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1597503327174282',
            cookie     : true,  // enable cookies to allow the server to access
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.3' // use version 2.2
        });

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

// Load the SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function getData() {
    var access_token = FB.getAuthResponse()['accessToken'];
    document.getElementById('reg_fb_token').value = access_token;
    FB.api('/me', function(response) {
        console.log('Successful login for: ' + access_token);
    });
}
</script>
