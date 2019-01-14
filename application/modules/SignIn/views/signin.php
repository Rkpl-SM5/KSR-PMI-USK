<script type="text/javascript">
    <?php
    include APPPATH . "modules/SignIn/ajax/signin.js";
    ?>
</script>
<div class="container">
    <div class="login-content">
        <div class="login-form">
            <form id="form-login">
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <button type="button" class="btn btn-success btn-flat m-b-30 m-t-30 btn-sign">Sign in</button>

            </form>
        </div>
    </div>
</div>